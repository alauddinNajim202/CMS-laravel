<?php

namespace App\Http\Controllers\Web\Backend;

use App\Models\CMS;
use App\Models\Tool;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ToolController extends Controller
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
        $data = Tool::latest();
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
                                  <a href="' . route('tools.edit',  $data->id) . '" type="button" class="btn btn-success text-white" title="Edit">
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

        return view('backend.layouts.tools.index');
    }


    /**
     * Show the form for creating a new clinical dynamic page.
     */
    public function create()
    {
        return view('backend.layouts.tools.create');
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
            'description' => 'required',
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'excel_file' => 'required|mimes:xls,xlsx',
        ]);


        $data = new Tool();
        $data->title = $request->title;

         // Image store in local
         $clientImage = Helper::fileUpload( $request->file( 'image_url' ), 'tools', $request->image_url );

         $data->image_url = $clientImage;

         // Image store in local
         $clientFile = Helper::fileUpload( $request->file( 'excel_file' ), 'tools', $request->excel_file );

         $data->excel_file = $clientFile;

        $data->description = $request->description;

        $data->save();

        return redirect()->route('tools.index')->with('t-success', 'Data Created Successfully');
    }

    /**
     * Display the specified process to edit and update.
     *
     * @param  string  $id
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */

    public function edit($id)
    {
        return view('backend.layouts.tools.edit',['data' => Tool::find($id)]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'excel_file' => 'nullable|mimes:xls,xlsx',
        ]);


        $data = Tool::find($id);
        $data->title = $request->title;
        $data->description = $request->description;

         // Check Image Update
         if ( $request->image_url != null ) {

            // Remove old image
            if ( File::exists( $data->image_url ) ) {
                File::delete( $data->image_url );
            }
            // Image store in local
            $featuredImage = Helper::fileUpload( $request->file( 'image_url' ), 'tools', $request->image_url);
            $data->image_url = $featuredImage;
        }

         // Check Image Update
         if ( $request->excel_file != null ) {

            // Remove old image
            if ( File::exists( $data->excel_file ) ) {
                File::delete( $data->excel_file );
            }
            // Image store in local
            $excelFile = Helper::fileUpload( $request->file( 'excel_file' ), 'tools', $request->excel_file);
            $data->excel_file = $excelFile;
        }

        $data->save();

        return redirect()->route('tools.index')->with('t-success', 'Data Updated Successfully');
    }
    /**
     * Delete the specified dynamic page from the tools database.
     *
     * @param int $id
     */
    public function destroy($id)
    {

        $data = Tool::find($id);
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
        $data = Tool::findOrFail($id);
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
    public function toolHeader()
    {
        $data = CMS::all();

        return view('backend.layouts.tools.tools-header', compact('data'));
    }

    /**
     * Update the landing page biography title, sub_title, button_text, button_url and image.
     * Takes input from a form, validates it, and updates the CMS entry.
     * Returns a success or error toast message.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function toolHeaderContentImage(Request $request)
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
