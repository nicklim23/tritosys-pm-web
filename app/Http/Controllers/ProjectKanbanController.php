<?php

namespace App\Http\Controllers;

use App\Models\ProjectKanban;
use App\Models\Project;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectKanbanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        //
        $projectKanban = ProjectKanban::where('project_id', $project->id)->get();
        return response($projectKanban, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Project $project)
    {
        //
        $user = Auth::user();
        $projectKanban = $request->all();
        $projectKanban['project_id'] = $project->id;
        $projectKanban['created_by'] = $user->id;
        $projectKanban = ProjectKanban::create($projectKanban);
        return response()->json(['status'=>"success"], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectKanban  $projectKanban
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectKanban $projectKanban)
    {
        //
        return response($projectKanban, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectKanban  $projectKanban
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectKanban $projectKanban)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectKanban  $projectKanban
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectKanban $projectKanban)
    {
        //
        $projectKanban->fill($request->only([
            'title',
            'description',
            'assignee',
            'status',
            'sequence'
        ]));
        $projectKanban = $projectKanban->save();
        return response()->json(['status'=>"success"], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectKanban  $projectKanban
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectKanban $projectKanban)
    {
        //
        $projectKanban->delete();
        return response($projectKanban, 200);
    }
}
