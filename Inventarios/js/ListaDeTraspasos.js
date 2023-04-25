function CargaProductos(){


    $.get("https://saludaclinicas.com/AdminPOS/Consultas/ListaTraspasos.php","",function(data){
      $("#tablaProductos").html(data);
    })
  
  }
  
  
  
  CargaProductos();