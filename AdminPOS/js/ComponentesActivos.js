function CargaComponentesActivos(){


    $.get("https://saludaclinicas.com/AdminPOS/Consultas/ComponentesActivos.php","",function(data){
      $("#ComponentesActivos").html(data);
    })
  
  }
  
  CargaComponentesActivos();

  
  
  
