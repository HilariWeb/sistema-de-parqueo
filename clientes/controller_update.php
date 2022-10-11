<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 11/10/2022
 * Time: 08:15
 */
include('../app/config.php');

$nombre_cliente = $_GET['nombre_cliente'];
$nit_ci_cliente = $_GET['nit_ci_cliente'];
$placa_auto = $_GET['placa_auto'];
$id_cliente = $_GET['id_cliente'];


date_default_timezone_set("America/caracas");
$fechaHora = date("Y-m-d h:i:s");
//echo $nombres."-".$email."-".$password_user;

$sentencia = $pdo->prepare("UPDATE tb_clientes SET
nombre_cliente = :nombre_cliente,
nit_ci_cliente = :nit_ci_cliente,
placa_auto = :placa_auto,
fyh_actualizacion = :fyh_actualizacion 
WHERE id_cliente = :id_cliente");

$sentencia->bindParam(':nombre_cliente',$nombre_cliente);
$sentencia->bindParam(':nit_ci_cliente',$nit_ci_cliente);
$sentencia->bindParam(':placa_auto',$placa_auto);
$sentencia->bindParam(':fyh_actualizacion',$fechaHora);
$sentencia->bindParam(':id_cliente',$id_cliente);

if($sentencia->execute()){
    echo "se actualizo el registro de la manera correcta";
    ?>
    <script>location.href = "index.php";</script>
    <?php
}else{
    echo "error al actualizar el registro";
}