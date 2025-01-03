<?php

namespace App\Http\Controllers\Web\Backend\CMS\AboutUsPage;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\CMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AboutUsPageController extends Controller
{
    public function banner()
    {
        $data = CMS::all();
        //        return $data;
        return view('backend.layouts.cms.about-us-page.banner', compact('data'));
    }

    /**
     * Update the landing page banner title, sub_title, button_text, button_url and image.
     * Takes input from a form, validates it, and updates the CMS entry.
     * Returns a success or error toast message.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function bannerContent(Request $request)
    {
        $request->validate([
            'title' => 'nullable',
            'description' => 'nullable',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = CMS::findOrFail($request->id);

        // Prepare data for update
        $updateData = [
            'title' => $request->title,
            'description' => $request->description
        ];

        if ($request->image_url != null) {

            // Remove old image
            if (File::exists($data->image_url)) {
                File::delete($data->image_url);
            }
            // Image store in local
            $image = Helper::fileUpload($request->file('image_url'), 'cms-image', $request->image_url);

            $updateData['image_url'] = $image;
        }

        // Perform the update
        $updated = $data->update($updateData);

        // Return with a success or error message
        if ($updated) {
            return redirect()->back()->with('t-success', 'Data Updated Successfully');
        } else {
            return redirect()->back()->with('t-error', 'Data update failed!');
        }
    }

    public function whoWeAre()
    {
        $data = CMS::all();
        //        return $data;
        return view('backend.layouts.cms.about-us-page.who-we-are', compact('data'));
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

    public function digitalJourney()
    {
        $data = CMS::all();
        //        return $data;
        return view('backend.layouts.cms.about-us-page.digital-journey', compact('data'));
    }

    /**
     * Update the landing page banner title, sub_title, button_text, button_url and image.
     * Takes input from a form, validates it, and updates the CMS entry.
     * Returns a success or error toast message.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function digitalJourneyContent(Request $request)
    {

        $data = CMS::findOrFail($request->id);

        // Prepare data for update
        $updateData = [
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
            'sub_description' => $request->sub_description,
            'button_text' => $request->button_text,
        ];

        if ($request->image_url != null) {

            // Remove old image
            if (File::exists($data->image_url)) {
                File::delete($data->image_url);
            }
            // Image store in local
            $image = Helper::fileUpload($request->file('image_url'), 'cms-image', $request->image_url);

            $updateData['image_url'] = $image;
        }

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
    public function businessGrowth()
    {
        $data = CMS::all();
        return view('backend.layouts.cms.about-us-page.business-growth', compact('data'));
    }

    /**
     * Update the landing page biography title, sub_title, button_text, button_url and image.
     * Takes input from a form, validates it, and updates the CMS entry.
     * Returns a success or error toast message.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function businessGrowthContent(Request $request)
    {

        $data = CMS::findOrFail($request->id);

        // Prepare data for update
        $updateData = [
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'title_description' => $request->title_description,
            'description' => $request->description,
            'sub_description' => $request->sub_description,
            'button_text' => $request->button_text,
        ];

        if ($request->image_url != null) {

            // Remove old image
            if (File::exists($data->image_url)) {
                File::delete($data->image_url);
            }
            // Image store in local
            $image = Helper::fileUpload($request->file('image_url'), 'cms-image', $request->image_url);

            $updateData['image_url'] = $image;
        }

        if ($request->second_image_url != null) {

            // Remove old image
            if (File::exists($data->second_image_url)) {
                File::delete($data->second_image_url);
            }
            // Image store in local
            $image = Helper::fileUpload($request->file('second_image_url'), 'cms-image', $request->second_image_url);

            $updateData['second_image_url'] = $image;
        }

        if ($request->third_image_url != null) {

            // Remove old image
            if (File::exists($data->third_image_url)) {
                File::delete($data->third_image_url);
            }
            // Image store in local
            $image = Helper::fileUpload($request->file('third_image_url'), 'cms-image', $request->third_image_url);

            $updateData['third_image_url'] = $image;
        }

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
    public function whyChooseUs()
    {
        $data = CMS::all();
        return view('backend.layouts.cms.about-us-page.why-choose-us', compact('data'));
    }

    /**
     * Update the landing page biography title, sub_title, button_text, button_url and image.
     * Takes input from a form, validates it, and updates the CMS entry.
     * Returns a success or error toast message.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function whyChooseUsContent(Request $request)
    {

        $data = CMS::findOrFail($request->id);

        // Prepare data for update
        $updateData = [
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'title_description' => $request->title_description,
            'description' => $request->description,
            'sub_description' => $request->sub_description,
            'button_text' => $request->button_text,
        ];

        if ($request->image_url != null) {

            // Remove old image
            if (File::exists($data->image_url)) {
                File::delete($data->image_url);
            }
            // Image store in local
            $image = Helper::fileUpload($request->file('image_url'), 'cms-image', $request->image_url);

            $updateData['image_url'] = $image;
        }

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

    /**
     * Display the landing page value view with CMS data.
     *
     * This method retrieves all CMS records and returns the landing page biography view
     * with the retrieved data.
     *
     * @return \Illuminate\View\View The view of the landing page biography.
     */
    public function successPreceptor()
    {
        $data = CMS::all();
        return view('backend.layouts.cms.landing-page.success-preceptor', compact('data'));
    }

    /**
     * Update the landing page biography title, sub_title, button_text, button_url and image.
     * Takes input from a form, validates it, and updates the CMS entry.
     * Returns a success or error toast message.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function successPreceptorContent(Request $request)
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
