function CargaReporteEntradasYSalidas(){


    $.get("https://www.somosgrupoe.com/Administracion/RecursosHumanos/Consultas/ReporteEntradasYSalidas.php","",function(data){
      $("#RegistrosEntradasYSalidas").html(data);
    })
  
  }
  
  
  CargaReporteEntradasYSalidas();

  
