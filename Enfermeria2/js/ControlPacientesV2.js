function CargaPacientes(){


    $.get("https://saludaclinicas.com/Enfermeria2/Consultas/PacientesV2.php","",function(data){
      $("#Pacientes").html(data);
    })
  
  }
  
  
  
  CargaPacientes();

  
