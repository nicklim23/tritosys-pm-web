<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectMaterial;
use Illuminate\Http\Request;

class ProjectMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $projectMaterial = $request->all();
        $projectMaterial['project_id'] = $project->id;
        $projectMaterial = ProjectMaterial::create($projectMaterial);

        return response($projectMaterial, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectMaterial  $projectMaterial
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectMaterial $projectMaterial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectMaterial  $projectMaterial
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectMaterial $projectMaterial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectMaterial  $projectMaterial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectMaterial $projectMaterial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectMaterial  $projectMaterial
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectMaterial $projectMaterial)
    {
        //
        $projectMaterial->delete();
        return response($projectMaterial, 200);
        // return response()->json(['status'=>"success"], 200);
    }
}
