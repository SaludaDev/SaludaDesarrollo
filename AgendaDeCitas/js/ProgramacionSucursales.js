function   CargaProgramaMedicosSucursales(){


    $.post("https://saludaclinicas.com/AgendaDeCitas/Consultas/ProgramacionDeSucursales.php","",function(data){
      $("#ProgramaSucursales").html(data);
    })
  
  }
  
  
  CargaProgramaMedicosSucursales();

  

  
