<?php

namespace App\Http\Controllers\Web\Backend;

use App\Models\CMS;
use App\Models\Blog;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
      /**
     * Displays the list of process.
     *
     * This method handles AJAX requests to fetch and return clinical data
     * in a format suitable for DataTables, including columns for publish
     * products. If not an AJAX request, it returns the main view for process.
     *
     * @param Request $request The incoming HTTP request.
     */
    public function index(Request $request)
    {
        $data = Blog::latest();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($data) {
                    $status = ' <div class="form-check form-switch" style="margin-left:10px;">';
                    $status .= ' <input onclick="showStatusChangeAlert(' . $data->id . ')" type="checkbox" class="form-check-input" style="width: 2em;" id="customSwitch' . $data->id . '" getAreaid="' . $data->id . '" name="status"';
                    if ($data->status == "active") {
                        $status .= "checked";
                    }
                    $status .= '><label for="customSwitch' . $data->id . '" class="form-check-label" for="customSwitch"></label></div>';

                    return $status;
                })
                ->addColumn('action', function ($data) {

                    return '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                  <a href="' . route('blogs.edit',  $data->id) . '" type="button" class="btn btn-success text-white" title="Edit">
                                  <i class="bi bi-pencil"></i>
                                  </a>
                                  <a href="#" onclick="showDeleteConfirm(' . $data->id . ')" type="button" class="btn btn-danger text-white" title="Delete">
                                  <i class="bi bi-trash"></i>
                                </a>
                                </div>';
                })
                ->addColumn('image', function ($data) {
                    $url = asset($data->image_url);
                    return '<img src="' . $url . '" alt="image" width="50px" height="50px" style="margin-left:20px;">';
                })
                ->rawColumns(['status', 'action','image'])
                ->make(true);
        }

        return view('backend.layouts.blogs.index');
    }


    /**
     * Show the form for creating a new clinical dynamic page.
     */
    public function create()
    {
        return view('backend.layouts.blogs.create');
    }



    /**
     * Store a newly created clinical page in the database.
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'introduction' => 'required',
            'about_it' => 'required',
            'why' => 'required',
            'end' => 'required',
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'detail_image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'blog_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);


        $data = new Blog();
        $data->title = $request->title;

         // Image store in local
         $blog_image = Helper::fileUpload( $request->file( 'blog_image' ), 'tools', $request->blog_image );
         $clientImage = Helper::fileUpload( $request->file( 'image_url' ), 'tools', $request->image_url );
         $detail_image_url = Helper::fileUpload( $request->file( 'detail_image_url' ), 'tools', $request->detail_image_url );




         $data->blog_image = $blog_image;
         $data->image_url = $clientImage;
         $data->detail_image_url = $detail_image_url;

        $data->introduction = $request->introduction;
        $data->about_it = $request->about_it;
        $data->why = $request->why;
        $data->end = $request->end;


        $data->save();

        return redirect()->route('blogs.index')->with('t-success', 'Data Created Successfully');
    }

    /**
     * Display the specified process to edit and update.
     *
     * @param  string  $id
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */

    public function edit($id)
    {
        return view('backend.layouts.blogs.edit',['data' => Blog::find($id)]);
    }
    public function update(Request $request, $id)
    {

        // dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'introduction' => 'required',
            'about_it' => 'required',
            'why' => 'required',
            'end' => 'required',
            'image_url' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'detail_image_url' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'blog_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',


        ]);


        $data = Blog::find($id);
        $data->title = $request->title;

        $data->introduction = $request->introduction;
        $data->about_it = $request->about_it;
        $data->why = $request->why;
        $data->end = $request->end;




         // Check Image Update
         if ( $request->image_url != null ) {

            // Remove old image
            if ( File::exists( $data->image_url ) ) {
                File::delete( $data->image_url );
            }
            // Image store in local
            $featuredImage = Helper::fileUpload( $request->file( 'image_url' ), 'tools', $request->image_url);

            $detailImage = Helper::fileUpload( $request->file( 'detail_image_url' ), 'tools', $request->detail_image_url );
            $blogImage = Helper::fileUpload( $request->file( 'blog_image' ), 'tools', $request->blog_image );

            $data->detail_image_url = $detailImage;
            $data->image_url = $featuredImage;
            $data->blog_image = $blogImage;


        }



        $data->save();

        return redirect()->route('blogs.index')->with('t-success', 'Data Updated Successfully');
    }
    /**
     * Delete the specified dynamic page from the tools database.
     *
     * @param int $id
     */
    public function destroy($id)
    {

        $data = Blog::find($id);
        $data->delete();

        return response()->json([
            'success' => true,
            'message'   => 'Deleted successfully.',
        ]);
    }


    /**
     * Update the status of a process.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function status($id)
    {
        $data = Blog::findOrFail($id);
        //        return $data;


        if ($data->status == 'active') {
            $data->status = 'inactive';
            $data->save();
            return response()->json([
                'success' => false,
                'message' => 'Unpublished Successfully.',
                'data'    => $data,
            ]);
        } else {
            $data->status = 'active';
            $data->save();
            return response()->json([
                'success' => true,
                'message' => 'Published Successfully.',
                'data'    => $data,
            ]);
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
    public function blogHeader()
    {
        $data = CMS::all();

        return view('backend.layouts.blogs.blogs-header', compact('data'));
    }

    /**
     * Update the landing page biography title, sub_title, button_text, button_url and image.
     * Takes input from a form, validates it, and updates the CMS entry.
     * Returns a success or error toast message.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function blogHeaderContentImage(Request $request)
    {
        $data = CMS::findOrFail($request->id);

        // Prepare data for update
        $updateData = [
            'title' => $request->title,
            'description' => $request->description,
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
}
