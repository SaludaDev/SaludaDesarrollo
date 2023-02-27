function CargaCitasEnSucursalExt(){


    $.post("https://controlconsulta.com/Enfermeria2/Consultas/CitasEnSucursalExtDias.php","",function(data){
      $("#CitasEnLaSucursalExt").html(data);
    })
  
  }
  
  
  
  CargaCitasEnSucursalExt();

  
