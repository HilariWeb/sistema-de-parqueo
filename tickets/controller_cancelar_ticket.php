<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 7/10/2022
 * Time: 13:06
 */

include('../app/config.php');


$id_ticket = $_GET['id'];
$cuviculo = $_GET['cuviculo'];

$estado_inactivo = "0";

date_default_timezone_set("America/caracas");
$fechaHora = date("Y-m-d h:i:s");

$sentencia = $pdo->prepare("UPDATE tb_tickets SET
estado = :estado,
fyh_eliminacion = :fyh_eliminacion 
WHERE id_ticket = :id_ticket");

$sentencia->bindParam(':estado',$estado_inactivo);
$sentencia->bindParam(':fyh_eliminacion',$fechaHora);
$sentencia->bindParam(':id_ticket',$id_ticket);

if($sentencia->execute()){

    //actualizando el estado del cuviculo de ocupado a libre
    $estado_espacio = "LIBRE";
    $sentencia2 = $pdo->prepare("UPDATE tb_mapeos SET
    estado_espacio = :estado_espacio,
    fyh_actualizacion = :fyh_actualizacion 
    WHERE nro_espacio = :nro_espacio");

    $sentencia2->bindParam(':estado_espacio',$estado_espacio);
    $sentencia2->bindParam(':fyh_actualizacion',$fechaHora);
    $sentencia2->bindParam(':nro_espacio',$cuviculo);

    if($sentencia2->execute()){
        echo "se actualizo el estado del civuculo a libre";
        echo "se elimino el registro de la manera correcta";
        ?>
        <script>location.href = "../principal.php";</script>
        <?php
    }else{
        echo "error al actualizar el campo nro de espacio del cuviculo";
    }

}else{
    echo "error al eliminar el registro";
}