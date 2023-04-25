function UltimosregistrosStock(){


    $.get("https://saludaclinicas.com/AdminPOS/Consultas/UltimosRegistrosEnStockPorUsuario.php","",function(data){
      $("#UltimasInserciones").html(data);
    })
  
  }
  
  
  
  UltimosregistrosStock();

  
  