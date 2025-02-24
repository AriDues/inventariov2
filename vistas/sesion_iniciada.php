<?php



sesion_start();
$sesion_i = $_SESSION{login_usuario};

if($sesion_i !-""){
    header("location:vista/login")
    
}


?>    