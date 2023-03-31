function CargaProcedimientos(){


    $.post("https://saludaclinicas.com/AdminPOS/Consultas/ProcedimientosMedicos.php","",function(data){
      $("#tablaCreditos").html(data);
    })

  }
  
  
  
  CargaProcedimientos();