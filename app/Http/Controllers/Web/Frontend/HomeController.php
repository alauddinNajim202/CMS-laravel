<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormMail;
use App\Models\Blog;
use App\Models\CMS;
use App\Models\Contact;
use App\Models\ContactCMS;
use App\Models\Expert;
use App\Models\FAQ;
use App\Models\Newsletter;
use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $cms = CMS::get();

        $experties = Expert::where('status', 'active')->get();
        return view('frontend.layouts.home', compact('cms', 'experties'));
    }

    public function about()
    {
        $cms = CMS::get();
        $faqs = Faq::where('status', 'active')->get();
        $professional_experts = Expert::limit(4)->get();

        return view('frontend.layouts.about_us', compact('cms', 'faqs', 'professional_experts'));
    }

    public function availablePreceptors()
    {
        $cms = CMS::get();
        $faqs = Faq::where('status', 'active')->get();
        return view('frontend.layouts.available-preceptor', compact('cms', 'faqs'));
    }

    public function faq()
    {
        $cms = CMS::get();
        $faqs = Faq::where('status', 'active')->get();
        return view('frontend.layouts.faq', compact('cms', 'faqs'));
    }

    public function studentForm()
    {
        $cms = CMS::get();
        $faqs = Faq::where('status', 'active')->get();
        $studentCms = ContactCMS::get();
        return view('frontend.layouts.student-form', compact('cms', 'faqs', 'studentCms'));
    }

    public function becomePreceptor()
    {
        $cms = CMS::get();
        $faqs = Faq::where('status', 'active')->get();
        $studentCms = ContactCMS::get();
        return view('frontend.layouts.become-preceptor', compact('cms', 'faqs', 'studentCms'));
    }
    public function contactUs()
    {
        $studentCms = ContactCMS::get();
        $faqs = Faq::where('status', 'active')->get();
        return view('frontend.layouts.contact-us', compact('studentCms', 'faqs'));
    }

    public function send(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'number' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        try {
            // Save the data to the database
            Contact::create($data);

            // Send the email
            Mail::to('admin@gmail.com')->send(new ContactFormMail($data));

            return redirect()->back()->with('success', 'Your message has been sent successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('t-error', 'Message sending failed. Please try again later.');
        }

    }

    public function professional()
    {

        $experts = Expert::all();
        // dd($expert);
        return view('frontend.layouts.professional', compact('experts'));
    }
    public function professional_details($id)
    {

        $expert = Expert::with('skills', 'experiences')->find($id);

        $professional_experts = Expert::limit(4)->get();

        // dd($expert);
        return view('frontend.layouts.professional-details', compact('expert', 'professional_experts'));
    }

    // services

    public function services()
    {

        $experts = Expert::all();
        // dd($expert);
        return view('frontend.layouts.services', compact('experts'));
    }

    // services

    public function tools()
    {

        $tools = Tool::all();
        // dd($expert);
        return view('frontend.layouts.tools', compact('tools'));
    }

    public function download(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'tool_id' => 'required|exists:tools,id',
            'email' => 'required|email',
        ]);

        // Fetch the tool
        $tool = Tool::find($request->tool_id);
        // dd($tool);

        $filePath = public_path($tool->excel_file);
        // dd($filePath);

        $newsletter = new  Newsletter;
        $newsletter->email = $request->email;
        $newsletter->save();

        if (file_exists($filePath)) {
            return response()->json([
                'success' => true,
                'file_url' => asset($tool->excel_file),
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'File not found.',
        ]);
    }





    // blogs

    public function article_lists()
    {
        $blogs = Blog::all();
        return view('frontend.layouts.blog_lists', compact('blogs'));
    }
    public function articles()
    {
        $blogs = Blog::limit(4)->orderBy('id', 'desc')->get();
        return view('frontend.layouts.blogs', compact('blogs'));
    }

    public function articles_details($id)
    {
        $blog = Blog::find($id);
        return view('frontend.layouts.blog-details', compact('blog'));
    }




    public function newsletter()
    {
        return view('frontend.layouts.newsletter');
    }
}
