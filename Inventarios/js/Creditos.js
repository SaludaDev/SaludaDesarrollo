function CargaCreditos(){


    $.post("https://saludaclinicas.com/AdminPOS/Consultas/Creditos.php","",function(data){
      $("#tablaCreditos").html(data);
    })

  }
  
  
  
  CargaCreditos();