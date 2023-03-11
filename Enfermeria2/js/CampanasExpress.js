function CargaCitasEnSucursalExt(){


    $.post("https://saludaclinicas.com/Enfermeria2/Consultas/CitasEnSucursalExt.php","",function(data){
      $("#CitasEnLaSucursalExt").html(data);
    })
  
  }
  
  
  
  CargaCitasEnSucursalExt();

  
