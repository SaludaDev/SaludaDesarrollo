function CargaCitasEnSucursalExt(){


    $.post("https://saludaclinicas.com/POS2/Consultas/CitasEnSucursalExt.php","",function(data){
      $("#CitasEnLaSucursalExt").html(data);
    })
  
  }
  
  
  
  CargaCitasEnSucursalExt();

  
