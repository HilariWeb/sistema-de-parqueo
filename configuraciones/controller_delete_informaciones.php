<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 29/9/2022
 * Time: 09:33
 */

include('../app/config.php');

$id_informacion = $_GET['id_informacion'];
$estado_inactivo = "0";

date_default_timezone_set("America/caracas");
$fechaHora = date("Y-m-d h:i:s");

$sentencia = $pdo->prepare("UPDATE tb_informaciones SET
estado = :estado,
fyh_eliminacion = :fyh_eliminacion 
WHERE id_informacion = :id_informacion");

$sentencia->bindParam(':estado',$estado_inactivo);
$sentencia->bindParam(':fyh_eliminacion',$fechaHora);
$sentencia->bindParam(':id_informacion',$id_informacion);

if($sentencia->execute()){
    echo "se elimino el registro de la manera correcta";
    ?>
    <script>location.href = "informaciones.php";</script>
    <?php
}else{
    echo "error al eliminar el registro";
}