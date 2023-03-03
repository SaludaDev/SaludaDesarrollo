function CargaCitasEnSucursalExt(){


    $.post("https://saludaclinicas.com/AgendaDeCitas/Consultas/CitasEnSucursalExtDias.php","",function(data){
      $("#CitasEnLaSucursalExt").html(data);
    })
  
  }
  
  
  
  CargaCitasEnSucursalExt();

  
