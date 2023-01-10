<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectInstallation;
use Illuminate\Http\Request;

class ProjectInstallationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        //
        $projectInstallation = ProjectInstallation::where('project_id', $project->id)->get();
        return response($projectInstallation, 200);
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
        $projectInstallation = $request->all();
        $projectInstallation['project_id'] = $project->id;
        $projectInstallation = ProjectInstallation::create($projectInstallation);

        return response($projectInstallation, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectInstallation  $projectInstallation
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectInstallation $projectInstallation)
    {
        //
        return response($projectInstallation, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectInstallation  $projectInstallation
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectInstallation $projectInstallation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectInstallation  $projectInstallation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectInstallation $projectInstallation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectInstallation  $projectInstallation
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectInstallation $projectInstallation)
    {
        //
        $projectInstallation->delete();
        return response($projectInstallation, 200);
    }
}
