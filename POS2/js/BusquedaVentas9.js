$('document').ready(function ($) {
    $(function() {
      $("#FiltrarContenido10").hide();
      $("#FiltrarContenido9").autocomplete({
          source: "Consultas/VentaDeProductos9.php",
          minLength: 2,
          appendTo: "#productos",
          select: function(event, ui) {
              event.preventDefault();
            
             
              $('#fkid9').val(ui.item.fkid9);
              $('#clavad9').val(ui.item.clavad9);
              $('#codbarras9').val(ui.item.codbarras9);  
              $('#identificadortip9').val(ui.item.identificadortip9);
               $('#nombreprod9').val(ui.item.nombreprod9);
               $('#lote9').val(ui.item.lote9);
               $('#precioprod9').val(ui.item.precioprod9);
                 
               $('#FiltrarContenido9').val("");
               $('#multi8').trigger("click");
               $('#add_field9').trigger("click");
               $("#cantidad9").focus()
               $("#FiltrarContenido9").hide()
               $("#FiltrarContenido10").show()
               $("#FiltrarContenido10").focus();
            
           }
          
      });
            
  }); });
  