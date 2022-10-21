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

            <h2>Registro de precios</h2>

            <br>
            <div class="row">
                <div class="col-md-10">

                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Llene los datos cuidadosamente</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body" style="display: block;">

                           <div class="row">
                               <div class="col-md-4">
                                   <div class="form-group">
                                       <label for="">Cantidad <span style="color: red"><b>*</b></span></label>
                                       <input type="number" id="cantidad" class="form-control">
                                   </div>
                               </div>
                               <div class="col-md-4">
                                   <div class="form-group">
                                       <label for="">Detalle</label>
                                       <select name="" id="detalle" class="form-control">
                                           <option value="HORAS">HORAS</option>
                                           <option value="DIAS">DIAS</option>
                                       </select>
                                   </div>
                               </div>
                               <div class="col-md-4">
                                   <div class="form-group">
                                       <label for="">Precio <span style="color: red"><b>*</b></span></label>
                                       <input type="number" id="precio" class="form-control">
                                   </div>
                               </div>
                           </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="index.php" class="btn btn-default">Cancelar</a>
                                    <button class="btn btn-primary" id="btn_registrar_precio">Registrar precio</button>
                                </div>
                            </div>

                            <script>
                                $('#btn_registrar_precio').click(function () {
                                    var cantidad = $('#cantidad').val();
                                    var detalle = $('#detalle').val();
                                    var precio = $('#precio').val();

                                    if(cantidad == ""){
                                        alert("Debe de llenar el campo cantidad...");
                                        $('#cantidad').focus();
                                    }else if(precio == ""){
                                        alert("Debe de llenar el campo precio...");
                                        $('#precio').focus();
                                    }else {
                                        var url = 'controller_create.php';
                                        $.get(url,{cantidad:cantidad, detalle:detalle, precio:precio},function (datos) {
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


