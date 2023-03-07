function CargaCancelacionesExternas(){


    $.post("https://saludaclinicas.com/AgendaDeCitas/Consultas/CancelacionesExternas.php","",function(data){
      $("#CitasCanceladasExt").html(data);
    })
  
  }
  
  
  
  CargaCancelacionesExternas();

  
