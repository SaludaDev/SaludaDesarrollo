function CargaSa(){


    $.get("https://saludaclinicas.com/Enfermeria2/Consultas/SignosAgenda.php","",function(data){
      $("#AgendaSV").html(data);
    })
  
  }
  
  
  
  CargaSa();
