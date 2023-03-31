function CargaCitasEnSucursal(){


    $.post("https://saludaclinicas.com/POS2/Consultas/CitasEnSucursalDias.php","",function(data){
      $("#CitasEnLaSucursal").html(data);
    })
  
  }
  
  
  
  CargaCitasEnSucursal();

  
