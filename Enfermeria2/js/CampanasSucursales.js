function CargaCitasEnSucursal(){


    $.post("https://saludaclinicas.com/Enfermeria2/Consultas/CitasEnSucursal.php","",function(data){
      $("#CitasEnLaSucursal").html(data);
    })
  
  }
  
  
  
  CargaCitasEnSucursal();

  
