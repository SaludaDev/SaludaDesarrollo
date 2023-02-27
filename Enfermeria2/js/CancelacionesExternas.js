function CargaCancelacionesExternas(){


    $.post("https://controlconsulta.com/Enfermeria2/Consultas/CancelacionesExternas.php","",function(data){
      $("#CitasCanceladasExt").html(data);
    })
  
  }
  
  
  
  CargaCancelacionesExternas();

  
