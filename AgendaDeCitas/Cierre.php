
<?php
session_start();
setcookie ("IngresAdminAgenda", "", time() - 3600);
session_unset();
session_destroy();
header("Location:https://controlfarmacia.com/App/Secure/ControldeCitasV2");
?>