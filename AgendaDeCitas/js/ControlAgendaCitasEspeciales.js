function CargaCitasEspeciales(){


    $.get("https://saludaclinicas.com/Controldecitas/Consultas/AgendaCitasEspecialistas.php","",function(data){
      $("#TablaAgendaCitas").html(data);
    })
  
  }
  
  CargaCitasEspeciales()

  
