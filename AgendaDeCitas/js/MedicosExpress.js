function CargaMedicosExpress(){


    $.post("https://saludaclinicas.com/AgendaDeCitas/Consultas/MedicosExpress.php","",function(data){
      $("#DoctoresExpress").html(data);
    })
  
  }
  
  CargaMedicosExpress();

  
