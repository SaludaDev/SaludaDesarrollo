<?php include("db_connection.php");
include "Consultas.php";
include "Sesion.php";?>
<script>

tabla = $('#Productos').DataTable({

 "bProcessing": true,
 "ordering": true,
 "stateSave":true,
 "bAutoWidth": false,
 "order": [[ 0, "desc" ]],
 "sAjaxSource": "https://saludaclinicas.com/AdminPOS/Consultas/ArrayStockInventarios.php",
 "aoColumns": [
       { mData: 'Cod_Barra' },
       { mData: 'Nombre_Prod' },
       { mData: 'Existencias_R' },
       { mData: 'Precio_Venta' },
       { mData: 'Nom_Serv' },
       { mData: 'Sucursal' },
      
       
      


     
  
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
       
        dom: "B<'#colvis row'><'row'><'row'<'col-md-6'l><'col-md-6'f>r>t<'bottom'ip><'clear'>'",
        buttons:[ 
			{
				extend:    'excelHtml5',
				text:      'Descargar excel  <i Descargar excel class="fas fa-file-excel"></i> ',
				titleAttr: 'Descargar excel',
                autoFilter: true,
        title: 'Stock de  <?php echo $row['Nombre_Sucursal']?> ',
				className: 'btn btn-success'
			},
		
        ],
       
   
   
	   
        	        
    });     

</script>
<div class="text-center">
	<div class="table-responsive">
	<table  id="Productos" class="table table-hover">
<thead>

<th>Clave</th>
    <th>Nombre</th>
    <th>Stock </th>
    <th>PV </th>
    <th>Servicio </th>
    <th>Sucursal </th>
    
   
  
 



</thead>

</div>
</div>


