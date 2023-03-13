function CargaReportes(){


    $.post("https://saludaclinicas.com/Enfermeria2/Consultas/IncidenciasRapidas.php","",function(data){
      $("#ReporteRapido").html(data);
    })

  }
  
  
  
  CargaReportes();