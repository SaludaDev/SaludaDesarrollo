function CargaCancelacionesSucursales(){


    $.post("https://controlconsulta.com/Enfermeria2/Consultas/CancelacionesSucursales.php","",function(data){
      $("#CitasCanceladasSucursal").html(data);
    })
  
  }
  
  
  
  CargaCancelacionesSucursales();

  
