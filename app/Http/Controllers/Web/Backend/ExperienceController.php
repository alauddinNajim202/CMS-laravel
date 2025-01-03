<?php

namespace App\Http\Controllers\Web\Backend;

use App\Models\Expert;
use App\Helpers\Helper;
use App\Models\Experience;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class ExperienceController extends Controller
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
        $data = Experience::latest();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('expert', function ($data) {
                    return $data->expert->name;
                })
                ->editColumn('image_url', function ($data) {
                    return '<img src="' . asset($data->image_url) . '" alt="image" style="width: 100px; height: 100px;">';
                })

                ->addColumn('action', function ($data) {

                    return '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                  <a href="' . route('experiences.edit', $data->id) . '" type="button" class="btn btn-success text-white" title="Edit">
                                  <i class="bi bi-pencil"></i>
                                  </a>
                                  <a href="#" onclick="showDeleteConfirm(' . $data->id . ')" type="button" class="btn btn-danger text-white" title="Delete">
                                  <i class="bi bi-trash"></i>
                                </a>
                                </div>';
                })
                ->rawColumns(['expert','image_url', 'action'])
                ->make(true);
        }

        return view('backend.layouts.experiences.index');
    }

    /**
     * Show the form for creating a new clinical dynamic page.
     */
    public function create()
    {
        $experts = Expert::all();

        return view('backend.layouts.experiences.create', compact('experts'));
    }

    /**
     * Store a newly created clinical page in the database.
     *
     * @param Request $request
     */
    public function store(Request $request)
    {

        $request->validate([
            'expert_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'year_range' => 'required|string|max:255',
            'image_url' => 'required|max:255',


        ]);
        // dd($request->all());
        $imagePath = Helper::fileUpload($request->file( 'image_url' ), 'cms-image', $request->image_url);

        $data = Experience::create([
            'expert_id' => $request->expert_id,
            'title' => $request->title,
            'company_name' => $request->company_name,
            'year_range' => $request->year_range,
            'image_url' => $imagePath,
        ]);



        return redirect()->route('experiences.index')->with('t-success', 'Data Created Successfully');
    }

    /**
     * Display the specified process to edit and update.
     *
     * @param  string  $id
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */

    public function edit($id)
    {
        $experts = Expert::all();
        return view('backend.layouts.experiences.edit', ['data' => Experience::find($id),'experts' => $experts]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'expert_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'year_range' => 'required|string|max:255',
            'image_url' => 'required|max:255',


        ]);

        $data = Experience::find($id);

         // dd($request->all());
         $imagePath = Helper::fileUpload($request->file( 'image_url' ), 'cms-image', $request->image_url);

         $data->update([
             'expert_id' => $request->expert_id,
             'title' => $request->title,
             'company_name' => $request->company_name,
             'year_range' => $request->year_range,
             'image_url' => $imagePath,
         ]);
        return redirect()->route('experiences.index')->with('t-success', 'Data Updated Successfully');
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
