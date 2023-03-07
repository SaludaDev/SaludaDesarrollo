function CargaEspecialidades(){


    $.get("https://saludaclinicas.com/ControldecitasV2/Consultas/Especialidades.php","",function(data){
      $("#EspecialidadesVi").html(data);
    })
  
  }
  
  
  
  CargaEspecialidades();

  
