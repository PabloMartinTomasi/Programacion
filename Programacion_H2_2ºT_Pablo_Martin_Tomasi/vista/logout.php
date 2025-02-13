<?php
session_start();//Nos sirve para poder iniciar sesión
session_unset();
session_destroy();
header('Location: ../login.php');//Nos mada a login
exit();
?>