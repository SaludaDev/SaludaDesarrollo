function CargaEntradas(){


  $.get("https://www.somosgrupoe.com/Administracion/RecursosHumanos/Consultas/Entradas.php","",function(data){
    $("#RegistrosEntradas").html(data);
  })

}



CargaEntradas();


