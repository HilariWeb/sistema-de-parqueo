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

            <h2>Creación de un nuevo espacios</h2>

            <br>
            <div class="row">
                <div class="col-md-6">

                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Llene todos los campos</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body" style="display: block;">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Nro espacio</label>
                                        <input type="number" id="nro_espacio" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Estado</label>
                                        <select name="" id="estado_espacio" class="form-control">
                                            <option value="LIBRE">LIBRE</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form group">
                                        <label for="">Observaciones</label>
                                        <textarea name="" id="obs" cols="30" class="form-control" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <a href="" class="btn btn-default btn-block">Cancelar</a>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-primary btn-block" id="btn_registrar">
                                        Registrar
                                    </button>
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
    <!-- /.content-wrapper -->
    <?php include('../layout/admin/footer.php'); ?>
</div>
<?php include('../layout/admin/footer_link.php'); ?>
</body>
</html>


<script>
    $('#btn_registrar').click(function () {

        var nro_espacio = $('#nro_espacio').val();
        var estado_espacio = $('#estado_espacio').val();
        var obs = $('#obs').val();

        if(nro_espacio == ""){
            alert('Debe de llenar el campo nro de espacio');
            $('#nro_espacio').focus();
        }
        else{
            var url = 'controller_create.php';
            $.get(url,{nro_espacio:nro_espacio,estado_espacio:estado_espacio,obs:obs},function (datos) {
                $('#respuesta').html(datos);
            });
        }
    });
</script>
