<?php
include('../app/config.php');
include('../layout/admin/datos_usuario_sesion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include('../layout/admin/head.php'); ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <?php include('../layout/admin/menu.php'); ?>
    <div class="content-wrapper">
        <br>
        <div class="container">

            <h2>Actualización de precios</h2>

            <br>
            <div class="row">
                <div class="col-md-10">

                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Llene los datos cuidadosamente</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body" style="display: block;">

                            <?php
                            $id_precio_get = $_GET['id'];
                            $query_precios = $pdo->prepare("SELECT * FROM tb_precios WHERE id_precio = '$id_precio_get' AND estado = '1'  ");
                            $query_precios->execute();
                            $datos_precios = $query_precios->fetchAll(PDO::FETCH_ASSOC);
                            foreach($datos_precios as $datos_precio){
                                $id_precio = $datos_precio['id_precio'];
                                $cantidad = $datos_precio['cantidad'];
                                $detalle = $datos_precio['detalle'];
                                $precio = $datos_precio['precio'];
                            }
                            ?>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Cantidad <span style="color: red"><b>*</b></span></label>
                                        <input type="number" id="cantidad" value="<?php echo $cantidad;?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Detalle</label>
                                        <select name="" id="detalle" class="form-control">
                                            <?php
                                            if($detalle == "HORAS"){ ?>
                                                <option value="HORAS">HORAS</option>
                                                <option value="DIAS">DIAS</option>
                                            <?php
                                            }else{ ?>
                                                <option value="DIAS">DIAS</option>
                                                <option value="HORAS">HORAS</option>
                                            <?php
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Precio <span style="color: red"><b>*</b></span></label>
                                        <input type="number" value="<?php echo $precio;?>" id="precio" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="index.php" class="btn btn-default">Cancelar</a>
                                    <button class="btn btn-success" id="btn_actualizar_precio">Actualizar precio</button>
                                </div>
                            </div>

                            <script>
                                $('#btn_actualizar_precio').click(function () {
                                    var cantidad = $('#cantidad').val();
                                    var detalle = $('#detalle').val();
                                    var precio = $('#precio').val();
                                    var id_precio = <?php echo $id_precio_get;?>;

                                    if(cantidad == ""){
                                        alert("Debe de llenar el campo cantidad...");
                                        $('#cantidad').focus();
                                    }else if(precio == ""){
                                        alert("Debe de llenar el campo precio...");
                                        $('#precio').focus();
                                    }else {
                                        var url = 'controller_update.php';
                                        $.get(url,{cantidad:cantidad, detalle:detalle, precio:precio,id_precio:id_precio},function (datos) {
                                            $('#respuesta').html(datos);
                                        });
                                    }

                                });
                            </script>
                        </div>
                        <div id="respuesta">

                        </div>

                    </div>



                </div>
            </div>

        </div>

    </div>
    <!-- /.content-wrapper -->
    <?php include('../layout/admin/footer.php'); ?>
</div>
<?php include('../layout/admin/footer_link.php'); ?>
</body>
</html>


