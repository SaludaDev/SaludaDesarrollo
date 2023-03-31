function CargaVentasDelDia(){


    $.post("https://saludaclinicas.com/AdminPOS/Consultas/VentasDelDiaPorTickets.php","",function(data){
      $("#TableVentasDelDia").html(data);
    })

  }
  
  
  
  CargaVentasDelDia();