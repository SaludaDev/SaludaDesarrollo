function CargaPacientesAgenda(){


    $.post("https://saludaclinicas.com/ControldecitasV2/Consultas/CampanasDias.php","",function(data){
      $("#TablaCampanas").html(data);
    })
  
  }
  
  
  
  CargaPacientesAgenda();
