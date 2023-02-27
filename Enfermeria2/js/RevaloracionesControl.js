function CargaRevaloraciones() {


    $.post("https://controlconsulta.com/Enfermeria2/Consultas/RevaloracionesAgendadas.php", "", function(data) {
        $("#CitasDeRevaloracion").html(data);
    })

}



CargaRevaloraciones();