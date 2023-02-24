$('document').ready(function($) {



    $("#CancelaCitaDeSucursalessExt").validate({
        rules: {
            Colorpago: {
                required: true,
            },
            Colorcita: {
                required: true,
            },
            Colorseguimiento: {
                required: true,
            }

        },
        messages: {


            Colorpago: {
                required: "<i class='fas fa-exclamation-triangle' style='color:red'></i> Dato requerido ",

            },
            Colorcita: {
                required: "<i class='fas fa-exclamation-triangle' style='color:red'></i> Dato requerido ",

            },
            Colorseguimiento: {
                required: "<i class='fas fa-exclamation-triangle' style='color:red'></i> Dato requerido ",

            },

        },
        submitHandler: submitForm
    });
    // hide messages 


    function submitForm() {



        $.ajax({
            type: 'POST',
            url: "Consultas/EliminaCitaExt.php",
            data: {
                idcancelaExt: $('#idcancelaExt').val(),

            },
            cache: false,
            beforeSend: function() {
                $("#success").fadeOut();

                $("#submit").html("Verificando datos... <span class='fa fa-refresh fa-spin' role='status' aria-hidden='true'></span>");


            },
            success: function(dataResult) {
                var dataResult = JSON.parse(dataResult);
                if (dataResult.statusCode == 200) {


                    $("#submit").attr('disabled', 'disabled');

                    $('#editModalExt').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();

                    $('#EliminadoCompleto').modal('toggle');
                    setTimeout(function() {
                        $('#EliminadoCompleto').modal('hide')
                    }, 2000); // abrir
                    CargaCitasEnSucursalExt();



                    //  Solucionar muestra de modal de exito


                } else if (dataResult.statusCode == 201) {
                    $("#submit").html("Algo no salio bien.. <i class='fas fa-exclamation-triangle'></i>");
                    var modal_lv = 0;
                    $('.modal').on('shown.bs.modal', function(e) {
                        $('.modal-backdrop:last').css('zIndex', 1051 + modal_lv);
                        $(e.currentTarget).css('zIndex', 1052 + modal_lv);
                        modal_lv++
                    });

                    $('.modal').on('hidden.bs.modal', function(e) {
                        modal_lv--
                    });

                    setTimeout(function() {
                        $('#ErrorData').modal('toggle');
                    }, 2000); // abrir
                    setTimeout(function() {
                        $("#submit").html("Aplicar cambios <i class='fas fa-check'></i>");
                    }, 3000); // abrir
                }





            }
        });
        return false;
    }
});