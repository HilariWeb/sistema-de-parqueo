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

            <h2>Asignación de roles a usuarios</h2>

            <br>
            <div class="row">
                <div class="col-md-12">

                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Listado de usuario</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>

                            </div>

                            <div class="card-body" style="display: block;">
                                <table class="table table-bordered table-sm table-striped">
                                    <th><center>Nro</center></th>
                                    <th>Nombre de Usuarios</th>
                                    <th>Email</th>
                                    <th><center>Asignar rol</center></th>

                                    <?php
                                    $contador = 0;
                                    $query_usuario = $pdo->prepare("SELECT * FROM tb_usuarios WHERE estado = '1' ");
                                    $query_usuario->execute();
                                    $usuarios = $query_usuario->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($usuarios as $usuario){
                                        $id = $usuario['id'];
                                        $nombres = $usuario['nombres'];
                                        $email = $usuario['email'];
                                        $rol = $usuario['rol'];
                                        $contador = $contador + 1;
                                        ?>
                                        <tr>
                                            <td><center><?php echo $contador;?></center></td>
                                            <td><?php echo $nombres;?></td>
                                            <td><?php echo $email;?></td>
                                            <td>
                                                <center>
                                                    <?php
                                                    if($rol == ""){ ?>
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal<?php echo $id;?>">
                                                            Asignar
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal<?php echo $id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Asingar rol</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="controller_asignar.php" method="post">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label for="">Nombre del usuario</label>
                                                                                        <input type="text" name="nombre" class="form-control" value="<?php echo $nombres;?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label for="">Email</label>
                                                                                        <input type="text" name="email" class="form-control" value="<?php echo $email;?>">
                                                                                        <input type="text" name="id_user" value="<?php echo $id;?>" hidden>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label for="">Rol</label>
                                                                                        <select name="rol" id="" class="form-control">
                                                                                            <?php
                                                                                            $query_roles = $pdo->prepare("SELECT * FROM tb_roles WHERE estado = '1' ");
                                                                                            $query_roles->execute();
                                                                                            $roles = $query_roles->fetchAll(PDO::FETCH_ASSOC);
                                                                                            foreach($roles as $role){
                                                                                                $id_rol = $role['id_rol'];
                                                                                                $nombre = $role['nombre'];
                                                                                                ?>
                                                                                                <option value="<?php echo $nombre;?>"><?php echo $nombre;?></option>
                                                                                                <?php
                                                                                            }
                                                                                            ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                        <button type="submit" class="btn btn-primary">Asignar rol</button>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <?php
                                                    }else{
                                                        echo $rol;
                                                    }
                                                    ?>
                                                </center>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>

                                </table>
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

