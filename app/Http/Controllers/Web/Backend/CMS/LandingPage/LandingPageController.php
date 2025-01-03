<?php

namespace App\Http\Controllers\Web\Backend\CMS\LandingPage;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\CMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class LandingPageController extends Controller
{
    public function banner()
    {
        $data = CMS::all();
//        return $data;
        return view('backend.layouts.cms.landing-page.banner', compact('data'));
    }

    /**
     * Update the landing page banner title, sub_title, button_text, button_url and image.
     * Takes input from a form, validates it, and updates the CMS entry.
     * Returns a success or error toast message.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function bannerContentImage(Request $request)
    {

        $data = CMS::findOrFail($request->id);

        $data->title = $request->title;
        // $data->sub_title = $request->sub_title;
        $data->description = $request->description;
        // $data->button_text = $request->button_text;

        // Check Image Update
        if ( $request->image_url != null ) {

            // Remove old image
            if ( File::exists( $data->image_url ) ) {
                File::delete( $data->image_url );
            }
            // Image store in local
            $image = Helper::fileUpload($request->file( 'image_url' ), 'cms-image', $request->image_url);
            $data->image_url = $image;
        }

        $data->save();

        return redirect()->back()->with('t-success', 'Data Updated Successfully');
    }



    public function whoWeAre()
    {
        $data = CMS::all();
        //        return $data;
        return view('backend.layouts.cms.landing-page.who-we-are', compact('data'));
    }

    /**
     * Update the landing page banner title, sub_title, button_text, button_url and image.
     * Takes input from a form, validates it, and updates the CMS entry.
     * Returns a success or error toast message.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function whoWeAreContent(Request $request)
    {

        $data = CMS::findOrFail($request->id);

        // Prepare data for update
        $updateData = [
            'title' => $request->title,
            'description' => $request->description,
        ];



        // Perform the update
        $updated = $data->update($updateData);

        // Return with a success or error message
        if ($updated) {
            return redirect()->back()->with('t-success', 'Data Updated Successfully');
        } else {
            return redirect()->back()->with('t-error', 'Data update failed!');
        }
    }












     /**
     * Display the landing page value view with CMS data.
     *
     * This method retrieves all CMS records and returns the landing page biography view
     * with the retrieved data.
     *
     * @return \Illuminate\View\View The view of the landing page biography.
     */
    public function experties()
    {
        $data = CMS::all();
        return view('backend.layouts.cms.landing-page.experties', compact('data'));
    }

    /**
     * Update the landing page biography title, sub_title, button_text, button_url and image.
     * Takes input from a form, validates it, and updates the CMS entry.
     * Returns a success or error toast message.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function expertiesContent(Request $request)
    {
        $data = CMS::findOrFail($request->id);

        // Update the CMS entry with the new data
        $updated = $data->update([
            'title'       => $request->title,
            // 'sub_title'   => $request->sub_title,
            'description' => $request->description,
        ]);

        // Return back with a success or error toast message based on the update result

        if ($updated) {
            return redirect()->back()->with('t-success', 'Data Updated Successfully');
        } else {
            return redirect()->back()->with('t-error', 'Data update failed!');
        }
    }

     /**
     * Display the landing page value view with CMS data.
     *
     * This method retrieves all CMS records and returns the landing page biography view
     * with the retrieved data.
     *
     * @return \Illuminate\View\View The view of the landing page biography.
     */
    public function clientReviewHeader()
    {
        $data = CMS::all();
        return view('backend.layouts.cms.landing-page.client-review-header', compact('data'));
    }

    /**
     * Update the landing page biography title, sub_title, button_text, button_url and image.
     * Takes input from a form, validates it, and updates the CMS entry.
     * Returns a success or error toast message.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function clientReviewHeaderContent(Request $request)
    {
        $data = CMS::findOrFail($request->id);

        // Update the CMS entry with the new data
        $updated = $data->update([
            'title'       => $request->title,
            'description' => $request->description,
        ]);

        // Return back with a success or error toast message based on the update result

        if ($updated) {
            return redirect()->back()->with('t-success', 'Data Updated Successfully');
        } else {
            return redirect()->back()->with('t-error', 'Data update failed!');
        }
    }
     /**
     * Display the landing page value view with CMS data.
     *
     * This method retrieves all CMS records and returns the landing page biography view
     * with the retrieved data.
     *
     * @return \Illuminate\View\View The view of the landing page biography.
     */
    public function contactUsHeader()
    {
        $data = CMS::all();
        return view('backend.layouts.cms.landing-page.contact-us-header', compact('data'));
    }

