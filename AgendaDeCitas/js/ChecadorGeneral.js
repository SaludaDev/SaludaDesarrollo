function CargaChecadorGeneral(){


    $.get("https://saludaclinicas.com/AgendaDeCitas/Consultas/ChecadorGeneral","",function(data){
      $("#ChecadorGeneral").html(data);
    })
  
  }
  
  
  CargaChecadorGeneral();

  
