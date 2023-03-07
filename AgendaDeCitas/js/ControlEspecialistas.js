function CargaEspecialistas(){


    $.get("https://saludaclinicas.com/ControldecitasV2/Consultas/Especialistas.php","",function(data){
      $("#TablaEspecialistas").html(data);
    })
  
  }
  
  
  
  CargaEspecialistas();

  
