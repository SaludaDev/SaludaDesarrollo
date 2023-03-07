function CargaEspecialistasG(){


    $.post("https://saludaclinicas.com/ControldecitasV2/Consultas/EspecialistasG.php","",function(data){
      $("#TablaEspecialistas").html(data);
    })
  
  }
  
  
  
  CargaEspecialistasG();
  
  
  