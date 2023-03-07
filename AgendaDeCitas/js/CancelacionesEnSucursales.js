function CargaCancelacionesSucursales(){


    $.post("https://saludaclinicas.com/AgendaDeCitas/Consultas/CancelacionesSucursales.php","",function(data){
      $("#CitasCanceladasSucursal").html(data);
    })
  
  }
  
  
  
  CargaCancelacionesSucursales();

  
