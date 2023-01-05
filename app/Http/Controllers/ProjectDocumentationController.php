<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectDocumentation;
use Illuminate\Http\Request;

class ProjectDocumentationController extends Controller
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
        $projectDocumentation = $request->all();

        $path = $request->file('document')->store('Project Documentation');

        $projectDocumentation['project_id'] = $project->id;
        $projectDocumentation['document_name'] = $request->file('document')->getClientOriginalName();
        $projectDocumentation['document_path'] = $path;

        $projectDocumentation = ProjectDocumentation::create($projectDocumentation);

        return response($projectDocumentation, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectDocumentation  $projectDocumentation
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectDocumentation $projectDocumentation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectDocumentation  $projectDocumentation
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectDocumentation $projectDocumentation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectDocumentation  $projectDocumentation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectDocumentation $projectDocumentation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectDocumentation  $projectDocumentation
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectDocumentation $projectDocumentation)
    {
        //
        $projectDocumentation->delete();
        return response($projectDocumentation, 200);
    }
}
