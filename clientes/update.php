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

            <h2>Edición de los datos del cliente</h2>

            <br>
            <div class="row">
                <div class="col-md-10">

                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Datos del cliente</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <?php
                        $id_cliente_get = $_GET['id'];
                        $query_clientes = $pdo->prepare("SELECT * FROM tb_clientes WHERE id_cliente = '$id_cliente_get' AND estado = '1'  ");
                        $query_clientes->execute();
                        $datos_clientes = $query_clientes->fetchAll(PDO::FETCH_ASSOC);
                        foreach($datos_clientes as $datos_cliente){
                            $id_cliente = $datos_cliente['id_cliente'];
                            $nombre_cliente = $datos_cliente['nombre_cliente'];
                            $nit_ci_cliente = $datos_cliente['nit_ci_cliente'];
                            $placa_auto = $datos_cliente['placa_auto'];
                        }

                        ?>

                        <div class="card-body" style="display: block;">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nombre del cliente <span style="color: red"><b>*</b></span></label>
                                        <input type="text" id="nombre_cliente" class="form-control" value="<?Php echo $nombre_cliente;?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nit CI del cliente <span style="color: red"><b>*</b></span></label>
                                        <input type="text" id="nit_ci_cliente" class="form-control" value="<?php echo $nit_ci_cliente;?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Placa auto <span style="color: red"><b>*</b></span></label>
                                        <input type="text" id="placa_auto" class="form-control" value="<?php echo $placa_auto;?>">
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <a href="index.php" class="btn btn-default">Cancelar</a>
                                            <button class="btn btn-success" id="btn_actualizar_cliente">
                                                Actualizar
                                            </button>
                                        </div>
                                    </div>
                                </div>


                                <div id="respuesta">

                                </div>

                            </div>

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


<script>
    $('#btn_actualizar_cliente').click(function () {

        var nombre_cliente = $('#nombre_cliente').val();
        var nit_ci_cliente = $('#nit_ci_cliente').val();
        var placa_auto = $('#placa_auto').val();
        var id_cliente = "<?php echo $id_cliente_get;?>";

        if(nombre_cliente == ""){
            alert('Debe de llenar el campo nombre del cliente');
            $('#nombre_cliente').focus();
        }else if(nit_ci_cliente == ""){
            alert('Debe de llenar el campo nit ci del cliente');
            $('#nit_ci_cliente').focus();
        }else if(placa_auto == ""){
            alert('Debe de llenar el campo placa auto del cliente');
            $('#placa_auto').focus();
        }
        else{
            var url = 'controller_update.php';
            $.get(url,{nombre_cliente:nombre_cliente,nit_ci_cliente:nit_ci_cliente,placa_auto:placa_auto,id_cliente:id_cliente},function (datos) {
                $('#respuesta').html(datos);
            });
        }
    });
</script>


