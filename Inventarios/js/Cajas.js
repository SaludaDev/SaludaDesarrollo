function CargaCajas(){


    $.get("https://saludaclinicas.com/AdminPOS/Consultas/Cajas.php","",function(data){
      $("#Cajas").html(data);
    })
  
  }
  
  
  
  CargaCajas();

  
  