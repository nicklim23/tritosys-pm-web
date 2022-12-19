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
                <b>Add Customer</b>
              </h4>
              <form id="form1">
              @csrf
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="company_name" class="col-form-label">
                            Company Name <b style="color:red;">*</b>
                        </label>
                        <input class="form-control" type="text" value="" id="company_name" name="company_name">
                    </div>
                    <div class="col-md-6">
                        <label for="registration_no" class="col-form-label">
                            Registration No. <b style="color:red;">*</b>
                        </label>
                        <input class="form-control" type="text" value="" id="registration_no" name="registration_no">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="contact" class="col-form-label">
                            Contact <b style="color:red;">*</b>
                        </label>
                        <input class="form-control" type="text" value="" id="contact" name="contact">
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="col-form-label">
                            Email <b style="color:red;">*</b>
                        </label>
                        <input class="form-control" type="email" value="" id="email" name="email">
                    </div>
                </div>
                <div class="form-group row">
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
               url: "{{url('customers')}}",
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
                        window.location = "/customers";
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
