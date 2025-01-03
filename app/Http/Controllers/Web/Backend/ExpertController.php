<?php

namespace App\Http\Controllers\Web\Backend;

use App\Models\Expert;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class ExpertController extends Controller
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
        $data = Expert::latest();
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
                ->editColumn('image_url', function ($data) {
                    return '<img src="' . asset($data->image_url) . '" alt="image" style="width: 100px; height: 100px;">';
                })
                ->addColumn('action', function ($data) {

                    return '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                  <a href="' . route('experts.edit', $data->id) . '" type="button" class="btn btn-success text-white" title="Edit">
                                  <i class="bi bi-pencil"></i>
                                  </a>
                                  <a href="#" onclick="showDeleteConfirm(' . $data->id . ')" type="button" class="btn btn-danger text-white" title="Delete">
                                  <i class="bi bi-trash"></i>
                                </a>
                                </div>';
                })
                ->rawColumns(['status','image_url', 'action'])
                ->make(true);
        }

        return view('backend.layouts.experts.index');
    }

    /**
     * Show the form for creating a new clinical dynamic page.
     */
    public function create()
    {
        return view('backend.layouts.experts.create');
    }

    /**
     * Store a newly created clinical page in the database.
     *
     * @param Request $request
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'experience_year' => 'required|integer',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'description' => 'nullable|string',
        ]);
        // dd($request->all());
        $imagePath = Helper::fileUpload($request->file( 'image_url' ), 'cms-image', $request->image_url);

        $data = Expert::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'experience_year' => $request->experience_year,
            'email' => $request->email,
            'phone' => $request->phone,
            'description' => $request->description,
            'image_url' => $imagePath,
            'status' => 'active',

        ]);


        return redirect()->route('experts.index')->with('t-success', 'Data Created Successfully');
    }

    /**
     * Display the specified process to edit and update.
     *
     * @param  string  $id
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */

    public function edit($id)
    {
        return view('backend.layouts.experts.edit', ['data' => Expert::find($id)]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'experience_year' => 'required|integer',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $data = Expert::find($id);

         // dd($request->all());
         $imagePath = Helper::fileUpload($request->file( 'image_url' ), 'cms-image', $request->image_url);

         $data->update([
             'name' => $request->name,
             'designation' => $request->designation,
             'experience_year' => $request->experience_year,
             'email' => $request->email,
             'phone' => $request->phone,
             'description' => $request->description,
             'image_url' => $imagePath,
             'status' => 'active',

         ]);
        return redirect()->route('experts.index')->with('t-success', 'Data Updated Successfully');
    }
    /**
     * Delete the specified dynamic page from the tools database.
     *
     * @param int $id
     */
    public function destroy($id)
    {

        $data = Expert::find($id);
        $data->delete();

        return response()->json([
            'success' => true,
            'message' => 'Deleted successfully.',
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
        $data = Expert::findOrFail($id);
        //        return $data;

        if ($data->status == 'active') {
            $data->status = 'inactive';
            $data->save();
            return response()->json([
                'success' => false,
                'message' => 'Unpublished Successfully.',
                'data' => $data,
            ]);
        } else {
            $data->status = 'active';
            $data->save();
            return response()->json([
                'success' => true,
                'message' => 'Published Successfully.',
                'data' => $data,
            ]);
        }
    }
}
