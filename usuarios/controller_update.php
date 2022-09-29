<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 31/8/2022
 * Time: 01:03
 */

include('../app/config.php');

$nombres = $_GET['nombres'];
$email = $_GET['email'];
$password_user = $_GET['password_user'];
$id_user = $_GET['id_user'];


date_default_timezone_set("America/caracas");
$fechaHora = date("Y-m-d h:i:s");
//echo $nombres."-".$email."-".$password_user;

$sentencia = $pdo->prepare("UPDATE tb_usuarios SET
nombres = :nombres,
email = :email,
password_user = :password_user,
fyh_actualizacion = :fyh_actualizacion 
WHERE id = :id");

$sentencia->bindParam(':nombres',$nombres);
$sentencia->bindParam(':email',$email);
$sentencia->bindParam(':password_user',$password_user);
$sentencia->bindParam(':fyh_actualizacion',$fechaHora);
$sentencia->bindParam(':id',$id_user);

if($sentencia->execute()){
    echo "se actualizo el registro de la manera correcta";
    ?>
    <script>location.href = "../usuarios/";</script>
    <?php
}else{
    echo "error al actualizar el registro";
}