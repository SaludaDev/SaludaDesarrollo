function CargaCampanas(){


    $.get("https://saludaclinicas.com/Enfermeria2/Consultas/CampanasSucursal.php","",function(data){
      $("#TablaCampanas").html(data);
    })
  
  }
  
  
  
  CargaCampanas();

  
