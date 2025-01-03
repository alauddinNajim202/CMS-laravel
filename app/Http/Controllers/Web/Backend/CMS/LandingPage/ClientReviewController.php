<?php

namespace App\Http\Controllers\Web\Backend\CMS\LandingPage;

use App\Models\Value;
use App\Helpers\Helper;
use App\Models\ClientReview;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ClientReviewController extends Controller
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
        $data = ClientReview::latest();
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
                                  <a href="' . route('client-reviews.edit',  $data->id) . '" type="button" class="btn btn-success text-white" title="Edit">
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

        return view('backend.layouts.client-reviews.index');
    }


    /**
     * Show the form for creating a new clinical dynamic page.
     */
    public function create()
    {
        return view('backend.layouts.client-reviews.create');
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
            'sub_title' => 'required|string|max:255',
            'description' => 'required',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $data = new ClientReview();
        $data->title = $request->title;
        $data->sub_title = $request->sub_title;

         // Image store in local
         $clientImage = Helper::fileUpload( $request->file( 'image_url' ), 'client-reviews', $request->image_url );

         $data->image_url = $clientImage;

        $data->description = $request->description;

        $data->save();

        return redirect()->route('client-reviews.index')->with('t-success', 'Data Created Successfully');
    }

    /**
     * Display the specified process to edit and update.
     *
     * @param  string  $id
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */

    public function edit($id)
    {
        return view('backend.layouts.client-reviews.edit',['data' => ClientReview::find($id)]);
    }
    public function update(Request $request, $id)
    {


        $request->validate([
            'title' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'description' => 'required',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $data = ClientReview::find($id);
        $data->title = $request->title;
        $data->sub_title = $request->designation;
        $data->description = $request->description;

         // Check Image Update
         if ( $request->image_url != null ) {

            // Remove old image
            if ( File::exists( $data->image_url ) ) {
                File::delete( $data->image_url );
            }
            // Image store in local
            $featuredImage = Helper::fileUpload( $request->file( 'image_url' ), 'client-reviews', $request->image_url);
            $data->image_url = $featuredImage;
        }

        $data->save();

        return redirect()->route('client-reviews.index')->with('t-success', 'Data Updated Successfully');
    }
    /**
     * Delete the specified dynamic page from the client-reviews database.
     *
     * @param int $id
     */
    public function destroy($id)
    {

        $data = ClientReview::find($id);
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
        $data = ClientReview::findOrFail($id);
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
}
