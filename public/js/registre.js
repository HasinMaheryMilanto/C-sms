$(document).ready(function () {


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })



    $('.form_registre').submit(function (e) {
        $('.error_fname').text("");
        $('.error_lname').text("");
        $('.error_email').text("");
        $('.error_phone').text("");
        $('.error_password').text("");
        $('.errormdp').text("")
        $('.error_profil').text("");
        e.preventDefault();
        var form = $(this)[0]
        var formData = new FormData(form)
        $.ajax({
            url: 'registreUser',
            type: 'post',
            processData: false,
            contentType: false,
            data: formData,
            success: function (response) {
                if (response.error) {
                    $('.errormdp').text(response.error)
                } else if (response.existe) {
                    $('.error_email').text(response.existe);
                }
                else {
                    form.reset();
                    swal('success', response.success + '!', 'success')
                    window.location.href = "/"


                }
            },
            error: function (error) {
                $('.error_fname').text(error.responseJSON.errors.fname);
                $('.error_lname').text(error.responseJSON.errors.lname);
                $('.error_email').text(error.responseJSON.errors.email);
                $('.error_phone').text(error.responseJSON.errors.phone);
                $('.error_profil').text(error.responseJSON.errors.profil);
                $('.error_password').text(error.responseJSON.errors.password);
            }
        })
    })
})