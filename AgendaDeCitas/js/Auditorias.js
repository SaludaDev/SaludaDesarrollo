function   CargaCancelados(){


    $.post("https://saludaclinicas.com/ControldecitasV2/Consultas/Auditorias.php","",function(data){
      $("#Cancelaciones").html(data);
    })
  
  }
  
  
  CargaCancelados();

  

  
