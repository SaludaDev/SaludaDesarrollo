function CargaDataCampana(){


    $.post("https://saludaclinicas.com/ControldecitasV2/Consultas/CampanasHorarios.php","",function(data){
      $("#TablaCampanasHorarios").html(data);
    })
  
  }
  
  
  
  CargaDataCampana();

  
