function   CargaProgramaMedicosSucursalesExt(){


    $.post("https://saludaclinicas.com/AgendaDeCitas/Consultas/ProgramacionDeSucursalesExt.php","",function(data){
      $("#ProgramaSucursalesExt").html(data);
    })
  
  }
  
  
  CargaProgramaMedicosSucursalesExt();

  

  
