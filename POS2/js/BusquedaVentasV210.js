$('document').ready(function ($) {
    $(function() {
      $("#FiltrarContenido10").autocomplete({
          source: "Consultas/VentaDeProductos10.php",
          minLength: 2,
       
          select: function(event, ui) {
              event.preventDefault();
            
              $('#add_field9').trigger("click");
              $('#fkid10').val(ui.item.fkid10);
              $('#clavad10').val(ui.item.clavad10);
              $('#codbarras10').val(ui.item.codbarras10);  
              $('#identificadortip10').val(ui.item.identificadortip10);
               $('#nombreprod10').val(ui.item.nombreprod10);
               $('#lote10').val(ui.item.lote10);
               $('#precioprod10').val(ui.item.precioprod10);
                 
               $('#FiltrarContenido10').val("");
               $('#multi9').trigger("click");
               $("#Ajusteeee").trigger("click");
               $("#cantidad10").focus()
               
            
           }
          
      });
            
  }); });
  