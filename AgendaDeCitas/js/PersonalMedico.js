function   CargaPmedicos(){


    $.post("https://saludaclinicas.com/AgendaDeCitas/Consultas/PersonalMedico.php","",function(data){
      $("#PersonalMedico").html(data);
    })
  
  }
  
  
  CargaPmedicos();

  

  
