function CargaVentasDelDia(){


    $.post("https://saludaclinicas.com/AdminPOS/Consultas/VentasDelDiaLibres.php","",function(data){
      $("#TableVentasDelDia").html(data);
    })

  }
  
  
  
  CargaVentasDelDia();