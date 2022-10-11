<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 6/10/2022
 * Time: 11:52
 */

include('../app/config.php');

$nombre_cliente = $_GET['nombre_cliente'];
$nit_ci_cliente = $_GET['nit_ci'];
$placa_auto = $_GET['placa'];

date_default_timezone_set("America/caracas");
$fechaHora = date("Y-m-d h:i:s");


//BUSCA SI EL CLIENTE YA ESTA REGISTRADO
$contador_cliente = 0;
$query_clientes = $pdo->prepare("SELECT * FROM tb_clientes WHERE placa_auto = '$placa_auto' AND estado = '1'  ");
$query_clientes->execute();
$datos_clientes = $query_clientes->fetchAll(PDO::FETCH_ASSOC);
foreach($datos_clientes as $datos_cliente){
    $contador_cliente = $contador_cliente + 1;
}
if($contador_cliente == "0"){
    echo "no hay ningun registro igual";
    $sentencia = $pdo->prepare('INSERT INTO tb_clientes
(nombre_cliente,nit_ci_cliente,placa_auto, fyh_creacion, estado)
VALUES ( :nombre_cliente,:nit_ci_cliente,:placa_auto,:fyh_creacion,:estado)');

    $sentencia->bindParam(':nombre_cliente',$nombre_cliente);
    $sentencia->bindParam(':nit_ci_cliente',$nit_ci_cliente);
    $sentencia->bindParam(':placa_auto',$placa_auto);
    $sentencia->bindParam('fyh_creacion',$fechaHora);
    $sentencia->bindParam('estado',$estado_del_registro);

    if($sentencia->execute()){
        echo 'success';
//header('Location:' .$URL.'/');
    }else{
        echo 'error al registrar a la base de datos';
    }
}else{
     echo "este cliente ya es encuentra registrado";
}


