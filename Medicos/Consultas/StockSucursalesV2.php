
<script>

tabla = $('#Productos').DataTable({

 "bProcessing": true,
 "ordering": true,
 "stateSave":true,
 "bAutoWidth": false,
 "order": [[ 0, "desc" ]],
 "sAjaxSource": "https://controlconsulta.com/Medicos/Consultas/ArrayStockAlmacenV2.php",
 "aoColumns": [
       { mData: 'Cod_Barra' },
       { mData: 'Nombre_Prod' },
       { mData: 'Proveedor' },
       { mData: 'Nom_Serv' },
      
       { mData: 'Existencias_R' },
      
 
    { mData: 'Fecha_Caducidad' },

      
      ],
     
    
      "lengthMenu": [[10,20,150,250,500, -1], [10,20,50,250,500, "Todos"]],  
  
      language: {
            "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
			     },
			     "sProcessing":"Procesando...",
            },
          
        //para usar los botones   
        responsive: "true",
       
       
   
	   
        	        
    });     

</script>
<div class="text-center">
	<div class="table-responsive">
	<table  id="Productos" class="table table-hover">
<thead>

<th>Clave</th>
    <th>Nombre producto</th>
    <th>Proveedor </th>
   
    <th>Tipo de servicio </th>
   
    <th>Existencias </th>

<th>Fecha de caducidad</th>



</thead>

</div>
</div>


