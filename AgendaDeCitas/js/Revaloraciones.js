function CargaRevaloraciones() {


    $.post("https://saludaclinicas.com/AgendaDeCitas/Consultas/RevaloracionesAgendadas.php", "", function(data) {
        $("#CitasDeRevaloracion").html(data);
    })

}



CargaRevaloraciones();