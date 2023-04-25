function CargaFCajas(){


    $.get("https://saludaclinicas.com/AdminPOS/Consultas/FondosCajas.php","",function(data){
      $("#FCajas").html(data);
    })
  
  }
  
  
  
  CargaFCajas();

  
  