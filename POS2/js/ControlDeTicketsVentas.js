function CargaTicketsDia(){


    $.post("https://saludaclinicas.com/POS2/Consultas/TicketsEnPanelVentas.php","",function(data){
      $("#TableVentasDelDia").html(data);
    })

  }
  
  
  
  CargaTicketsDia();