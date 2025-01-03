<?php

namespace App\Http\Controllers\Web\Backend\CMS\ContactUsPage;

use App\Http\Controllers\Controller;
use App\Models\ContactCMS;
use Illuminate\Http\Request;

class ContactUsPageController extends Controller
{
    public function studentForm()
    {
        $data = ContactCMS::all();
//        return $data;
        return view('backend.layouts.cms.contact-us-page.student-form', compact('data'));
    }

    /**
     * Update the landing page banner title, sub_title, button_text, button_url and image.
     * Takes input from a form, validates it, and updates the CMS entry.
     * Returns a success or error toast message.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function studentFormContent(Request $request)
    {

        $data = ContactCMS::findOrFail($request->id);

        $data->title = $request->title;
        $data->sub_title = $request->sub_title;

        $data->save();

        return redirect()->back()->with('t-success', 'Data Updated Successfully');
    }
    public function intakeForm()
    {
        $data = ContactCMS::all();
//        return $data;
        return view('backend.layouts.cms.contact-us-page.intake-form', compact('data'));
    }

    /**
     * Update the landing page banner title, sub_title, button_text, button_url and image.
     * Takes input from a form, validates it, and updates the CMS entry.
     * Returns a success or error toast message.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function intakeFormContent(Request $request)
    {
        $request->validate([
            'link_url' => 'nullable|url',
        ]);

        $data = ContactCMS::findOrFail($request->id);

        $data->link_url = $request->link_url;

        $data->save();

        return redirect()->back()->with('t-success', 'Data Updated Successfully');
    }

    public function cardForm()
    {
        $data = ContactCMS::all();
//        return $data;
        return view('backend.layouts.cms.contact-us-page.card', compact('data'));
    }

    /**
     * Update the landing page banner title, sub_title, button_text, button_url and image.
     * Takes input from a form, validates it, and updates the CMS entry.
     * Returns a success or error toast message.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cardOneFormContent(Request $request)
    {

        $data = ContactCMS::findOrFail($request->id);

        $data->title = $request->title;
        $data->description = $request->description;

        $data->save();

        return redirect()->back()->with('t-success', 'Data Updated Successfully');
    }
    /**
     * Update the landing page banner title, sub_title, button_text, button_url and image.
     * Takes input from a form, validates it, and updates the CMS entry.
     * Returns a success or error toast message.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cardTwoFormContent(Request $request)
    {

        $data = ContactCMS::findOrFail($request->id);

        $data->title = $request->title;
        $data->description = $request->description;

        $data->save();

        return redirect()->back()->with('t-success', 'Data Updated Successfully');
    }
    /**
     * Update the landing page banner title, sub_title, button_text, button_url and image.
     * Takes input from a form, validates it, and updates the CMS entry.
     * Returns a success or error toast message.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cardThreeFormContent(Request $request)
    {

        $data = ContactCMS::findOrFail($request->id);

        $data->title = $request->title;
        $data->description = $request->description;

        $data->save();

        return redirect()->back()->with('t-success', 'Data Updated Successfully');
    }
    /**
     * Update the landing page banner title, sub_title, button_text, button_url and image.
     * Takes input from a form, validates it, and updates the CMS entry.
     * Returns a success or error toast message.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cardFourFormContent(Request $request)
    {

        $data = ContactCMS::findOrFail($request->id);

        $data->title = $request->title;
        $data->description = $request->description;

        $data->save();

        return redirect()->back()->with('t-success', 'Data Updated Successfully');
    }
    /**
     * Update the landing page banner title, sub_title, button_text, button_url and image.
     * Takes input from a form, validates it, and updates the CMS entry.
     * Returns a success or error toast message.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cardFiveFormContent(Request $request)
    {

        $data = ContactCMS::findOrFail($request->id);

        $data->title = $request->title;
        $data->description = $request->description;

        $data->save();

        return redirect()->back()->with('t-success', 'Data Updated Successfully');
    }
    /**
     * Update the landing page banner title, sub_title, button_text, button_url and image.
     * Takes input from a form, validates it, and updates the CMS entry.
     * Returns a success or error toast message.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cardSixFormContent(Request $request)
    {

        $data = ContactCMS::findOrFail($request->id);

        $data->title = $request->title;
        $data->description = $request->description;

        $data->save();

        return redirect()->back()->with('t-success', 'Data Updated Successfully');
    }
    /**
     * Update the landing page banner title, sub_title, button_text, button_url and image.
     * Takes input from a form, validates it, and updates the CMS entry.
     * Returns a success or error toast message.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cardSevenFormContent(Request $request)
    {

        $data = ContactCMS::findOrFail($request->id);

        $data->title = $request->title;
        $data->description = $request->description;

        $data->save();

        return redirect()->back()->with('t-success', 'Data Updated Successfully');
    }


    public function idealPreceptor()
    {
        $data = ContactCMS::all();
//        return $data;
        return view('backend.layouts.cms.contact-us-page.ideal-preceptor', compact('data'));
    }

    /**
     * Update the landing page banner title, sub_title, button_text, button_url and image.
     * Takes input from a form, validates it, and updates the CMS entry.
     * Returns a success or error toast message.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function idealPreceptorFormContent(Request $request)
    {

        $data = ContactCMS::findOrFail($request->id);

        $data->title = $request->title;
        $data->sub_title = $request->sub_title;
        $data->description = $request->description;

        $data->save();

        return redirect()->back()->with('t-success', 'Data Updated Successfully');
    }



    public function contact()
    {
        $data = ContactCMS::all();
//        return $data;
        return view('backend.layouts.cms.contact-us-page.contact-us', compact('data'));
    }

    /**
     * Update the landing page banner title, sub_title, button_text, button_url and image.
     * Takes input from a form, validates it, and updates the CMS entry.
     * Returns a success or error toast message.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function contactContent(Request $request)
    {

        $data = ContactCMS::findOrFail($request->id);

        $data->title = $request->title;
        $data->sub_title = $request->sub_title;

        $data->save();

        return redirect()->back()->with('t-success', 'Data Updated Successfully');
    }
}
