function RegistroEnergias() {


    $.post("https://saludaclinicas.com/AdminPOS/Consultas/RegistroDeEnergia.php", "", function(data) {
        $("#RegistrosEnergiatabla").html(data);
    })

}



RegistroEnergias();