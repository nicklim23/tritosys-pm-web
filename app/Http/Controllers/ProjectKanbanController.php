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

        if (!preg_match('/\b(Pending|In Progress|Completed)\b/u', $request->status)) {
            return response()->json(['status' => 'failed', 'message' => 'status not accept by server'], 400);
        }

        $kanban_filters_by_status = ProjectKanban::where('project_id', $project->id)->where('status', $request->status)->orderBy('sequence', 'DESC')->get();
        if ($kanban_filters_by_status->isEmpty()) {
            $projectKanban['sequence'] = 0;
        } else {
            $kanban_filters_by_status = $kanban_filters_by_status->first();
            $projectKanban['sequence'] = $kanban_filters_by_status->sequence + 1;
        }
        $projectKanban = ProjectKanban::create($projectKanban);
        return response()->json(['status' => "success"], 200);
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
        if (!preg_match('/\b(Pending|In Progress|Completed)\b/u', $request->status)) {
            return response()->json(['status' => 'failed', 'message' => 'status not accept by server'], 400);
        }

        $projectKanban->fill($request->only([
            'title',
            'description',
            'assignee',
        ]));

        $old_kanban = $projectKanban;
        if ($old_kanban->status === $request->status) {
            $kanban_filters_by_status_1 = ProjectKanban::where('project_id', $old_kanban->project_id)->where('status', $old_kanban->status)->orderBy('sequence', 'ASC')->get();
            // $old_kanban_filters_by_status_1 = clone $kanban_filters_by_status_1;
            if ($kanban_filters_by_status_1->isEmpty()) {
                $projectKanban['sequence'] = 0;
                $projectKanban = $projectKanban->save();
            } else {
                $kanban_filters_by_status_1 = $kanban_filters_by_status_1->filter(function ($value, $key) use ($old_kanban) {
                    return $value->id != $old_kanban->id;
                });
                $kanban_filters_by_status_1->splice($request->sequence, 0, [$projectKanban]);
                $kanban_filters_by_status_1 = $kanban_filters_by_status_1->map(function ($value, $key) {
                    $value->sequence = $key;
                    return $value;
                });
                $kanban_filters_by_status_1 = $kanban_filters_by_status_1->sortBy('id');
                $kanban_filters_by_status_1->each(function ($item) {
                    ProjectKanban::where('id', $item->id)->update(['sequence' => $item->sequence]);
                });
            }
        } else {
            $kanban_filters_by_status_old = ProjectKanban::where('project_id', $old_kanban->project_id)->where('status', $old_kanban->status)->orderBy('sequence', 'ASC')->get();
            $kanban_filters_by_status_new = ProjectKanban::where('project_id', $old_kanban->project_id)->where('status', $request->status)->orderBy('sequence', 'ASC')->get();
            $kanban_filters_by_status_old = $kanban_filters_by_status_old->filter(function ($value, $key) use ($old_kanban) {
                return $value->id != $old_kanban->id;
            });
            $new_kanban = clone $old_kanban;
            $new_kanban->status = $request->status;

            $kanban_filters_by_status_new->splice($request->sequence, 0, [$new_kanban]);
            $kanban_filters_by_status_new = $kanban_filters_by_status_new->map(function ($value, $key) {
                $value->sequence = $key;
                return $value;
            });
            $kanban_filters_by_status_old = $kanban_filters_by_status_old->map(function ($value, $key) {
                $value->sequence = $key;
                return $value;
            });
            $kanban_filters_by_status_old->each(function ($item) {
                ProjectKanban::where('id', $item->id)->update(['status' => $item->status, 'sequence' => $item->sequence]);
            });
            $kanban_filters_by_status_new->each(function ($item) {
                ProjectKanban::where('id', $item->id)->update(['status' => $item->status, 'sequence' => $item->sequence]);
            });
        }
        return response()->json(['status' => "success"], 200);
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
        $kanban_filters_by_status_1 = ProjectKanban::where('project_id', $projectKanban->project_id)->where('status', $projectKanban->status)->orderBy('sequence', 'ASC')->get();
        if ($kanban_filters_by_status_1->isNotEmpty()) {
            $kanban_filters_by_status_1 = $kanban_filters_by_status_1->map(function ($value, $key) {
                $value->sequence = $key;
                return $value;
            });
            $kanban_filters_by_status_1 = $kanban_filters_by_status_1->sortBy('id');
            $kanban_filters_by_status_1->each(function ($item) {
                ProjectKanban::where('id', $item->id)->update(['sequence' => $item->sequence]);
            });
        }
        return response($projectKanban, 200);
    }
}
