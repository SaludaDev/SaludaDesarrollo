function CargaPresentaciones(){


    $.get("https://saludaclinicas.com/AdminPOS/Consultas/Presentaciones.php","",function(data){
      $("#TablePresentaciones").html(data);
    })
  
  }
  
  
  
  CargaPresentaciones();

  
  