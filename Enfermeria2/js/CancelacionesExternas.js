function CargaCancelacionesExternas(){


    $.post("https://saludaclinicas.com/Enfermeria2/Consultas/CancelacionesExternas.php","",function(data){
      $("#CitasCanceladasExt").html(data);
    })
  
  }
  
  
  
  CargaCancelacionesExternas();

  
