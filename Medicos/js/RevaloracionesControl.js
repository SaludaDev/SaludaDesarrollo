function CargaRevaloraciones() {


    $.post("https://controlconsulta.com/Medicos/Consultas/RevaloracionesAgendadas.php", "", function(data) {
        $("#CitasDeRevaloracion").html(data);
    })

}



CargaRevaloraciones();