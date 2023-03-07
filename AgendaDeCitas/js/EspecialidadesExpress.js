function  CargaEspecialidadesExpress(){


    $.post("https://saludaclinicas.com/AgendaDeCitas/Consultas/EspecialidadesExpress.php","",function(data){
      $("#EspecialidadesExpress").html(data);
    })
  
  }
  
  CargaEspecialidadesExpress();

  
