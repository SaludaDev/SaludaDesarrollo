function   CargaCancelados(){


    $.post("https://saludaclinicas.com/Enfermeria2/Consultas/Cancelaciones.php","",function(data){
      $("#Cancelaciones").html(data);
    })
  
  }
  
  
  CargaCancelados();

  

  
