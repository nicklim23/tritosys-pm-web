@extends('layout.app')

@section('customstyle')
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
                                    <button class="multisteps-form__progress-btn js-active" type="button"
                                        title="Project Details">
                                        <span>Project Details</span>
                                    </button>
                                    <button class="multisteps-form__progress-btn" type="button"
                                        title="Materials">Materials</button>
                                    <button class="multisteps-form__progress-btn" type="button"
                                        title="Installation">Installation</button>
                                        <button class="multisteps-form__progress-btn" type="button"
                                        title="Installation">Acceptance</button>
                                    <button class="multisteps-form__progress-btn" type="button"
                                        title="Decomm Materials">Decomm Materials</button>
                                    <button class="multisteps-form__progress-btn" type="button"
                                        title="Installation">Documentation</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--form panels-->
                <div class="row">
                    <div class="col-12 col-lg-12 m-auto">
                        <div class="multisteps-form__form mb-8">
                            <form id="form1">
                                @csrf
                                <!--single form panel 1-->
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
                                                        <option value="{{ $customer->id }}" style="font-size:16px;">
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
                                                        <option value="{{ $site->id }}" style="font-size:16px;">
                                                            {{ $site->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="project_manager" class="col-form-label">
                                                    Project Manager <b style="color:red;">*</b>
                                                </label>
                                                <input class="form-control" type="text"
                                                    value="{{ $project->project_manager }}" id="project_manager"
                                                    name="project_manager">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="date" class="col-form-label">
                                                    Date <b style="color:red;">*</b>
                                                </label>
                                                <input class="form-control" type="date" value="{{ $project->date }}"
                                                    id="date" name="date">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="status" class="col-form-label">
                                                    Status <b style="color:red;">*</b>
                                                </label>
                                                <select class="form-control" id="status" name="status">
                                                    <option value="" style="font-size:16px;">--Select Status--
                                                    </option>
                                                    <option value="Active" style="font-size:16px;">
                                                        Active
                                                    </option>
                                                    <option value="Inactive" style="font-size:16px;">
                                                        Inactive
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end mt-4">
                                            <a class="btn bg-gradient-danger lg-3" href="{{ url('/projects') }}"
                                                role="button">Back</a>
                                            <button class="btn bg-gradient-info lg-3 ms-2" type="submit"
                                                role="button">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!--single form panel 2-->
                            <div class="card multisteps-form__panel p-3 border-radius-xl bg-white"
                                data-animation="FadeIn">
                                <div class="multisteps-form__content">
                                    <div class="row mt-1">
                                        <div class="col-12" style="text-align: right">
                                            <a class="btn bg-gradient-success" href="#" data-bs-toggle="modal"
                                                data-bs-target="#materialModal">+ Add</a>
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
                                                        <tr>
                                                            <td>1</td>
                                                            <td>2023-01-01</td>
                                                            <td>John</td>
                                                            <td>Done</td>
                                                            <td>
                                                                <a data-route="" onclick="removeData(this)"
                                                                    class="ms-3" data-bs-toggle="tooltip">
                                                                    <i class="fas fa-trash text-danger"
                                                                        aria-hidden="true"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--single form panel 3-->
                            <div class="card multisteps-form__panel p-3 border-radius-xl bg-white"
                                data-animation="FadeIn">
                                <div class="multisteps-form__content">
                                    <div class="row mt-1">
                                        <div class="col-12" style="text-align: right">
                                            <a class="btn bg-gradient-success" href="#" data-bs-toggle="modal"
                                                data-bs-target="#materialModal">+ Add</a>
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
                                                        <tr>
                                                            <td>1</td>
                                                            <td>INSTALLATION</td>
                                                            <td>Team A</td>
                                                            <td>2022-12-01</td>
                                                            <td>2023-01-01</td>
                                                            <td>4</td>
                                                            <td>Done</td>
                                                            <td>
                                                                <a data-route="" onclick="removeData(this)"
                                                                    class="ms-3" data-bs-toggle="tooltip">
                                                                    <i class="fas fa-trash text-danger"
                                                                        aria-hidden="true"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--single form panel 4-->
                            <div class="card multisteps-form__panel p-3 border-radius-xl bg-white"
                                data-animation="FadeIn">
                                <div class="multisteps-form__content">
                                    <div class="row mt-1">
                                        <div class="col-12" style="text-align: right">
                                            <a class="btn bg-gradient-success" href="#" data-bs-toggle="modal"
                                                data-bs-target="#materialModal">+ Add</a>
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
                                                        <tr>
                                                            <td>1</td>
                                                            <td>TRUE</td>
                                                            <td>2022-12-01</td>
                                                            <td>RSA</td>
                                                            <td>Done</td>
                                                            <td>
                                                                <a data-route="" onclick="removeData(this)"
                                                                    class="ms-3" data-bs-toggle="tooltip">
                                                                    <i class="fas fa-trash text-danger"
                                                                        aria-hidden="true"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--single form panel 5-->
                            <div class="card multisteps-form__panel p-3 border-radius-xl bg-white"
                                data-animation="FadeIn">
                                <div class="multisteps-form__content">
                                    <div class="row mt-1">
                                        <div class="col-12" style="text-align: right">
                                            <a class="btn bg-gradient-success" href="#" data-bs-toggle="modal"
                                                data-bs-target="#materialModal">+ Add</a>
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
                                                        <tr>
                                                            <td>1</td>
                                                            <td>2023-01-01</td>
                                                            <td>COMPLETE</td>
                                                            <td>Done</td>
                                                            <td>
                                                                <a data-route="" onclick="removeData(this)"
                                                                    class="ms-3" data-bs-toggle="tooltip">
                                                                    <i class="fas fa-trash text-danger"
                                                                        aria-hidden="true"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--single form panel 6-->
                            <div class="card multisteps-form__panel p-3 border-radius-xl bg-white"
                                data-animation="FadeIn">
                                <div class="multisteps-form__content">
                                    <div class="row mt-1">
                                        <div class="col-12" style="text-align: right">
                                            <a class="btn bg-gradient-success" href="#" data-bs-toggle="modal"
                                                data-bs-target="#materialModal">+ Add</a>
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
                                                        <tr>
                                                            <td>1</td>
                                                            <td><a href="#">document.pdf</a></td>
                                                            <td>TRUE</td>
                                                            <td>RSA</td>
                                                            <td>2022-12-01</td>
                                                            <td>2022-12-01</td>
                                                            <td>Closed</td>
                                                            <td>rambung</td>
                                                            <td>uploaded to server</td>
                                                            <td>
                                                                <a data-route="" onclick="removeData(this)"
                                                                    class="ms-3" data-bs-toggle="tooltip">
                                                                    <i class="fas fa-trash text-danger"
                                                                        aria-hidden="true"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
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
                <form id="form2">
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
                        <button type="button" class="btn bg-gradient-primary">Submit</button>
                    </div>
                </form>
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
        $('#form1').submit(function(e) {
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
                formData = new URLSearchParams(formData).toString();
                $.ajax({
                    url: "{{ url('projects/' . $project->id) }}",
                    type: "PUT",
                    data: formData,
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
    </script>
@endsection
