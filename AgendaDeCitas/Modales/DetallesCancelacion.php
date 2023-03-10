<?php
include "../Consultas/db_connection.php";

$user_id = null;
$sql1 = "SELECT AgendaCitas_EspecialistasSucursales.ID_Agenda_Especialista,AgendaCitas_EspecialistasSucursales.Fk_Especialidad,AgendaCitas_EspecialistasSucursales.Fk_Especialista,
AgendaCitas_EspecialistasSucursales.Fk_Sucursal,AgendaCitas_EspecialistasSucursales.Fecha,AgendaCitas_EspecialistasSucursales.ID_H_O_D,
AgendaCitas_EspecialistasSucursales.Hora,AgendaCitas_EspecialistasSucursales.Nombre_Paciente,AgendaCitas_EspecialistasSucursales.Telefono,
SucursalesCorre.ID_SucursalC,SucursalesCorre.Nombre_Sucursal,Roles_Puestos.ID_rol,Roles_Puestos.Nombre_rol,
Personal_Medico.Medico_ID,Personal_Medico.Nombre_Apellidos,Fechas_Especialistas_Sucursales.ID_Fecha_Esp,Fechas_Especialistas_Sucursales.Fecha_Disponibilidad,Horarios_Citas_Sucursales.ID_Horario,Horarios_Citas_Sucursales.Horario_Disponibilidad FROM AgendaCitas_EspecialistasSucursales,SucursalesCorre,Roles_Puestos,Personal_Medico,Fechas_Especialistas_Sucursales,Horarios_Citas_Sucursales 
where AgendaCitas_EspecialistasSucursales.Fk_Especialidad = Roles_Puestos.ID_rol AND 
AgendaCitas_EspecialistasSucursales.Fk_Especialista= Personal_Medico.Medico_ID AND AgendaCitas_EspecialistasSucursales.Fk_Sucursal= SucursalesCorre.ID_SucursalC 
AND AgendaCitas_EspecialistasSucursales.Fecha = Fechas_Especialistas_Sucursales.ID_Fecha_Esp AND AgendaCitas_EspecialistasSucursales.Hora = Horarios_Citas_Sucursales.ID_Horario 
 AND AgendaCitas_EspecialistasSucursales.ID_Agenda_Especialista = " . $_POST["id"];
$query = $conn->query($sql1);
$Especialidades = null;
if ($query->num_rows > 0) {
  while ($r = $query->fetch_object()) {
    $Especialidades = $r;
    break;
  }
}
?>

<?php if ($Especialidades != null) : ?>


  <div class="form-row">
    <div class="col">
      <label for="exampleFormControlInput1">Especialidad </label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">

          <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
        </div>
        <input type="text" class="form-control" readonly value="<?php echo $Especialidades->Nombre_rol; ?>" aria-describedby="basic-addon1">
      </div>
    </div>
    <div class="col">
      <label for="exampleFormControlInput1">Paciente</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">

          <span class="input-group-text" id="Tarjeta"><i class="fas fa-hospital-user"></i></span>
        </div>
        <input type="text" class="form-control" readonly value="<?php echo $Especialidades->Nombre_Paciente; ?>" aria-describedby="basic-addon1">
      </div>
    </div>

  </div>




  <input type="hidden" name="id" id="id" value="<?php echo $Especialidades->ID_Agenda_Especialista; ?>">



<?php else : ?>
  <p class="alert alert-danger">404 No se encuentra</p>
<?php endif; ?>