function CargaCitasEnSucursalExt(){


    $.post("https://saludaclinicas.com/Enfermeria2/Consultas/CitasEnSucursalExtDias.php","",function(data){
      $("#CitasEnLaSucursalExt").html(data);
    })
  
  }
  
  
  
  CargaCitasEnSucursalExt();

  
