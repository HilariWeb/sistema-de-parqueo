<?php

include('../app/config.php');

session_start();
if(isset($_SESSION['usuario_sesion'])) {
    session_destroy();
    header("Location: ".$URL."/");
}