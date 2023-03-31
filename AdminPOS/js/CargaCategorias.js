function CargaCategorias(){


    $.get("https://saludaclinicas.com/AdminPOS/Consultas/Categorias.php","",function(data){
      $("#TableCategorias").html(data);
    })
  
  }
  
  
  
  CargaCategorias();

  
  