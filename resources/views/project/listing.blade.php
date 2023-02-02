@extends('layout.app')

@section('customstyle')
@stop

@section('content')

    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h5 class="mb-0">Projects</h5>
                            <p class="text-sm mb-0">
                                Table list of projects.
                            </p>
                        </div>
                        <div class="col-sm-6" style="text-align:right;">
                            <a href="{{ url('projects/add') }}" role="button" class="btn bg-gradient-success">+ Add
                                Project</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-flush" id="datatable-search">
                        <thead class="thead-light">
                            <tr>
                                <th>Project Name</th>
                                <th>Customer</th>
                                <th>Site</th>
                                <th>Project Manager</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $project)
                            <tr>
                                <td class="text-sm font-weight-normal">
                                    <a class="ref-link" href="{{url('projects')}}/{{$project->id}}">{{$project->name}}</a>
                                </td>
                                <td class="text-sm font-weight-normal">
                                    <a class="ref-link" href="{{url('customers')}}/{{$project->customer->id}}">{{$project->customer_id?$project->customer->company_name:'-'}}</a>
                                </td>
                                <td class="text-sm font-weight-normal">
                                    <a class="ref-link" href="{{ url('sites')}}/{{$project->site->id}}">{{$project->site_id?$project->site->name:'-'}}</a>
                                </td>
                                <td class="text-sm font-weight-normal">{{$project->project_manager}}</td>
                                <td class="text-sm font-weight-normal">{{$project->date}}</td>
                                <td>
                                    @if($project->status=="Active")
                                    <span class="badge badge-success badge-sm">{{$project->status}}</span>
                                    @else
                                    <span class="badge badge-warning badge-sm">{{$project->status}}</span>
                                    @endif
                                </td>
                                <td class="text-sm">
                                    <a href="{{url('projects')}}/{{$project->id}}" data-bs-toggle="tooltip" data-bs-original-title="More">
                                        <i class="fas fa-eye text-info" aria-hidden="true"></i>
                                    </a>
                                    <a data-route="{{url('projects')}}/{{$project->id}}" data-csrf="{{ csrf_token() }}"  onclick="removeData(this)" class="ms-3" data-bs-toggle="tooltip">
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
@endsection

@section('pagespecificscripts')
    <script>
        const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
            searchable: true,
            fixedHeight: true
        });
    </script>
@endsection
