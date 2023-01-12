@extends('layout.app')

@section('customstyle')
@stop

@section('content')
<div class="container-fluid py-4">
  <div class="row mt-4">
    <div class="col-12">
      <div class="row">
        <!-- Textual inputs start -->
        <div class="col-12 mt-5">
          <div class="card">
            <div class="card-body">
              <h4 class="header-title" style="font-size:24px;text-align:center;" >
                <b>Add Project</b>
              </h4>
              <form id="form1">
              @csrf
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="name" class="col-form-label">
                            Project Name <b style="color:red;">*</b>
                        </label>
                        <input class="form-control" type="text" value="" id="name" name="name">
                    </div>
                    <div class="col-md-6">
                        <label for="customer_id" class="col-form-label">
                            Customer <b style="color:red;">*</b>
                        </label>
                        <select class="form-control" id="customer_id" name="customer_id">
                            <option value="" style="font-size:16px;">--Select Company--</option>
                            @foreach($customers as $customer)
                            <option value="{{$customer->id}}" style="font-size:16px;">
                                {{$customer->company_name}}
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
                            <option value="" style="font-size:16px;">--Select Site--</option>
                            @foreach($sites as $site)
                            <option value="{{$site->id}}" style="font-size:16px;">
                                {{$site->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="project_manager" class="col-form-label">
                            Project Manager <b style="color:red;">*</b>
                        </label>
                        <input class="form-control" type="text" value="" id="project_manager" name="project_manager">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="date" class="col-form-label">
                            Date <b style="color:red;">*</b>
                        </label>
                        <input class="form-control" type="date" value="" id="date" name="date">
                    </div>
                    <div class="col-md-6">
                        <label for="status" class="col-form-label">
                            Status <b style="color:red;">*</b>
                        </label>
                        <select class="form-control" id="status" name="status">
                            <option value="" style="font-size:16px;">--Select Status--</option>
                            <option value="Active" style="font-size:16px;">
                              Active
                            </option>
                            <option value="Inactive" style="font-size:16px;">
                              Inactive
                            </option>
                        </select>
                    </div>
                </div>
                <br>
                <div style="text-align:center;">
                  <button class="btn bg-gradient-info lg-3" type="submit" role="button">Save</button>
                  <a class="btn bg-gradient-info lg-3" href="{{url('/customers')}}" role="button">Back</a>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Textual inputs end -->
      </div>
    </div>
  </div>
</div>
@endsection

@section('pagespecificscripts')
<script>
  /*---form1 submit---*/
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
  $('#form1').submit(function(e){

    e.preventDefault();
    console.log("hahaha")
    const swalCustomButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn bg-gradient-info',
        },
        buttonsStyling: false
      })
      // if form validation passed

          //submit to backend
          var formData = new FormData(this);

           $.ajax({
               url: ROUTE.PROJECT.ADD,
               type: "post",
               data: formData,
               processData: false,
               contentType: false,
              success: function (response) {
                 console.log("success");
                 swalCustomButtons.fire({
                        icon: 'success',
                        position: 'center',
                        type: 'success',
                        title: 'Data Add Successfully!',
                        showButton: true,
                    })
                    setTimeout(function(){
                        window.location = "/projects";
                    }, 1500);
              },
              error: function (error) {
                Swal.fire(
                        'Error!',
                        "Failed! Please try again.",
                        'error'
                    )
              }
          });
       }
   );
</script>
@endsection
