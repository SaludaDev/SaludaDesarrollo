function EntraYSalez(){


    $.get("https://www.somosgrupoe.com/Administracion/RecursosHumanos/Consultas/EntraYSale.php","",function(data){
      $("#Logs").html(data);
    })
  
  }
  
  
  EntraYSalez();

  
