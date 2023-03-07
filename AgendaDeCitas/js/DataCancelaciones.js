function   CargaCancelados(){


    $.post("https://saludaclinicas.com/ControldecitasV2/Consultas/Cancelaciones.php","",function(data){
      $("#Cancelaciones").html(data);
    })
  
  }
  
  
  CargaCancelados();

  

  
