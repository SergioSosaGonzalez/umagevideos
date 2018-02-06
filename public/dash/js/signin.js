$(document).ready(function () {

    $('#inicioSesion').formValidation({
        framework:'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },fields: {
            email:{
                validators: {
                    notEmpty: {
                        message:'Se requiere email'
                    }
                }
            },
            password: {
                validators:{
                    notEmpty:{
                        message:'Se requiere el password',

                    }
                }
            }
        }
    }).on('success.form.fv', function(e) {
        e.preventDefault();
        $.ajax({
            url:"/iniciarsesion",
            method:"post",
            data:$(this).serialize(),
            dataType:"json",
            success:function (resp) {
                if(resp.message=="password incorrecto" || resp.message=="usuario no encontrado"){
                    alert("Password o Usuario no valido");
                }else if(resp.message=="correcto"){
                    window.location.replace("/dashboard");
                }
            }
        })

    });
})
