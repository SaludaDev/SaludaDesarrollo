
<?php
session_start();
setcookie ("RecursosHumanos", "", time() - 3600);
session_unset();
session_destroy();
header("Location:https://www.somosgrupoe.com/PanelAdmSys/");
?>



