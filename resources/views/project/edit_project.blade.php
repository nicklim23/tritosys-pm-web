@extends('layout.app')

@section('customstyle')
<style>
    .multisteps-form__progress-btn {
        font-size: 13px;
    }
    .kanban-container {
        width: 2000px !important;
        overflow: inherit;
    }
    .kanban-info {
        flex-direction: column;
    }
    .kanban-created {
        font-size: 12px;
        color: grey;
    }
    .kanban-datetime {
        font-size: 12px;
        color: grey;
        margin-top: -2px;
    }
</style>
@stop

@section('content')
<div class="row mt-4">
    <div class="col-12">
        <div class="multisteps-form mb-5">
            <!--progress bar-->
            <div class="row">
                <div class="col-12 col-lg-12 mx-auto my-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="multisteps-form__progress">
                                <button class="multisteps-form__progress-btn js-active" type="button" title="Project Details">
                                    <span>Project Details</span>
                                </button>
                                <button class="multisteps-form__progress-btn" type="button" title="Materials">Materials</button>
                                <button class="multisteps-form__progress-btn" type="button" title="Installation">Installation</button>
                                <button class="multisteps-form__progress-btn" type="button" title="Acceptance">Acceptance</button>
                                <button class="multisteps-form__progress-btn" type="button" title="Decomm Materials">Decomm Materials</button>
                                <button class="multisteps-form__progress-btn" type="button" title="Documentation">Documentation</button>
                                <button class="multisteps-form__progress-btn" type="button" title="Kanban">Kanban</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--form panels-->
            <div class="row">
                <div class="col-12 col-lg-12 m-auto">
                    <div class="multisteps-form__form mb-8">
                        
                        <!-- Project Details-->
                        <form id="project">
                            @csrf
                            <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active"
                                data-animation="FadeIn">
                                <div class="multisteps-form__content">
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="name" class="col-form-label">
                                                Project Name <b style="color:red;">*</b>
                                            </label>
                                            <input class="form-control" type="text" value="{{ $project->name }}"
                                                id="name" name="name">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="customer_id" class="col-form-label">
                                                Customer <b style="color:red;">*</b>
                                            </label>
                                            <select class="form-control" id="customer_id" name="customer_id">
                                                <option value="" style="font-size:16px;">--Select Company--
                                                </option>
                                                @foreach ($customers as $customer)
                                                    <option value="{{ $customer->id }}" style="font-size:16px;" {{ $project->customer_id == $customer->id ? 'selected' : '' }}>
                                                        {{ $customer->company_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="site_id" class="col-form-label">
                                                Site <b style="color:red;">*</b>
                                            </label>
                                            <select class="form-control" id="site_id" name="site_id">
                                                <option value="" style="font-size:16px;">--Select Site--
                                                </option>
                                                @foreach ($sites as $site)
                                                    <option value="{{ $site->id }}" style="font-size:16px;" {{ $project->site_id == $site->id ? 'selected' : '' }}>
                                                        {{ $site->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="project_manager" class="col-form-label">
                                                Project Manager <b style="color:red;">*</b>
                                            </label>
                                            <input class="form-control" type="text" value="{{ $project->project_manager }}" id="project_manager" name="project_manager">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="date" class="col-form-label">
                                                Date <b style="color:red;">*</b>
                                            </label>
                                            <input class="form-control" type="date" value="{{ $project->date }}" id="date" name="date">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="status" class="col-form-label">
                                                Status <b style="color:red;">*</b>
                                            </label>
                                            <select class="form-control" id="status" name="status">
                                                <option value="" style="font-size:16px;">--Select Status--
                                                </option>
                                                <option value="Active" style="font-size:16px;" {{ $project->status == 'Active' ? 'selected' : '' }}>
                                                    Active
                                                </option>
                                                <option value="Inactive" style="font-size:16px;" {{ $project->status == 'Inactive' ? 'selected' : '' }}>
                                                    Inactive
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mt-4">
                                        <a class="btn bg-gradient-danger lg-3" href="{{ url('/projects') }}" role="button">Back</a>
                                        &ensp;
                                        <button class="btn bg-gradient-info lg-3 ms-2" type="submit" role="button">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <!-- Materials -->
                        <div class="card multisteps-form__panel p-3 border-radius-xl bg-white"
                            data-animation="FadeIn">
                            <div class="multisteps-form__content">
                                <div class="row mt-1">
                                    <div class="col-12" style="text-align: right">
                                        <a class="btn bg-gradient-success" href="#" data-bs-toggle="modal" data-bs-target="#materialModal">+ Add</a>
                                    </div>
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="table table-flush" id="datatable-search">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Collection Date</th>
                                                        <th>Collected By</th>
                                                        <th>Remarks</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($materials as $item)
                                                    <tr>
                                                        <td>{{$loop->index+1}}</td>
                                                        <td>{{ $item->collection_date }}</td>
                                                        <td>{{ $item->collected_by }}</td>
                                                        <td>{{ $item->remarks }}</td>
                                                        <td>
                                                            <a data-route="{{ url('projects/materials/'.$item->id) }}" data-csrf="{{ csrf_token() }}" onclick="removeData(this)" class="ms-3" data-bs-toggle="tooltip">
                                                                <i class="fas fa-trash text-danger" aria-hidden="true"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Installation -->
                        <div class="card multisteps-form__panel p-3 border-radius-xl bg-white"
                            data-animation="FadeIn">
                            <div class="multisteps-form__content">
                                <div class="row mt-1">
                                    <div class="col-12" style="text-align: right">
                                        <a class="btn bg-gradient-success" href="#" data-bs-toggle="modal"
                                            data-bs-target="#installationModal">+ Add</a>
                                    </div>
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="table table-flush" id="datatable-search2">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Scope</th>
                                                        <th>Team Assigned</th>
                                                        <th>Start Date</th>
                                                        <th>Completed Date</th>
                                                        <th>Week Completion</th>
                                                        <th>Remarks</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($installations as $item)
                                                    <tr>
                                                        <td>{{$loop->index+1}}</td>
                                                        <td>{{ $item->scope }}</td>
                                                        <td>{{ $item->team }}</td>
                                                        <td>{{ $item->start_date }}</td>
                                                        <td>{{ $item->complete_date }}</td>
                                                        <td>{{ $item->week }}</td>
                                                        <td>{{ $item->remarks }}</td>
                                                        <td>
                                                            <a data-route="{{ url('projects/installations/'.$item->id) }}" data-csrf="{{ csrf_token() }}" onclick="removeData(this)" class="ms-3" data-bs-toggle="tooltip">
                                                                <i class="fas fa-trash text-danger" aria-hidden="true"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Acceptance -->
                        <div class="card multisteps-form__panel p-3 border-radius-xl bg-white"
                            data-animation="FadeIn">
                            <div class="multisteps-form__content">
                                <div class="row mt-1">
                                    <div class="col-12" style="text-align: right">
                                        <a class="btn bg-gradient-success" href="#" data-bs-toggle="modal"
                                            data-bs-target="#acceptanceModal">+ Add</a>
                                    </div>
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="table table-flush" id="datatable-search3">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Details Received</th>
                                                        <th>Acceptance Date</th>
                                                        <th>Type</th>
                                                        <th>Remarks</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($acceptances as $item)
                                                    <tr>
                                                        <td>{{$loop->index+1}}</td>
                                                        <td>{{ $item->details_received }}</td>
                                                        <td>{{ $item->acceptance_date }}</td>
                                                        <td>{{ $item->type }}</td>
                                                        <td>{{ $item->remarks }}</td>
                                                        <td>
                                                            <a data-route="{{ url('projects/acceptances/'.$item->id) }}" data-csrf="{{ csrf_token() }}" onclick="removeData(this)" class="ms-3" data-bs-toggle="tooltip">
                                                                <i class="fas fa-trash text-danger" aria-hidden="true"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Decomm Materials -->
                        <div class="card multisteps-form__panel p-3 border-radius-xl bg-white"
                            data-animation="FadeIn">
                            <div class="multisteps-form__content">
                                <div class="row mt-1">
                                    <div class="col-12" style="text-align: right">
                                        <a class="btn bg-gradient-success" href="#" data-bs-toggle="modal"
                                            data-bs-target="#decommModal">+ Add</a>
                                    </div>
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="table table-flush" id="datatable-search4">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Decomm Submission Date</th>
                                                        <th>Status</th>
                                                        <th>Remarks</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($decomms as $item)
                                                    <tr>
                                                        <td>{{$loop->index+1}}</td>
                                                        <td>{{ $item->submission_date }}</td>
                                                        <td>{{ $item->status }}</td>
                                                        <td>{{ $item->remarks }}</td>
                                                        <td>
                                                            <a data-route="{{ url('projects/decomms/'.$item->id) }}" data-csrf="{{ csrf_token() }}" onclick="removeData(this)" class="ms-3" data-bs-toggle="tooltip">
                                                                <i class="fas fa-trash text-danger" aria-hidden="true"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Documentation -->
                        <div class="card multisteps-form__panel p-3 border-radius-xl bg-white" data-animation="FadeIn">
                            <div class="multisteps-form__content">
                                <div class="row mt-1">
                                    <div class="col-12" style="text-align: right">
                                        <a class="btn bg-gradient-success" href="#" data-bs-toggle="modal"
                                            data-bs-target="#documentationModal">+ Add</a>
                                    </div>
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="table table-flush" id="datatable-search5">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Document</th>
                                                        <th>Details Received</th>
                                                        <th>Document Type</th>
                                                        <th>Submission Date</th>
                                                        <th>WCR Date</th>
                                                        <th>WCR Status</th>
                                                        <th>Status</th>
                                                        <th>Remarks</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($documentations as $item)
                                                    <tr>
                                                        <td>{{$loop->index+1}}</td>
                                                        <td>
                                                            <a class="ref-link" href="{{asset('storage')}}/{{$item->document_path}}" target="_blank">
                                                                {{ $item->document_name }}
                                                            </a>
                                                        </td>
                                                        <td>{{ $item->details_received }}</td>
                                                        <td>{{ $item->document_type }}</td>
                                                        <td>{{ $item->submission_date }}</td>
                                                        <td>{{ $item->wcr_date }}</td>
                                                        <td>{{ $item->wcr_status }}</td>
                                                        <td>{{ $item->status }}</td>
                                                        <td>{{ $item->remarks }}</td>
                                                        <td>
                                                            <a data-route="{{ url('projects/documentations/'.$item->id) }}" data-csrf="{{ csrf_token() }}" onclick="removeData(this)" class="ms-3" data-bs-toggle="tooltip">
                                                                <i class="fas fa-trash text-danger" aria-hidden="true"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Kanban -->
                        <div class="multisteps-form__panel p-3" data-animation="FadeIn">
                            <div class="multisteps-form__content">
                                <div class="container-fluid py-4">
                                    <div class="mt-3 kanban-container">
                                        <div class="py-2 min-vh-100 d-inline-flex" style="overflow-x: auto">
                                            <div id="myKanban"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Material Modal -->
<div class="modal fade" id="materialModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="materials">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="materialModalLabel">Add Material</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-form-label">Collection Date:</label>
                        <input type="date" name="collection_date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Collected By:</label>
                        <input type="text" name="collected_by" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Remarks:</label>
                        <textarea name="remarks" rows="3" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Installation Modal -->
<div class="modal fade" id="installationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="installation">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="materialModalLabel">Add Installation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-form-label">Scope:</label>
                        <input type="text" name="scope" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Team:</label>
                        <input type="text" name="team" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Start Date:</label>
                        <input type="date" name="start_date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Complete Date:</label>
                        <input type="date" name="complete_date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Week:</label>
                        <input type="number" name="week" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Remarks:</label>
                        <textarea name="remarks" rows="3" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Acceptance Modal -->
<div class="modal fade" id="acceptanceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="acceptance">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="materialModalLabel">Add Acceptance</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-form-label">Details Received:</label>
                        <input type="text" name="details_received" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Acceptance Date:</label>
                        <input type="date" name="acceptance_date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Type:</label>
                        <input type="text" name="type" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Remarks:</label>
                        <textarea name="remarks" rows="3" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Decomm Modal -->
<div class="modal fade" id="decommModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="decomm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="materialModalLabel">Add Decomm Materials</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-form-label">Submission Date:</label>
                        <input type="date" name="submission_date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Status:</label>
                        <input type="text" name="status" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Remarks:</label>
                        <textarea name="remarks" rows="3" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Documentation Modal -->
<div class="modal fade" id="documentationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="documentation" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="materialModalLabel">Add Decomm Materials</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-form-label">Document:</label>
                        <input type="file" name="document" id="document" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Details Received:</label>
                        <input type="text" name="details_received" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Document Type:</label>
                        <input type="text" name="document_type" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Submission Date:</label>
                        <input type="date" name="submission_date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">WCR Date:</label>
                        <input type="date" name="wcr_date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">WCR Status:</label>
                        <input type="text" name="wcr_status" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Status:</label>
                        <input type="text" name="status" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Remarks:</label>
                        <textarea name="remarks" rows="3" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Kanban Modal -->
<div class="modal fade" id="jkanban-info-modal" style="display: none" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="h5 modal-title">Task details</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="pt-4 modal-body">
                <input id="jkanban-task-id" class="d-none" />
                <div class="mb-4 input-group">
                    <span class="input-group-text">
                        <i class="far fa-edit"></i>
                    </span>
                    <input class="form-control" placeholder="Task Title" type="text" id="jkanban-task-title" />
                </div>
                <div class="mb-4 input-group">
                    <span class="input-group-text">
                        <i class="fas fa-user"></i>
                    </span>
                    <input class="form-control" placeholder="Task Assignee" type="text" id="jkanban-task-assignee" />
                </div>
                <div class="form-group">
                    <textarea class="form-control" placeholder="Task Description" id="jkanban-task-description" rows="4"></textarea>
                </div>
                <div class="alert alert-success d-none">Changes saved!</div>
                <div class="text-end">
                    <button class="m-1 btn btn-primary" id="jkanban-update-task" data-toggle="modal" data-target="#jkanban-info-modal">
                        Save changes
                    </button>
                    <button type="button" class="m-1 btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('pagespecificscripts')
    <script src="{{ asset('assets/js/plugins/multistep-form.js') }}"></script>
    <script>
        const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
            searchable: false,
            paging: false,
            sortable: false
        });

        const dataTableSearch2 = new simpleDatatables.DataTable("#datatable-search2", {
            searchable: false,
            paging: false,
            sortable: false
        });

        const dataTableSearch3 = new simpleDatatables.DataTable("#datatable-search3", {
            searchable: false,
            paging: false,
            sortable: false
        });

        const dataTableSearch4 = new simpleDatatables.DataTable("#datatable-search4", {
            searchable: false,
            paging: false,
            sortable: false
        });

        const dataTableSearch5 = new simpleDatatables.DataTable("#datatable-search5", {
            searchable: false,
            paging: false,
            sortable: false
        });

        /*---form1 submit---*/
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#project').submit(function(e) {

            const swalCustomButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn bg-gradient-info',
                },
                buttonsStyling: false
            })

            e.preventDefault();
            var form = $(this)[0]; //selector for the current form
            var id = "{{ Request::segment(2) }}";

            //if form validation passed
            if (form.checkValidity() === true) {
                
                //submit to backend
                var formData = new FormData(this);
                formData.append("_method", "PUT");

                $.ajax({
                    // url: "{{ url('projects/' . $project->id) }}",
                    url: ROUTE.PROJECT.PROJECTS + '/{{ $project->id }}',
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log("success");
                        swalCustomButtons.fire({
                            icon: 'success',
                            position: 'center',
                            type: 'success',
                            title: 'Data Update Successfully!',
                            showButton: true,
                        })
                        setTimeout(function() {
                            window.location = "/projects";
                        }, 1500);
                    },
                    error: function(error) {
                        console.log("error");
                        Swal.fire(
                            'Error!',
                            "Failed! Please try again.",
                            'error'
                        )
                    }
                });
            }
        });

        $('#materials').submit(function(e) {

            const swalCustomButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn bg-gradient-info',
                },
                buttonsStyling: false
            })

            e.preventDefault();
            var form = $(this)[0]; //selector for the current form
            var id = "{{ Request::segment(2) }}";

            //if form validation passed
            if (form.checkValidity() === true) {
                
                //submit to backend
                var formData = new FormData(this);

                $.ajax({
                    // url: "{{ url('projects/' . $project->id) }}",
                    url: ROUTE.PROJECT.PROJECTS + '/{{ $project->id }}/materials',
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log("success");
                        swalCustomButtons.fire({
                            icon: 'success',
                            position: 'center',
                            type: 'success',
                            title: 'Materials Added!',
                            showButton: true,
                        })
                        setTimeout(function() {
                            window.location.reload();
                        }, 1500);
                    },
                    error: function(error) {
                        console.log("error");
                        Swal.fire(
                            'Error!',
                            "Failed! Please try again.",
                            'error'
                        )
                    }
                });
            }
        });

        $('#installation').submit(function(e) {

            const swalCustomButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn bg-gradient-info',
                },
                buttonsStyling: false
            })

            e.preventDefault();
            var form = $(this)[0]; //selector for the current form
            var id = "{{ Request::segment(2) }}";

            //if form validation passed
            if (form.checkValidity() === true) {
                
                //submit to backend
                var formData = new FormData(this);

                $.ajax({
                    // url: "{{ url('projects/' . $project->id) }}",
                    url: ROUTE.PROJECT.PROJECTS + '/{{ $project->id }}/installations',
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log("success");
                        swalCustomButtons.fire({
                            icon: 'success',
                            position: 'center',
                            type: 'success',
                            title: 'Installations Added!',
                            showButton: true,
                        })
                        setTimeout(function() {
                            window.location.reload();
                        }, 1500);
                    },
                    error: function(error) {
                        console.log("error");
                        Swal.fire(
                            'Error!',
                            "Failed! Please try again.",
                            'error'
                        )
                    }
                });
            }
        });

        $('#acceptance').submit(function(e) {

            const swalCustomButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn bg-gradient-info',
                },
                buttonsStyling: false
            })

            e.preventDefault();
            var form = $(this)[0]; //selector for the current form
            var id = "{{ Request::segment(2) }}";

            //if form validation passed
            if (form.checkValidity() === true) {
                
                //submit to backend
                var formData = new FormData(this);

                $.ajax({
                    // url: "{{ url('projects/' . $project->id) }}",
                    url: ROUTE.PROJECT.PROJECTS + '/{{ $project->id }}/acceptances',
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log("success");
                        swalCustomButtons.fire({
                            icon: 'success',
                            position: 'center',
                            type: 'success',
                            title: 'Acceptances Added!',
                            showButton: true,
                        })
                        setTimeout(function() {
                            window.location.reload();
                        }, 1500);
                    },
                    error: function(error) {
                        console.log("error");
                        Swal.fire(
                            'Error!',
                            "Failed! Please try again.",
                            'error'
                        )
                    }
                });
            }
        });

        $('#decomm').submit(function(e) {

            const swalCustomButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn bg-gradient-info',
                },
                buttonsStyling: false
            })

            e.preventDefault();
            var form = $(this)[0]; //selector for the current form
            var id = "{{ Request::segment(2) }}";

            //if form validation passed
            if (form.checkValidity() === true) {
                
                //submit to backend
                var formData = new FormData(this);

                $.ajax({
                    // url: "{{ url('projects/' . $project->id) }}",
                    url: ROUTE.PROJECT.PROJECTS + '/{{ $project->id }}/decomms',
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log("success");
                        swalCustomButtons.fire({
                            icon: 'success',
                            position: 'center',
                            type: 'success',
                            title: 'Decomm Materials Added!',
                            showButton: true,
                        })
                        setTimeout(function() {
                            window.location.reload();
                        }, 1500);
                    },
                    error: function(error) {
                        console.log("error");
                        Swal.fire(
                            'Error!',
                            "Failed! Please try again.",
                            'error'
                        )
                    }
                });
            }
        });

        $('#documentation').submit(function(e) {

            const swalCustomButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn bg-gradient-info',
                },
                buttonsStyling: false
            })

            e.preventDefault();
            var form = $(this)[0]; //selector for the current form
            var id = "{{ Request::segment(2) }}";

            //if form validation passed
            if (form.checkValidity() === true) {
                
                //submit to backend
                var formData = new FormData(this);

                $.ajax({
                    // url: "{{ url('projects/' . $project->id) }}",
                    url: ROUTE.PROJECT.PROJECTS + '/{{ $project->id }}/documentations',
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log("success");
                        swalCustomButtons.fire({
                            icon: 'success',
                            position: 'center',
                            type: 'success',
                            title: 'Documentations Added!',
                            showButton: true,
                        })
                        setTimeout(function() {
                            window.location.reload();
                        }, 1500);
                    },
                    error: function(error) {
                        console.log("error");
                        Swal.fire(
                            'Error!',
                            "Failed! Please try again.",
                            'error'
                        )
                    }
                });
            }
        });

    </script>

    <script>
        // jkanban init
        (function() {
            if (document.getElementById("myKanban")) {

                var KanbanTest = new jKanban({
                    element: "#myKanban",
                    gutter: "10px",
                    widthBoard: "350px",
                    responsivePercentage: false,   
                    click: el => {

                        let jkanbanInfoModal = document.getElementById("jkanban-info-modal");

                        let jkanbanInfoModalTaskId = document.querySelector(
                            "#jkanban-info-modal #jkanban-task-id"
                        );
                        let jkanbanInfoModalTaskTitle = document.querySelector(
                            "#jkanban-info-modal #jkanban-task-title"
                        );
                        let jkanbanInfoModalTaskAssignee = document.querySelector(
                            "#jkanban-info-modal #jkanban-task-assignee"
                        );
                        let jkanbanInfoModalTaskDescription = document.querySelector(
                            "#jkanban-info-modal #jkanban-task-description"
                        );
                        let taskId = el.getAttribute("data-eid");

                        let taskTitle = el.querySelector('p.text').innerHTML;
                        let taskAssignee = el.getAttribute("data-assignee");
                        let taskDescription = el.getAttribute("data-description");
                        jkanbanInfoModalTaskId.value = taskId;
                        jkanbanInfoModalTaskTitle.value = taskTitle;
                        jkanbanInfoModalTaskAssignee.value = taskAssignee;
                        jkanbanInfoModalTaskDescription.value = taskDescription;

                        var myModal = new bootstrap.Modal(jkanbanInfoModal, {
                            show: true
                        });

                        myModal.show();
                    },

                    buttonClick: function(el, boardId) {

                        if (document.querySelector("[data-id='" + boardId + "'] .itemform") === null) {
                            
                            // create a form to enter element
                            var formItem = document.createElement("form");
                            formItem.setAttribute("class", "itemform");
                            formItem.innerHTML = `<div class="form-group">
                            <textarea class="form-control" rows="2" autofocus></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn bg-gradient-success btn-sm pull-end">Add</button>
                                <button type="button" id="kanban-cancel-item" class="btn bg-gradient-light btn-sm pull-end me-2">Cancel</button>
                            </div>`;

                            KanbanTest.addForm(boardId, formItem);
                            formItem.addEventListener("submit", function(e) {
                                e.preventDefault();
                                
                                var text = e.target[0].value;
                                let newTaskId = "_" + text.toLowerCase().replace(/ /g, "_") + boardId;
                                KanbanTest.addElement(boardId, {
                                    id: newTaskId,
                                    title: text,
                                    class: ["border-radius-md"]
                                });

                                formItem.parentNode.removeChild(formItem);

                            });

                            document.getElementById("kanban-cancel-item").onclick = function() {
                                formItem.parentNode.removeChild(formItem);
                            };
                        }
                    },

                    addItemButton: false,
                    boards: [
                        {
                            id: "_pending",
                            title: 'Pending <div style="float:right;"><button type="button" class="btn bg-gradient-success btn-sm pull-end" data-bs-toggle="modal" data-bs-target="#jkanban-info-modal">+</button></div>',
                            item: [
                                {
                                    id: "_task_1_title_id",
                                    title: '<p class="text mb-0">Pending Task A</p><div class="d-flex kanban-info mt-2"><span class="kanban-created"><b>Added By: </b> Admin</span><span class="kanban-datetime">11 Jan 2023 09:45AM</span></div>',
                                    description: "Complete this task within 2 weeks",
                                    class: ["border-radius-md"]
                                },
                                {
                                    id: "_task_2_title_id",
                                    title: '<p class="text mb-0">Pending Task B</p><div class="d-flex kanban-info mt-2"><span class="kanban-created"><b>Added By: </b> Admin</span><span class="kanban-datetime">10 Jan 2023 10:57AM</span></div>',
                                    description: "Complete this task within 2 weeks",
                                    class: ["border-radius-md"]
                                },
                                
                            ]
                        },
                        {
                            id: "_in_progress",
                            title: 'In progress <div style="float:right;"><button type="button" class="btn bg-gradient-success btn-sm pull-end" data-bs-toggle="modal" data-bs-target="#jkanban-info-modal">+</button></div>',
                            item: [
                                {
                                    id: "_task_3_title_id",
                                    title: '<p class="text mb-0">In Progress A</p><div class="d-flex kanban-info mt-2"><span class="kanban-created"><b>Added By: </b> Admin</span><span class="kanban-datetime">12 Jan 2023 11:17AM</span></div>',
                                    class: ["border-radius-md"]
                                },
                                {
                                    id: "_task_4_title_id",
                                    title: '<p class="text mb-0">In Progress B</p><div class="d-flex kanban-info mt-2"><span class="kanban-created"><b>Added By: </b> Admin</span><span class="kanban-datetime">12 Jan 2023 01:23PM</span></div>',
                                    class: ["border-radius-md"]
                                },
                                {
                                    id: "_task_4_title_id",
                                    title: '<p class="text mb-0">In Progress C</p><div class="d-flex kanban-info mt-2"><span class="kanban-created"><b>Added By: </b> Admin</span><span class="kanban-datetime">12 Jan 2023 04:36PM</span></div>',
                                    assignee: "Done Joe",
                                    description: "This task's description is for something, but not for anything",
                                    class: ["border-radius-md"]
                                }
                            ]
                        },
                        {
                            id: "_completed",
                            title: 'Completed <div style="float:right;"><button type="button" class="btn bg-gradient-success btn-sm pull-end" data-bs-toggle="modal" data-bs-target="#jkanban-info-modal">+</button></div>',
                            item: [
                                {
                                    id: "_task_do_something_2_id",
                                    title: '<p class="text mb-0">Completed A</p><div class="d-flex kanban-info mt-2"><span class="kanban-created"><b>Added By: </b> Admin</span><span class="kanban-datetime">15 Jan 2023 03:16PM</span></div>',
                                    assignee: "Done Joe",
                                    description: "This task's description is for something, but not for anything",
                                    class: ["border-radius-md"]
                                },
                            ]
                        }
                    ]
                });

                // var addBoardDefault = document.getElementById("jkanban-add-new-board");
                // addBoardDefault.addEventListener("click", function() {
                //     let newBoardName = document.getElementById("jkanban-new-board-name").value;
                //     let newBoardId = "_" + newBoardName.toLowerCase().replace(/ /g, "_");
                //         KanbanTest.addBoards([{
                //             id: newBoardId,
                //             title: newBoardName,
                //             item: []
                //         }]);
                //     document.querySelector('#new-board-modal').classList.remove('show');
                //     document.querySelector('body').classList.remove('modal-open');
                //     document.querySelector('.modal-backdrop').remove();
                // });

                // var updateTask = document.getElementById("jkanban-update-task");
                // updateTask.addEventListener("click", function() {

                //     let jkanbanInfoModalTaskId = document.querySelector("#jkanban-info-modal #jkanban-task-id");
                //     let jkanbanInfoModalTaskTitle = document.querySelector("#jkanban-info-modal #jkanban-task-title");
                //     let jkanbanInfoModalTaskAssignee = document.querySelector("#jkanban-info-modal #jkanban-task-assignee");
                //     let jkanbanInfoModalTaskDescription = document.querySelector("#jkanban-info-modal #jkanban-task-description");

                //     KanbanTest.replaceElement(jkanbanInfoModalTaskId.value, {
                //         title: jkanbanInfoModalTaskTitle.value,
                //         assignee: jkanbanInfoModalTaskAssignee.value,
                //         description: jkanbanInfoModalTaskDescription.value
                //     });
                    
                //     jkanbanInfoModalTaskId.value = jkanbanInfoModalTaskId.value;
                //     jkanbanInfoModalTaskTitle.value = jkanbanInfoModalTaskTitle.value;
                //     jkanbanInfoModalTaskAssignee.value = jkanbanInfoModalTaskAssignee.value;
                //     jkanbanInfoModalTaskDescription.value = jkanbanInfoModalTaskDescription.value;
                //     document.querySelector('#jkanban-info-modal').classList.remove('show');
                //     document.querySelector('body').classList.remove('modal-open');
                //     document.querySelector('.modal-backdrop').remove();

                // });
            }
        })();
    </script>
    
@endsection
