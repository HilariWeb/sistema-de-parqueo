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

            <h2>Listado de Usuarios</h2>

            <br>
            <script>
                $(document).ready(function() {
                    $('#table_id').DataTable( {
                        "pageLength": 5,
                        "language": {
                            "emptyTable": "No hay información",
                            "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
                            "infoEmpty": "Mostrando 0 a 0 de 0 Usuarios",
                            "infoFiltered": "(Filtrado de _MAX_ total Usuarios)",
                            "infoPostFix": "",
                            "thousands": ",",
                            "lengthMenu": "Mostrar _MENU_ Usuarios",
                            "loadingRecords": "Cargando...",
                            "processing": "Procesando...",
                            "search": "Buscador:",
                            "zeroRecords": "Sin resultados encontrados",
                            "paginate": {
                                "first": "Primero",
                                "last": "Ultimo",
                                "next": "Siguiente",
                                "previous": "Anterior"
                            }
                        }
                    });
                } );
            </script>
            <br>
            <table id="table_id" class="table table-bordered table-sm table-striped">
                <thead>
                <th><center>Nro</center></th>
                <th>Nombre de Usuarios</th>
                <th>Email</th>
                <th><center>Acción</center></th>
                </thead>
                <tbody>
                <?php
                $contador = 0;
                $query_usuario = $pdo->prepare("SELECT * FROM tb_usuarios WHERE estado = '1' ");
                $query_usuario->execute();
                $usuarios = $query_usuario->fetchAll(PDO::FETCH_ASSOC);
                foreach($usuarios as $usuario){
                    $id = $usuario['id'];
                    $nombres = $usuario['nombres'];
                    $email = $usuario['email'];
                    $contador = $contador + 1;
                    ?>
                    <tr>
                        <td><center><?php echo $contador;?></center></td>
                        <td><?php echo $nombres;?></td>
                        <td><?php echo $email;?></td>
                        <td>
                            <center>
                                <a href="update.php?id=<?php echo $id; ?>" class="btn btn-success">Editar</a>
                                <a href="delete.php?id=<?php echo $id; ?>" class="btn btn-danger">Borrar</a>
                            </center>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>

        </div>

    </div>
    <!-- /.content-wrapper -->
    <?php include('../layout/admin/footer.php'); ?>
</div>
<?php include('../layout/admin/footer_link.php'); ?>
</body>
</html>

