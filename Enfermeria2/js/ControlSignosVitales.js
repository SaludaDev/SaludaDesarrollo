function CargaSignosVitales(){


    $.get("https://saludaclinicas.com/Enfermeria2/Consultas/SignosVitales.php","",function(data){
      $("#sv").html(data);
    })
  
  }
  
  
  CargaSignosVitales();

  
