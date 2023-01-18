<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectDocumentation;
use App\Models\Notification;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ProjectDocumentationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        //
        $projectDocumentation = ProjectDocumentation::where('project_id', $project->id)->get();
        return response($projectDocumentation, 200);
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
        //$path = Storage::putFile('Project Documentation', $request->file('document'));

        $projectDocumentation['project_id'] = $project->id;
        $projectDocumentation['document_name'] = $request->file('document')->getClientOriginalName();
        $projectDocumentation['document_path'] = $path;

        $projectDocumentation = ProjectDocumentation::create($projectDocumentation);

        $req_user = Auth::user();

        $notification = Notification::create([
            'title' => 'Project Documentation Added',
            'description' => 'Documentation for project "'.$project->name.'" successfully added',
            'user_id' => $req_user->id,
            'event_id' => $project->id,
            'module' => 'Project'
        ]);

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
        return response($projectDocumentation, 200);
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
