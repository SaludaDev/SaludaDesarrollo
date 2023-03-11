function CargaCitasEnSucursal(){


    $.post("https://saludaclinicas.com/Enfermeria2/Consultas/CitasEnSucursalDias.php","",function(data){
      $("#CitasEnLaSucursal").html(data);
    })
  
  }
  
  
  
  CargaCitasEnSucursal();

  
