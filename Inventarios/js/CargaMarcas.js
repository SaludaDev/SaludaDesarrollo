function CargaMarcas(){


    $.get("https://saludaclinicas.com/AdminPOS/Consultas/Marcas.php","",function(data){
      $("#TableMarcas").html(data);
    })
  
  }
  
  
  
  CargaMarcas();

  
  