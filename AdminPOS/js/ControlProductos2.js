function CargaProductos(){


  $.post("https://saludaclinicas.com/AdminPOS/Consultas/Productos2.php","",function(data){
    $("#tablaProductos").html(data);
  })

}



CargaProductos();