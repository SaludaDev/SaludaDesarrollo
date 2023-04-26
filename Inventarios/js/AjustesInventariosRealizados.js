function StockPorSucursales() {


    $.post("https://saludaclinicas.com/AdminPOS/Consultas/AjustesRealizados.php", "", function(data) {
        $("#TableStockSucursales").html(data);
    })

}



StockPorSucursales();