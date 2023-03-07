function CargaCitasEnSucursal(){


    $.post("https://saludaclinicas.com/AgendaDeCitas/Consultas/CitasEnSucursalDias.php","",function(data){
      $("#CitasEnLaSucursal").html(data);
    })
  
  }
  
  
  
  CargaCitasEnSucursal();

  
