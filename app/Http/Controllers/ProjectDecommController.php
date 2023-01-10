<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectDecomm;
use Illuminate\Http\Request;

class ProjectDecommController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        //
        $projectDecomm = ProjectDecomm::where('project_id', $project->id)->get();
        return response($projectDecomm, 200);
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
        $projectDecomm = $request->all();
        $projectDecomm['project_id'] = $project->id;
        $projectDecomm = ProjectDecomm::create($projectDecomm);

        return response($projectDecomm, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectDecomm  $projectDecomm
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectDecomm $projectDecomm)
    {
        //
        return response($projectDecomm, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectDecomm  $projectDecomm
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectDecomm $projectDecomm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectDecomm  $projectDecomm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectDecomm $projectDecomm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectDecomm  $projectDecomm
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectDecomm $projectDecomm)
    {
        //
        $projectDecomm->delete();
        return response($projectDecomm, 200);
    }
}
