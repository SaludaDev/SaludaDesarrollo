function CargaSucursalesG(){


    $.post("https://saludaclinicas.com/ControldecitasV2/Consultas/SucursalesG.php","",function(data){
      $("#SucursalesG").html(data);
    })
  
  }
  
  
  
  CargaSucursalesG();

  
