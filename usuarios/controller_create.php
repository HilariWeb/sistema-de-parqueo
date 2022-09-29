<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 27/8/2022
 * Time: 00:02
 */

include('../app/config.php');

$nombres = $_GET['nombres'];
$email = $_GET['email'];
$password_user = $_GET['password_user'];

date_default_timezone_set("America/caracas");
$fechaHora = date("Y-m-d h:i:s");

$sentencia = $pdo->prepare("INSERT INTO tb_usuarios 
        (nombres,  email,  password_user, fyh_creacion, estado) 
VALUES (:nombres, :email, :password_user,:fyh_creacion,:estado)");

$sentencia->bindParam('nombres',$nombres);
$sentencia->bindParam('email',$email);
$sentencia->bindParam('password_user',$password_user);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_del_registro);

if($sentencia->execute()){
    echo "registro satisfactorio";
    //header('index.php');
    ?>
    <script>location.href = "../roles/asignar.php";</script>
<?php
}else{
    echo "no se pudo registrar a la base de datos";
}