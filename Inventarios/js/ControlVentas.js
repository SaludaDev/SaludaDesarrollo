function CargaVentasDelDia(){


    $.post("https://saludaclinicas.com/AdminPOS/Consultas/VentasDelDia.php","",function(data){
      $("#TableVentasDelDia").html(data);
    })

  }
  
  
  
  CargaVentasDelDia();