    /**
     * Update the landing page biography title, sub_title, button_text, button_url and image.
     * Takes input from a form, validates it, and updates the CMS entry.
     * Returns a success or error toast message.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function contactUsHeaderContent(Request $request)
    {
        $data = CMS::findOrFail($request->id);

        // Update the CMS entry with the new data
        $updated = $data->update([
            'description' => $request->description,
        ]);

        // Return back with a success or error toast message based on the update result

        if ($updated) {
            return redirect()->back()->with('t-success', 'Data Updated Successfully');
        } else {
            return redirect()->back()->with('t-error', 'Data update failed!');
        }
    }



    public function availablePreceptor()
    {
        $data = CMS::all();
//        return $data;
        return view('backend.layouts.cms.landing-page.map', compact('data'));
    }

    /**
     * Update the landing page banner title, sub_title, button_text, button_url and image.
     * Takes input from a form, validates it, and updates the CMS entry.
     * Returns a success or error toast message.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function availablePreceptorContent(Request $request)
    {

        $data = CMS::findOrFail($request->id);

        $data->link_url = $request->link_url;

        $data->save();

        return redirect()->back()->with('t-success', 'Data Updated Successfully');
    }


    /**
     * Display the landing page value view with CMS data.
     *
     * This method retrieves all CMS records and returns the landing page biography view
     * with the retrieved data.
     *
     * @return \Illuminate\View\View The view of the landing page biography.
     */
    public function idealPreceptor()
    {
        $data = CMS::all();
        return view('backend.layouts.cms.landing-page.ideal-preceptor', compact('data'));
    }

    /**
     * Update the landing page biography title, sub_title, button_text, button_url and image.
     * Takes input from a form, validates it, and updates the CMS entry.
     * Returns a success or error toast message.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function idealPreceptorContent(Request $request)
    {

        $data = CMS::findOrFail($request->id);

// Prepare data for update
        $updateData = [
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
            'button_text' => $request->button_text,
        ];

// Check if a new image is uploaded
        // if ($request->hasFile('feature_image')) {
        //     // Remove old image if exists
        //     if (File::exists($data->feature_image)) {
        //         File::delete($data->feature_image);
        //     }

        //     // Generate a random string for the new image filename
        //     $randomString = Str::random(20);
        //     $featuredImage = Helper::fileUpload(
        //         $request->file('feature_image'),
        //         'cms-image',
        //         $request->feature_image->hashName() . '_' . $randomString
        //     );

        //     // Update the feature image path
        //     $updateData['feature_image'] = $featuredImage;
        // }

// Perform the update
        $updated = $data->update($updateData);

// Return with a success or error message
        if ($updated) {
            return redirect()->back()->with('t-success', 'Data Updated Successfully');
        } else {
            return redirect()->back()->with('t-error', 'Data update failed!');
        }


    }

    /**
     * Display the landing page value view with CMS data.
     *
     * This method retrieves all CMS records and returns the landing page biography view
     * with the retrieved data.
     *
     * @return \Illuminate\View\View The view of the landing page biography.
     */
    public function connectMember()
    {
        $data = CMS::all();
        return view('backend.layouts.cms.landing-page.connect-member', compact('data'));
    }

    /**
     * Update the landing page biography title, sub_title, button_text, button_url and image.
     * Takes input from a form, validates it, and updates the CMS entry.
     * Returns a success or error toast message.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function connectMemberContent(Request $request)
    {
        $data = CMS::findOrFail($request->id);

        // Update the CMS entry with the new data
        $updated = $data->update([
            'title'       => $request->title,
            'description' => $request->description,
            'button_text' => $request->button_text,
        ]);

        // Return back with a success or error toast message based on the update result

        if ($updated) {
            return redirect()->back()->with('t-success', 'Data Updated Successfully');
        } else {
            return redirect()->back()->with('t-error', 'Data update failed!');
        }
    }

    /**
     * Display the landing page value view with CMS data.
     *
     * This method retrieves all CMS records and returns the landing page biography view
     * with the retrieved data.
     *
     * @return \Illuminate\View\View The view of the landing page biography.
     */
    public function expertPreceptor()
    {
        $data = CMS::all();
        return view('backend.layouts.cms.landing-page.expert-preceptor', compact('data'));
    }

    /**
     * Update the landing page biography title, sub_title, button_text, button_url and image.
     * Takes input from a form, validates it, and updates the CMS entry.
     * Returns a success or error toast message.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function expertPreceptorContent(Request $request)
    {

        $data = CMS::findOrFail($request->id);

        // Update the CMS entry with the new data
        $updated = $data->update([
            'title'       => $request->title,
            'sub_title'   => $request->sub_title,
            'description' => $request->description,
            'button_text' => $request->button_text,
        ]);

        // Return back with a success or error toast message based on the update result

        if ($updated) {
            return redirect()->back()->with('t-success', 'Data Updated Successfully');
        } else {
            return redirect()->back()->with('t-error', 'Data update failed!');
        }
    }


}
