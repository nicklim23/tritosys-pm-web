$(function(){
    $('.update-btn').on('click', function(){
        var fieldset = $(this).data('fieldset');
        $(fieldset).removeAttr("disabled");
        $(this).hide();
        $('.save-btn').show();
    });
});