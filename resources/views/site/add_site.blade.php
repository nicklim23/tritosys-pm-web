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
                <b>Add Site</b>
              </h4>
              <form id="form1">
                @csrf
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="site_id" class="col-form-label">
                        Site ID <b style="color:red;">*</b>
                    </label>
                    <input class="form-control" type="text" value="" id="site_id" name="site_id">
                  </div>
                  <div class="col-md-6">
                    <label for="name" class="col-form-label">
                      Site Name <b style="color:red;">*</b>
                    </label>
                    <input class="form-control" type="text" value="" id="name" name="name">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="person_in_charge" class="col-form-label">
                        Person In Charge
                    </label>
                    <input class="form-control" type="text" value="" id="person_in_charge" name="person_in_charge">
                  </div>
                  <div class="col-md-6">
                    <label for="address" class="col-form-label">
                      Address <b style="color:red;">*</b>
                    </label>
                    <input class="form-control" type="text" value="" id="showaddress" name="address">
                    <input class="form-control" type="text" value="" id="showlatitude" name="latitude" readonly hidden>
                    <input class="form-control" type="text" value="" id="showlongitude" name="longitude" readonly hidden>
                  </div>
                </div>
                <br>
                <div style="text-align:center;">
                  <button class="btn bg-gradient-info lg-3" type="submit" role="button">Save</button>
                  <a class="btn bg-gradient-info lg-3" href="{{url('/sites')}}" role="button">Back</a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD-T32EU7Qv_7MuLT-xHmzpMdk4EGM12PI&libraries=places"></script>

<script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  /*---form1 submit---*/
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
               url: "{{url('sites')}}",
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
                        window.location = "/sites";
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
<script type="text/javascript">
  window.addEventListener('load', initialize);

  function initialize() {
      var autocomplete = new google.maps.places.Autocomplete(document.getElementById('showaddress'));
      google.maps.event.addListener(autocomplete, 'place_changed', function(){
          var places = autocomplete.getPlace();
          console.log(places);
        //   location += "<b>Latitude:</b>" + places.geometry.location.lat() + "<br/>";
        //   location += "<b>Longitude:</b>" + places.geometry.location.lng() + "<br/>";
          document.getElementById('showlatitude').value = places.geometry.location.lat();
          document.getElementById('showlongitude').value = places.geometry.location.lng();

          var components = places.address_components;
          console.log(components);
          for (var i = 0; i < components.length; i++) {
                console.log(components[i].types[0]);
                if (components[i].types[0] == 'route') {
                  var A = components[i].short_name
                }
                if (components[i].types[0] == 'sublocality_level_1') {
                  var B = components[i].short_name
                }
                $('#street').val(A + ',' + B);
                if (components[i].types[0] == 'locality') {
                  $('#city').val(components[i].short_name)
                }
                if (components[i].types[0] == 'administrative_area_level_1') {
                  $('#state').val(components[i].short_name)
                }
                if (components[i].types[0] == 'country') {
                  $('#country').val(components[i].short_name)
                }
                if (components[i].types[0] == 'postal_code') {
                  $('#postcode').val(components[i].short_name)
                }
          }
      });
  };

</script>
@endsection
