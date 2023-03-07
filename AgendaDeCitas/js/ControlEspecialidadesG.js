function EspecialidadesG(){


    $.post("https://saludaclinicas.com/ControldecitasV2/Consultas/EspecialidadesG.php","",function(data){
      $("#EspecialidadesG").html(data);
    })
  
  }
  
  
  
  EspecialidadesG();

  
