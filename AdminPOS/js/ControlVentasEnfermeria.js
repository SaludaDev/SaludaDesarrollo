function CargaVentasDelDia(){


    $.post("https://saludaclinicas.com/AdminPOS/Consultas/VentasDelDiaCreditoEnfermeria.php","",function(data){
      $("#TableVentasDelDia").html(data);
    })

  }
  
  
  
  CargaVentasDelDia();