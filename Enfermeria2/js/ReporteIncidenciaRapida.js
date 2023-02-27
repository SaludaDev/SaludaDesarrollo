function CargaReportes(){


    $.post("https://controlconsulta.com/Enfermeria2/Consultas/IncidenciasRapidas.php","",function(data){
      $("#ReporteRapido").html(data);
    })

  }
  
  
  
  CargaReportes();