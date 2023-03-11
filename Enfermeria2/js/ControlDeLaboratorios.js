function CargaLab(){


    $.post("https://saludaclinicas.com/Enfermeria2/Consultas/ControlDeLabs.php","",function(data){
      $("#Pacientes").html(data);
    })
  
  }
  

  CargaLab();

  
