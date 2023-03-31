function CargaProductos(){


    $.get("https://saludaclinicas.com/AdminPOS/Consultas/ListaRegistrosTraspasos.php","",function(data){
      $("#tablaProductos").html(data);
    })
  
  }
  
  
  
  CargaProductos();