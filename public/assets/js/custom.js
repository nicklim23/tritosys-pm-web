$(function(){
    $('.update-btn').on('click', function(){
        var fieldset = $(this).data('fieldset');
        $(fieldset).removeAttr("disabled");
        $(this).hide();
        $('.save-btn').show();
    });
});

function removeData(button) {
    const swalCustomButtons = Swal.mixin({
          customClass: {
            confirmButton: 'btn bg-gradient-success',
            cancelButton: 'btn bg-gradient-danger',
          },
          buttonsStyling: false
        })
    const swalCustomButtons2 = Swal.mixin({
        customClass: {
            confirmButton: 'btn bg-gradient-info',
            },
            buttonsStyling: false
        })
      var route = $(button).data('route');
      swalCustomButtons.fire({
          icon: 'warning',
          title: 'Delete Confirmation',
          text: "Are you sure want to delete this data?",
          type: 'warning',
          showCancelButton: true,
          reverseButtons: true,
          confirmButtonText: "Delete"
      }).then((result) => {
          if (result.value) {
              $.ajax({
                  type: "DELETE",
                  url: route,
                  success: function (response) {
                      console.log(response);
                      swalCustomButtons2.fire({
                          icon: 'success',
                          position: 'center',
                          type: 'success',
                          title: 'Data Deleted',
                          showButton: true,
                      })
                      setTimeout(function(){
                        window.location.reload();
                      }, 1500);
                  },
                  error: function (xhr, status, error) {
                      Swal.fire(
                          'Error!',
                          "Failed! Please try again.",
                          'error'
                      )
                      console.log(error);
                  }
              });
          }
      });
}
