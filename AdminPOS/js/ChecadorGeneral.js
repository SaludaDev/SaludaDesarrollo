function CargaChecadorGeneral(){


    $.get("https://saludaclinicas.com/AdminPOS/Consultas/ChecadorGeneral","",function(data){
      $("#ChecadorGeneral").html(data);
    })
  
  }
  
  
  CargaChecadorGeneral();

  
