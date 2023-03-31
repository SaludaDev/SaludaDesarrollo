function AreasCreditos(){


    $.post("https://saludaclinicas.com/AdminPOS/Consultas/AreasCreditos.php","",function(data){
      $("#TableAreasCreditos").html(data);
    })

  }
  
  
  
  AreasCreditos();