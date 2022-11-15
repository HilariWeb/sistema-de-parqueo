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

            <h2>Listado de clientes</h2>

            <br>
            <script>
                $(document).ready(function() {
                    $('#table_id').DataTable( {
                        "pageLength": 5,
                        "language": {
                            "emptyTable": "No hay información",
                            "info": "Mostrando _START_ a _END_ de _TOTAL_ Clientes",
                            "infoEmpty": "Mostrando 0 a 0 de 0 Clientes",
                            "infoFiltered": "(Filtrado de _MAX_ total Clientes)",
                            "infoPostFix": "",
                            "thousands": ",",
                            "lengthMenu": "Mostrar _MENU_ Clientes",
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

            <div class="row">
                <div class="col-md-10">

                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Clientes registrados</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body" style="display: block;">

                            <table id="table_id" class="table table-bordered table-sm table-striped">
                                <thead>
                                <th><center>Nro</center></th>
                                <th>Nombre del cliente</th>
                                <th>Nit Ci del cliente</th>
                                <th>Placa del auto</th>
                                <th><center>Acción</center></th>
                                </thead>
                                <tbody>
                                <?php
                                $contador_cliente = 0;
                                $query_clientes = $pdo->prepare("SELECT * FROM tb_clientes WHERE estado = '1'  ");
                                $query_clientes->execute();
                                $datos_clientes = $query_clientes->fetchAll(PDO::FETCH_ASSOC);
                                foreach($datos_clientes as $datos_cliente){
                                    $contador_cliente = $contador_cliente + 1;
                                    $id_cliente = $datos_cliente['id_cliente'];
                                    $nombre_cliente = $datos_cliente['nombre_cliente'];
                                    $nit_ci_cliente = $datos_cliente['nit_ci_cliente'];
                                    $placa_auto = $datos_cliente['placa_auto'];
                                    ?>
                                    <tr>
                                        <td><center><?php echo $contador_cliente;?></center></td>
                                        <td><?php echo $nombre_cliente;?></td>
                                        <td><?php echo $nit_ci_cliente;?></td>
                                        <td><?php echo $placa_auto;?></td>
                                        <td>
                                            <center>
                                                <a href="update.php?id=<?php echo $id_cliente; ?>" class="btn btn-success">Editar</a>
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

                    <hr>
                    <a href="generar-reporte.php" class="btn btn-primary">Generar reporte
                        <i class="fa fa">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-bar-graph" viewBox="0 0 16 16">
                                <path d="M10 13.5a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-6a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v6zm-2.5.5a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1zm-3 0a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-1z"/>
                                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                            </svg>
                        </i>
                    </a>

                    <br><br>

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


