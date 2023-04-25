function PromosCreditos(){


    $.post("https://saludaclinicas.com/AdminPOS/Consultas/PromosCreditos.php","",function(data){
      $("#TablePromosCreditos").html(data);
    })

  }
  
  
  
  PromosCreditos();