<div class="modal fade" id="AgendarCitaDeEspecialistasNuevaVersion" tabindex="-1" role="dialog" style="overflow-y: scroll;" aria-labelledby="editModalLabel" aria-hidden="true">
  <div id="Di"class="modal-dialog modal-lg modal-notify modal-success">
      <div class="modal-content">
      <div class="modal-header">
         <p class="heading lead" id="Titulo">Agendamiento de nuevas cita con especialistas</p>

         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true" class="white-text">&times;</span>
         </button>
       </div>
        <div id="Mensaje "class="alert alert-info alert-styled-left text-blue-800 content-group">
						                <span id="Aviso" class="text-semibold">Estimado usuario, 
                            Verifique los campos antes de realizar alguna accion</span>
						                <button type="button" class="close" data-dismiss="alert">×</button>
                            </div>
	        <div class="modal-body">
          <div class="text-center">
       
<form action="javascript:void(0)" method="post" id="AgendaNuevoPaciente" >

<div class="row">
    <div class="col">
    <label for="exampleFormControlInput1">Nombre del paciente</label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <input type="text" class="form-control"   name="Nombres" id="nombres" aria-describedby="basic-addon1">
</div>
    </div>
    <div class="col">
    <label for="exampleFormControlInput1">Telefono</label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <input type="text" class="form-control"   name="Tel" id="tel" aria-describedby="basic-addon1">
</div>
    </div>
    </div>
  
 
  
     <div class="row">
    <div class="col">
    <label for="exampleFormControlInput1">Sexo</label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <select id = "sexo" class = "form-control" name = "Sexo" >
                                               <option value="">Seleccione una opcion:</option>
                                               <option value="Masculino">Masculino</option>
                                               <option value="Femenino">Femenino</option>
        </select>
</div>
    </div>
    <div class="col">
    <label for="exampleFormControlInput1">Alergias</label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <input type="text" class="form-control"   name="Alergias" id="alergias" aria-describedby="basic-addon1">
</div>
    </div>
    </div>
   

<!-- INICIA DATA DE AGENDA -->
<div class="row">
    <div class="col">
    <label for="exampleFormControlInput1">Sucursal</label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <select id = "sucursal" class = "form-control" name = "Sucursal" >
                                               <option value="">Seleccione una Sucursal:</option>
        <?php
          $query = $conn -> query ("SELECT ID_SucursalC,Nombre_Sucursal,ID_H_O_D FROM Sucursales_CampañasV2 WHERE Estatus_Sucursal='Vigente' AND ID_H_O_D='".$row['ID_H_O_D']."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores['ID_SucursalC'].'">'.$valores['Nombre_Sucursal'].'</option>';
          }
        ?>  </select>
</div>
<label for="sucursal" class="error">
    </div>
    <div class="col">
    <label for="exampleFormControlInput1">Especialidad</label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <select  id = "especialidad" name = "Especialidad"  class = "form-control" disabled = "disabled" >
								<option value = "">Selecciona una especialidad</option>
							</select>
</div>
<label for="especialidad" class="error">
    </div>
    
    </div>
              
    <div class="row">
    <div class="col">
    <label for="exampleFormControlInput1">Medico</label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <select  id = "medico" name = "Medico"  class = "form-control " disabled = "disabled" >
								<option value = "">Selecciona un medico</option>
							</select>
</div>
<label for="medico" class="error">
    </div>
    <div class="col">
    <label for="exampleFormControlInput1">Fecha</label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <select  id = "fecha" name = "Fecha"  class = "form-control " disabled = "disabled" >
								<option value = "">Selecciona una fecha</option>
							</select>
</div>
<label for="fecha" class="error">
    </div>
   
    </div>
    <div class="row">
    <div class="col">
    <label for="exampleFormControlInput1">Hora </label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <select  id = "hora" name = "Hora"  class = "form-control" disabled = "disabled" >
								<option value = "">Selecciona una hora</option>
							</select>
</div>
<label for="hora" class="error">
    </div>
    <div class="col">
    <label for="exampleFormControlInput1">Costo</label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <select  id = "costo" name = "Costo"  class = "form-control" disabled = "disabled" >
								<option value = "">Selecciona un costo</option>
							</select>
</div>
<label for="costo" class="error">
    </div>
    </div>
    <div class="row">
    <div class="col">
    <label for="exampleFormControlInput1">Tipo de consulta </label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <select name="TipoConsulta" class="form-control form-control-sm" id="tipoconsulta" >
									  <option value="">Elige un tipo de consulta</option>
				
              <option  value="Primera vez">Primera vez</option>		
              <option  value="Revaloración">Revaloración</option>						  
						 </select>
</div>
<label for="tipoconsulta" class="error">
    </div>
    <div class="col">
    <label for="exampleFormControlInput1">Observaciones</label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <textarea id="observaciones" class="form-control form-control-sm"  name="Observaciones" rows="2" cols="50">
  </textarea>
</div>
    </div>
    </div>
<!-- FINALIZA DATA DE AGENDA -->
 

    <input type="text" class="form-control" name="Usuario" id="usuario"  value="<?php echo $row['Nombre_Apellidos']?>"  hidden readonly >
    <input type="text" class="form-control" name="Sistema" id="sistema"  value="Enfermería" hidden  readonly >
    <input type="text" class="form-control" name="Empresa" id="empresa"  value="<?php echo $row['ID_H_O_D']?>" hidden  readonly >

    
<button type="submit"  name="submit_Age" id="submit_Age"  class="btn btn-success">Confirmar datos <i class="fas fa-user-check"></i></button>
                          
</form>
</div>







        
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->