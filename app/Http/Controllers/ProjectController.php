<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Customer;
use App\Models\Site;
use App\Models\ProjectMaterial;
use App\Models\ProjectInstallation;
use App\Models\ProjectAcceptance;
use App\Models\ProjectDecomm;
use App\Models\ProjectDocumentation;
use App\Models\Notification;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datas = Project::with(['site', 'customer'])->paginate(50);
        return response($datas, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        $sites = Site::all();
        return view('project.add_project', compact('customers', 'sites'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = $request->all();
        $project = Project::create($project);

        $req_user = Auth::user();
        $project_id = $project->id;

        $notification = new NotificationController();
        $notification->sendNotification(collect([
            'title' => 'New Project Added',
            'description' => 'New project "' . $request->name . '" successfully added',
            'user_id' => $req_user->id,
            'event_id' => $project_id,
            'module' => 'Project'
        ]));


        return response()->json(['status' => "success"], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
        // $customers = Customer::all();
        // $sites = Site::all();
        // $materials = ProjectMaterial::where('project_id', $project->id)->get();
        // $installations = ProjectInstallation::where('project_id', $project->id)->get();
        // $acceptances = ProjectAcceptance::where('project_id', $project->id)->get();
        // $decomms = ProjectDecomm::where('project_id', $project->id)->get();
        // $documentations = ProjectDocumentation::where('project_id', $project->id)->get();

        return response($project, 200);
        // return response(compact('project','customers','sites','materials','installations','acceptances','decomms','documentations'), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $customers = Customer::all();
        $sites = Site::all();
        $materials = ProjectMaterial::where('project_id', $project->id)->get();
        $installations = ProjectInstallation::where('project_id', $project->id)->get();
        $acceptances = ProjectAcceptance::where('project_id', $project->id)->get();
        $decomms = ProjectDecomm::where('project_id', $project->id)->get();
        $documentations = ProjectDocumentation::where('project_id', $project->id)->get();

        return view('project.edit_project', compact('project', 'customers', 'sites', 'materials', 'installations', 'acceptances', 'decomms', 'documentations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $project_id = $project->id;

        $project->fill($request->only([
            'name',
            'customer_id',
            'site_id',
            'project_manager',
            'date',
            'status'
        ]));
        $project = $project->save();

        $req_user = Auth::user();

        $notification = new NotificationController();
        $notification->sendNotification(collect([
            'title' => 'Project Updated',
            'description' => 'Project "' . $request->name . '" successfully updated',
            'user_id' => $req_user->id,
            'event_id' => $project_id,
            'module' => 'Project'
        ]));

        return response()->json(['status' => "success"], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return response()->json(['status' => "success"], 200);
    }

    public function listing(Project $project)
    {
        $datas = Project::with(['site', 'customer'])->get();
        return view('project.listing', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function api_create()
    {
        $customers = Customer::select('id', 'company_name as name')->get();
        $sites = Site::select('id', 'name')->get();
        return response(compact('customers', 'sites'));
    }
}
