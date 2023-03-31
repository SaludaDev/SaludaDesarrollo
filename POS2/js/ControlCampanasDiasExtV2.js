function CargaCitasEnSucursalExt(){


    $.post("https://saludaclinicas.com/POS2/Consultas/CitasEnSucursalExtDias.php","",function(data){
      $("#CitasEnLaSucursalExt").html(data);
    })
  
  }
  
  
  
  CargaCitasEnSucursalExt();

  
