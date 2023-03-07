function CargaEspecialistasH(){


  $.post("https://saludaclinicas.com/ControldecitasV2/Consultas/EspecialistasH.php","",function(data){
    $("#TablaEspecialistas").html(data);
  })

}



CargaEspecialistasH();


