function CargaCancelacionesSucursales(){


    $.post("https://saludaclinicas.com/Enfermeria2/Consultas/CancelacionesSucursales.php","",function(data){
      $("#CitasCanceladasSucursal").html(data);
    })
  
  }
  
  
  
  CargaCancelacionesSucursales();

  
