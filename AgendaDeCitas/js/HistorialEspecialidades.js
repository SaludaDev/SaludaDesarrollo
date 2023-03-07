function CargaEspecialidadesH(){


  $.post("https://saludaclinicas.com/ControldecitasV2/Consultas/EspecialidadesH.php","",function(data){
    $("#EspecialidadesVen").html(data);
  })

}



CargaEspecialidadesH();


