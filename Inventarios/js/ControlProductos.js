function CargaProductos(){


    $.post("https://saludaclinicas.com/AdminPOS/Consultas/Productos.php","",function(data){
      $("#tablaProductos").html(data);
    })

  }
  
  
  
  CargaProductos();