function CargaCitasEnSucursal(){


    $.post("https://saludaclinicas.com/AgendaDeCitas/Consultas/CitasEnSucursal.php","",function(data){
      $("#CitasEnLaSucursal").html(data);
    })
  
  }
  
  
  
  CargaCitasEnSucursal();

  
