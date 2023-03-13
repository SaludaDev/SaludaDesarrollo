<?php
session_start();
setcookie ("IngresoEnfer", "", time() - 3600);
session_unset();
session_destroy();
header("Location:https://saludaclinicas.com/App/Secure/Enfermeria2");
?>