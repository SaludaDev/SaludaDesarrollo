function CargaRevaloraciones() {


    $.post("https://saludaclinicas.com/Enfermeria2/Consultas/RevaloracionesAgendadas.php", "", function(data) {
        $("#CitasDeRevaloracion").html(data);
    })

}



CargaRevaloraciones();