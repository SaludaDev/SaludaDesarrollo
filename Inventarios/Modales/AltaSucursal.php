<!-- Central Modal Medium Info -->
<div class="modal fade" id="AltaSucursal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
   aria-="true" style="overflow-y: scroll;">
   <div class="modal-dialog  modal-notify modal-success" role="document">
     <!--Content-->
     <div class="modal-content">
       <!--Header-->
       <div class="modal-header">
         <p class="heading lead">Nueva Sucursal</p>

         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-="true" class="white-text">&times;</span>
         </button>
       </div>
       <div class="alert alert-info alert-styled-left text-blue-800 content-group">
						                <span class="text-semibold">Estimado usuario, </span>
                            los campos con un  <span class="text-danger"> * </span> son campos necesarios para el correcto ingreso de datos.
						                <button type="button" class="close" data-dismiss="alert">×</button>
                            </div>
       <!--Body-->
       <div class="modal-body">
         <div class="text-center">
         <form enctype="multipart/form-data" id="AgregaSucursal">
     

    
         <div class="form-group">
      
    <label for="exampleFormControlInput1">Nombre de sucursal<span class="text-danger">*</span></label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  
    <span class="input-group-text" id="Tarjeta"><i class="fas fa-file-signature"></i></span>
  </div>
  <input type="text" class="form-control " name="Sucursal" id="sucursal" aria-describedby="basic-addon1" >            
</div><label for="file" class="error"></div>


<div class="form-group">
      
      <label for="exampleFormControlInput1">Telefono de sucursal<span class="text-danger">*</span></label>
       <div class="input-group mb-3">
    <div class="input-group-prepend">
    
      <span class="input-group-text" id="Tarjeta"><i class="fas fa-file-signature"></i></span>
    </div>
    <input type="text" class="form-control " name="SucursalT" id="sucursalt" aria-describedby="basic-addon1" >            
  </div><label for="file" class="error"></div>



    <input type="text" class="form-control" hidden  name="Empresa" id="empresa"  readonly value="<?echo $row['ID_H_O_D']?>">
    <input type="text" class="form-control"  hidden name="Agrega" id="agrega"  readonly value=" <?echo $row['Nombre_Apellidos']?>">
    <input type="text" class="form-control"  hidden name="Sistema" id="sistema"  readonly value=" <?echo $row['Nombre_rol']?>">
   

  

       </div>

       <!--Footer-->
     <div class="text-center">
       <button type="submit"  name="submit_registro" id="submit_registro" value="Guardar" class="btn btn-success">Guardar <i class="fas fa-save"></i></button>
                                        </form>
         
       </div>
     </div>
     <!--/.Content-->
   </div>
 </div>
 </div>
 <!-- Central Modal Medium Info-->
 