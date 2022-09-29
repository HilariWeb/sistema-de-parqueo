<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 19/9/2022
 * Time: 17:05
 */

include('../app/config.php');

$placa = $_GET['placa'];

$placa = strtoupper($placa);//convierte todo a mayuscula

//echo "buscando la placa ".$placa;

$id_cliente ='';
$nombre_cliente = '';
$nit_ci_cliente = '';

$query_buscars = $pdo->prepare("SELECT * FROM tb_clientes WHERE estado = '1' AND placa_auto = '$placa' ");
$query_buscars->execute();
$buscars = $query_buscars->fetchAll(PDO::FETCH_ASSOC);
foreach($buscars as $buscar){
    $id_cliente = $buscar['id_cliente'];
    $nombre_cliente = $buscar['nombre_cliente'];
    $nit_ci_cliente = $buscar['nit_ci_cliente'];
}

if($nombre_cliente == ""){
   // echo "el cliente es nuevo";
    ?>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Nombre:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nombre_cliente<?php echo $id_map;?>">
        </div>
    </div>

    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">NIT/CI:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nit_ci<?php echo $id_map;?>">
        </div>
    </div>
<?php
}else{
   // echo $nombre_cliente." - ".$nit_ci_cliente;
    ?>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Nombre:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nombre_cliente<?php echo $id_map;?>" value="<?php echo $nombre_cliente; ?>">
        </div>
    </div>

    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">NIT/CI:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nit_ci<?php echo $id_map;?>" value="<?php echo $nit_ci_cliente; ?>" >
        </div>
    </div>
<?php
}

?>