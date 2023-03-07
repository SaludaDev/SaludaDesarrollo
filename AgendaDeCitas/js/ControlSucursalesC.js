function CargaSucursalesC(){


    $.post("https://saludaclinicas.com/ControldecitasV2/Consultas/SucursalesC.php","",function(data){
      $("#SucursalesC").html(data);
    })
  
  }
  
  
  
  CargaSucursalesC();

  
