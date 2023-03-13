function   CargaCancelados(){


    $.post("https://saludaclinicas.com/Enfermeria2/Consultas/CancelacionesV2.php","",function(data){
      $("#Cancelaciones").html(data);
    })
  
  }
  
  
  CargaCancelados();

  

  
