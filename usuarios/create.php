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

            <h2>Creación de un nuevo Usuario</h2>

            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card" style="border: 1px solid #606060">
                            <div class="card-header" style="background-color: #007bff;color: #ffffff;">
                                <h4>Nuevo Usuario</h4>
                            </div>
                            <div class="card-body">
                               <div class="form-group">
                                   <label for="">Nombres</label>
                                   <input type="text" class="form-control" id="nombres">
                               </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="text" class="form-control" id="password_user">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" id="btn_guardar">Guardar</button>
                                    <a href="<?php echo $URL;?>/usuarios/" class="btn btn-default">Cancelar</a>
                                </div>
                                <div id="respuesta">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6"></div>
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
    $('#btn_guardar').click(function () {
        var nombres = $('#nombres').val();
        var email = $('#email').val();
        var password_user = $('#password_user').val();

        if(nombres == ""){
            alert('Debe de llenar el campo nombres');
            $('#nombres').focus();
        }else if(email == ""){
            alert('Debe de llenar el campo de email');
            $('#email').focus();
        }else if(password_user == ""){
            alert('Debe de llenar el campo de password');
            $('#password_user').focus();
        }else{
            var url = 'controller_create.php';
            $.get(url,{nombres:nombres, email:email, password_user:password_user},function (datos) {
                $('#respuesta').html(datos);
            });
        }
    });
</script>
