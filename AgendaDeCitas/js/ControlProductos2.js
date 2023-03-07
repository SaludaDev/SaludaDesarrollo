function CargaProductos(){


  $.post("https://saludaclinicas.com/AgendaDeCitas/Consultas/Productos2.php","",function(data){
    $("#tablaProductos").html(data);
  })

}



CargaProductos();