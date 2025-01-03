<?php

namespace App\Http\Controllers\Web\Backend;

use App\Models\Skill;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Models\Expert;

class SkillController extends Controller
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
        $data = Skill::latest();
        // dd($data);
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('expert', function ($data) {
                    return $data->expert->name;
                })

                ->addColumn('action', function ($data) {

                    return '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                  <a href="' . route('skills.edit', $data->id) . '" type="button" class="btn btn-success text-white" title="Edit">
                                  <i class="bi bi-pencil"></i>
                                  </a>
                                  <a href="#" onclick="showDeleteConfirm(' . $data->id . ')" type="button" class="btn btn-danger text-white" title="Delete">
                                  <i class="bi bi-trash"></i>
                                </a>
                                </div>';
                })
                ->rawColumns([ 'expert', 'action'])
                ->make(true);
        }

        return view('backend.layouts.skills.index');
    }

    /**
     * Show the form for creating a new clinical dynamic page.
     */
    public function create()
    {
        $experts = Expert::all();

        return view('backend.layouts.skills.create', compact('experts'));
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
            'name' => 'required|string|max:255',

        ]);
        // dd($request->all());

        Skill::create($request->only(['name','expert_id']));

        return redirect()->route('skills.index')->with('t-success', 'Data Created Successfully');
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
        return view('backend.layouts.skills.edit', ['data' => Skill::find($id), 'experts' => $experts]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'expert_id' => 'required|integer',
        ]);

        $data = Skill::find($id);

        $data->update($request->all());

        return redirect()->route('skills.index')->with('t-success', 'Data Updated Successfully');
    }
    /**
     * Delete the specified dynamic page from the tools database.
     *
     * @param int $id
     */
    public function destroy($id)
    {

        $data = Skill::find($id);
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
