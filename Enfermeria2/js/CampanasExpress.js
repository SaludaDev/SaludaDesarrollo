function CargaCitasEnSucursalExt(){


    $.post("https://controlconsulta.com/Enfermeria2/Consultas/CitasEnSucursalExt.php","",function(data){
      $("#CitasEnLaSucursalExt").html(data);
    })
  
  }
  
  
  
  CargaCitasEnSucursalExt();

  
