function StockPorSucursales() {


    $.post("https://saludaclinicas.com/AdminPOS/Consultas/StockSucursalesV2.php", "", function(data) {
        $("#TableStockSucursales").html(data);
    })

}



StockPorSucursales();