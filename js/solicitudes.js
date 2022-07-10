$(document).ready(function() {

    $("#btn_solicitd").click(function() {

        if (!$("#div_datetime").is(":hidden")) {
            var correcto = true;
            if (!campoVacio($('#nombre_solicitud')))
                correcto = false;
            if (!campoVacio($('#correo_solicitud')))
                correcto = false;
            if (!campoVacio($('#pais_solicitud')))
                correcto = false;
            if (!campoVacio($('#nombre_empresa_solicitud')))
                correcto = false;
            if (!campoVacio($('#cargo_solicitud')))
                correcto = false;
            if (!campoVacio($('#ciudad_solicitud')))
                correcto = false;
            if (!campoVacio($('#telefono_solicitud')))
                correcto = false;
            if (!campoVacio($('#hora_solicitud')))
                correcto = false;
            if (!campoVacio($('#fecha_solicitud')))
                correcto = false;

            //Solicitar demo
            if (correcto) {
                traerFeriaActiva(0)
            }
        } else {
            var correcto = true;
            if (!campoVacio($('#nombre_solicitud')))
                correcto = false;
            if (!campoVacio($('#correo_solicitud')))
                correcto = false;
            if (!campoVacio($('#pais_solicitud')))
                correcto = false;
            if (!campoVacio($('#nombre_empresa_solicitud')))
                correcto = false;
            if (!campoVacio($('#cargo_solicitud')))
                correcto = false;
            if (!campoVacio($('#ciudad_solicitud')))
                correcto = false;
            if (!campoVacio($('#telefono_solicitud')))
                correcto = false;
            //socio partner
            if (correcto) {
                traerFeriaActiva(2)
            }
        }



    })
    $("#id_btn_send_message").click(function() {

        var correcto = true;
        if (!campoVacio($('#nombre')))
            correcto = false;
        if (!campoVacio($('#email')))
            correcto = false;
        if (!campoVacio($('#message')))
            correcto = false;
        //solicitar info
        if (correcto) {
            traerFeriaActiva(1)
        }

    })


    function Contactar(url, type) {
        let nombre = $("#nombre").val();
        let email = $("#email").val();
        let message = $("#message").val();
        var urlApi = url + 'api/info-contact'
        $.post(urlApi, {
            'correo': email,
            'nombre': nombre,
            'message': message,
            'type': type
        }, function(data) {

            generadorAlertas('success', data.data, 'Se comunicarán contigo por correo lo mas pronto posible');
            $("#nombre").val('');
            $("#email").val('');
            $("#message").val('');
        });
    }

    function SolicitudDemo(url, type) {

        let nombre_solicitud = $("#nombre_solicitud").val();
        let correo_solicitud = $("#correo_solicitud").val();
        let mensaje_solicitud = $("#mensaje_solicitud").val();
        let pais_solicitud = $("#pais_solicitud").val();
        let ciudad_solicitud = $("#ciudad_solicitud").val();
        let telefono_solicitud = $("#telefono_solicitud").val();
        let fecha_solicitud = $("#fecha_solicitud").val();
        let hora_solicitud = $("#hora_solicitud").val();
        let nombre_empresa_solicitud = $("#nombre_empresa_solicitud").val();
        let cargo_solicitud = $("#cargo_solicitud").val();
        let web_solicitud = $("#web_solicitud").val();
        var urlApi = url + 'api/solicitud-demo'
            // alert(urlApi)
        $.post(urlApi, {
            'nombre_solicitud': nombre_solicitud,
            'correo_solicitud': correo_solicitud,
            'mensaje_solicitud': mensaje_solicitud,
            'pais_solicitud': pais_solicitud,
            'ciudad_solicitud': ciudad_solicitud,
            'telefono_solicitud': telefono_solicitud,
            'fecha_solicitud': fecha_solicitud,
            'hora_solicitud': hora_solicitud,
            'nombre_empresa': nombre_empresa_solicitud,
            'cargo_solicitud': cargo_solicitud,
            'web_solicitud': web_solicitud,
            'type': type
        }, function(data) {
            if (data.codigo == 0) {
                generadorAlertas('success', data.data, 'Se te comunicará por correo cuando acepten tu solicitud');
                $("#nombre_solicitud").val('');
                $("#correo_solicitud").val('');
                $("#mensaje_solicitud").val('');
                $("#pais_solicitud").val('');
                $("#ciudad_solicitud").val('');
                $("#telefono_solicitud").val('');
                $("#nombre_empresa_solicitud").val('');
                $("#cargo_solicitud").val('');
                $("#web_solicitud").val('');
                $("#fecha_solicitud").val('');
                $("#hora_solicitud").val('');
            } else {
                generadorAlertas('error', data.data, '');
            }

        });
    }

    function SocioPartner(url, type) {
        let nombre_solicitud = $("#nombre_solicitud").val();
        let correo_solicitud = $("#correo_solicitud").val();
        let mensaje_solicitud = $("#mensaje_solicitud").val();
        let pais_solicitud = $("#pais_solicitud").val();
        let ciudad_solicitud = $("#ciudad_solicitud").val();
        let telefono_solicitud = $("#telefono_solicitud").val();
        let nombre_empresa_solicitud = $("#nombre_empresa_solicitud").val();
        let cargo_solicitud = $("#cargo_solicitud").val();
        let web_solicitud = $("#web_solicitud").val();
        var urlApi = url + 'api/socio-partner'
            // alert(urlApi)
        $.post(urlApi, {
            'nombre_solicitud': nombre_solicitud,
            'correo_solicitud': correo_solicitud,
            'mensaje_solicitud': mensaje_solicitud,
            'pais_solicitud': pais_solicitud,
            'ciudad_solicitud': ciudad_solicitud,
            'telefono_solicitud': telefono_solicitud,
            'nombre_empresa': nombre_empresa_solicitud,
            'cargo_solicitud': cargo_solicitud,
            'web_solicitud': web_solicitud,
            'type': type

        }, function(data) {
            if (data.codigo == 0) {
                generadorAlertas('success', data.data, 'Se comunicarán a tu correo o teléfono lo más pronto posible');
                $("#nombre_solicitud").val('');
                $("#correo_solicitud").val('');
                $("#mensaje_solicitud").val('');
                $("#pais_solicitud").val('');
                $("#ciudad_solicitud").val('');
                $("#telefono_solicitud").val('');
                $("#fecha_solicitud").val('');
                $("#nombre_empresa_solicitud").val('');
                $("#cargo_solicitud").val('');
                $("#web_solicitud").val('');
                $("#hora_solicitud").val('');
            } else {
                generadorAlertas('error', data.data, '');
            }

        });
    }

    function traerFeriaActiva(type) {

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "Ajax/GetFerias.php",

            success: function(r) {
                console.log("BIEN --", r);

                var newHtml = "";
                var feriaActivaHtml = "";
                var year = "";
                var month = "";
                var day = "";
                var UrlFeriaActiva = "";

                if (r != null) {
                    $.each(r, function(index, course) {

                        if (index == 0) {
                            generadorAlertas('success', "Conectando con el servidor", 'Espere por favor...');
                            if (type == 0)
                                SolicitudDemo(course.url_fair, 'Demo')
                            else if (type == 1)
                                Contactar(course.url_fair, 'Información de contacto')
                            else
                                SocioPartner(course.url_fair, 'Socio partner')

                        }


                    });
                } else {
                    generadorAlertas('error', 'Error', 'Hubo un problema inesperado al conectarse al servidor, intenta nuevamente')
                }



            },
            error: function(h) {
                console.log(h);
                generadorAlertas('error', 'Error', 'Hubo un problema inesperado al conectarse al servidor, intenta nuevamente')
            }

        });
    }


    function generadorAlertas(tipo, titulo, mensaje) {
        Command: iziToast[tipo]({
            message: mensaje,
            title: titulo,
            position: 'topLeft',
            theme: "light",
            balloon: true,
            animateInside: true,
            animatedInside: true,
            maxWidth: 450,
            transitionIn: 'bounceInLeft',
            transitionOut: 'fadeOut',
            transitionInMobile: 'bounceInLeft',
            transitionOutMobile: 'fadeOutDown'
        });
    }

    function campoVacio(obj) {
        var correcto = true;
        if (obj.val() == '') {
            var placholder = obj.attr('placeholder');
            var type = obj.attr('type');
            generadorAlertas('error', 'Dato requerido', 'El campo' + ' ' + placholder + ' ' + 'esta vacio')
            correcto = false;
        }
        return correcto;
    };

});