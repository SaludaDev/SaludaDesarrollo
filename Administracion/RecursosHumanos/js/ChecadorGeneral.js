function CargaChecadorGeneral(){


    $.get("https://www.somosgrupoe.com/Administracion/RecursosHumanos/Consultas/ChecadorGeneral","",function(data){
      $("#ChecadorGeneral").html(data);
    })
  
  }
  
  
  CargaChecadorGeneral();

  
