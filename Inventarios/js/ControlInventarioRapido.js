function CargaVentasDelDia() {


    $.post("https://saludaclinicas.com/AdminPOS/Consultas/InventarioRapidoResultados.php", "", function(data) {
        $("#TableStockSucursales").html(data);
    })

}



CargaVentasDelDia();