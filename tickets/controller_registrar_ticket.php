<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 3/10/2022
 * Time: 11:55
 */


include('../app/config.php');

$placa = $_GET['placa'];
$placa = strtoupper($placa);//convierte todo a mayuscula
$nombre_cliente = $_GET['nombre_cliente'];
$nit_ci = $_GET['nit_ci'];
$cuviculo = $_GET['cuviculo'];
$fecha_ingreso = $_GET['fecha_ingreso'];
$hora_ingreso = $_GET['hora_ingreso'];
$user_sesion = $_GET['user_session'];
$estado_ticket = "OCUPADO";

date_default_timezone_set("America/caracas");
$fechaHora = date("Y-m-d h:i:s");

$sentencia = $pdo->prepare('INSERT INTO tb_tickets
(placa_auto,nombre_cliente,nit_ci,cuviculo,fecha_ingreso,hora_ingreso,estado_ticket,user_sesion, fyh_creacion, estado)
VALUES ( :placa_auto,:nombre_cliente,:nit_ci,:cuviculo,:fecha_ingreso,:hora_ingreso,:estado_ticket,:user_sesion,:fyh_creacion,:estado)');

$sentencia->bindParam(':placa_auto',$placa);
$sentencia->bindParam(':nombre_cliente',$nombre_cliente);
$sentencia->bindParam(':nit_ci',$nit_ci);
$sentencia->bindParam(':cuviculo',$cuviculo);
$sentencia->bindParam(':fecha_ingreso',$fecha_ingreso);
$sentencia->bindParam(':hora_ingreso',$hora_ingreso);
$sentencia->bindParam(':estado_ticket',$estado_ticket);
$sentencia->bindParam(':user_sesion',$user_sesion);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_del_registro);

if($sentencia->execute()){
    echo 'success';
    ?>
    <script>location.href = "tickets/generar_ticket.php";</script>
    <?php
}else{
    echo 'error al registrar a la base de datos';
}