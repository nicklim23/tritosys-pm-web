<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectAcceptance;
use App\Models\Notification;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ProjectAcceptanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        //
        $projectAcceptance = ProjectAcceptance::where('project_id', $project->id)->get();
        return response($projectAcceptance, 200);
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
        $projectAcceptance = $request->all();
        $projectAcceptance['project_id'] = $project->id;
        $projectAcceptance = ProjectAcceptance::create($projectAcceptance);

        $req_user = Auth::user();

        $notification = new NotificationController();
        $notification->sendNotification(collect([
            'title' => 'Project Acceptance Added',
            'description' => 'Acceptance for project "' . $project->name . '" successfully added',
            'user_id' => $req_user->id,
            'event_id' => $project->id,
            'module' => 'Project'
        ]));

        return response($projectAcceptance, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectAcceptance  $projectAcceptance
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectAcceptance $projectAcceptance)
    {
        //
        return response($projectAcceptance, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectAcceptance  $projectAcceptance
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectAcceptance $projectAcceptance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectAcceptance  $projectAcceptance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectAcceptance $projectAcceptance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectAcceptance  $projectAcceptance
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectAcceptance $projectAcceptance)
    {
        //
        $projectAcceptance->delete();
        return response($projectAcceptance, 200);
    }
}
