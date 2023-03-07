function CargaCitasEnSucursalExt(){


    $.post("https://saludaclinicas.com/AgendaDeCitas/Consultas/CitasEnSucursalExt.php","",function(data){
      $("#CitasEnLaSucursalExt").html(data);
    })
  
  }
  
  
  
  CargaCitasEnSucursalExt();



  
