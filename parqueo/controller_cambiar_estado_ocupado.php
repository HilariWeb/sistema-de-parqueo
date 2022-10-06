<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 6/10/2022
 * Time: 10:59
 */

include('../app/config.php');

$cuviculo = $_GET['cuviculo'];
$estado_espacio = "OCUPADO";


date_default_timezone_set("America/caracas");
$fechaHora = date("Y-m-d h:i:s");
//echo $nombres."-".$email."-".$password_user;

$sentencia = $pdo->prepare("UPDATE tb_mapeos SET
estado_espacio = :estado_espacio,
fyh_actualizacion = :fyh_actualizacion 
WHERE id_map = :id_map");

$sentencia->bindParam(':estado_espacio',$estado_espacio);
$sentencia->bindParam(':fyh_actualizacion',$fechaHora);
$sentencia->bindParam(':id_map',$cuviculo);

if($sentencia->execute()){
    echo "se actualizo el registro de la manera correcta";
    ?>
   <!-- <script>location.href = "../usuarios/";</script> -->
    <?php
}else{
    echo "error al actualizar el registro";
}