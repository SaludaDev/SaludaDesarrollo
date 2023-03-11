function CargaCampanasDias(){


    $.get("https://saludaclinicas.com/Enfermeria2/Consultas/CampanasDias.php","",function(data){
      $("#TablaCampanas").html(data);
    })
  
  }
  
  
  
  CargaCampanasDias();
