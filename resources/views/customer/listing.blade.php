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
                            <h5 class="mb-0">Customers</h5>
                            <p class="text-sm mb-0">
                                Table list of customers.
                            </p>
                        </div>
                        <div class="col-sm-6" style="text-align:right;">
                            <a href="{{ url('customers/add') }}" role="button" class="btn bg-gradient-success">+ Add
                                Customer</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-flush" id="datatable-search">
                        <thead class="thead-light">
                            <tr>
                                <th>Company Name</th>
                                <th>Registration No.</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $customer)
                            <tr>
                                <td class="text-sm font-weight-normal">
                                    <a class="ref-link" href="{{url('customers')}}/{{$customer->id}}">{{$customer->company_name}}</a>
                                </td>
                                <td class="text-sm font-weight-normal">{{$customer->registration_no}}</td>
                                <td class="text-sm font-weight-normal">{{$customer->contact}}</td>
                                <td class="text-sm font-weight-normal">{{$customer->email}}</td>
                                <td>
                                    <span class="badge badge-dot me-4">
                                        <i class="bg-success"></i>
                                        <span class="text-dark text-xs">{{$customer->status}}</span>
                                    </span>
                                </td>
                                <td class="text-sm">
                                    <a href="{{url('customers')}}/{{$customer->id}}" data-bs-toggle="tooltip" data-bs-original-title="More">
                                        <i class="fas fa-eye text-info" aria-hidden="true"></i>
                                    </a>
                                    <a data-route="{{url('api/customers')}}/{{$customer->id}}" onclick="removeData(this)" class="ms-3" data-bs-toggle="tooltip"
                                        data-bs-original-title="Delete product">
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
