function CargaProductos(){


    $.post("https://saludaclinicas.com/AdminPOS/Consultas/ProductosEliminados.php","",function(data){
      $("#tablaProductos").html(data);
    })

  }
  
  
  
  CargaProductos();