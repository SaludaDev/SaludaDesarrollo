function CargaCreditosFinalizados(){


    $.post("https://saludaclinicas.com/AdminPOS/Consultas/CreditosFinalizados.php","",function(data){
      $("#tablaCreditosFinalizados").html(data);
    })

  }
  
  
  
  CargaCreditosFinalizados();