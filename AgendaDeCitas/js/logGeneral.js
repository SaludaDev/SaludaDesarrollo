function CargaChecadorGeneral(){


    $.get("https://saludaclinicas.com/AgendaDeCitas/Consultas/logsGeneral","",function(data){
      $("#ChecadorGeneral").html(data);
    })
  
  }
  
  
  CargaChecadorGeneral();

  
