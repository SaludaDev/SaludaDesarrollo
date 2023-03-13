function  CargaCreditosVencidos(){


    $.post("https://saludaclinicas.com/AdminPOS/Consultas/CreditosVencidos.php","",function(data){
      $("#tablaCreditosVencidos").html(data);
    })

  }
  
  
  
  CargaCreditosVencidos();