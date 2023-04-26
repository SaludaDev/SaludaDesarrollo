function CargaVentasDelDia(){


    $.post("https://saludaclinicas.com/POS2/Consultas/VentasDelDia.php","",function(data){
      $("#TableVentasDelDia").html(data);
    })

  }
  
  
  
  CargaVentasDelDia();