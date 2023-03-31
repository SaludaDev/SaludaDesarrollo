function  CargaGestionventas(){


    $.post("https://saludaclinicas.com/POS2/VistaVentas.php","",function(data){
      $("#Tabladeventas").html(data);
    })

  }
  
  
  
  CargaGestionventas();