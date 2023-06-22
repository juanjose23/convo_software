<?php
require_once "include/header.php";
require_once "conexion.php";
$db = conectar::conexion();
$sql = "SELECT c.id, s.nombre AS servicio, p.nombre AS cliente, c.motivo, c.fecha, c.hora, c.estado
FROM cita c
INNER JOIN servicios_citas s ON c.id_servicios = s.id
INNER JOIN cliente cl ON c.id_cliente = cl.id
INNER JOIN persona p ON cl.id_persona = p.id;
";
$resultado = $db->query($sql);
if ($resultado) {
    $array_resultado = array();
    while ($fila = $resultado->fetch_assoc()) {
        $array_resultado[] = $fila;
    }
} else {
    echo "Error en la consulta: " . $db->error;
}

$db->close();
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Citas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Citas</a></li>
                        <li class="breadcrumb-item active">Gestion de citas</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Lista de Citas</h3>
                            <div class="align-content-end text-right">
                                <a href="crear_cita.php" class="btn btn-success">Crear citas</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Cita</th>
                                        <th>Cliente</th>
                                        <th>Motivo</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Estado</th>
                                      
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($array_resultado as $row) : ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td> <?php echo $row['servicio']; ?></td>
                                            <td><?php echo $row['cliente']; ?></td>
                                            <td><?php echo $row['motivo']; ?></td>
                                            <td><?php echo $row['fecha']; ?></td>
                                            <td><?php echo $row['hora']; ?></td>
                                          
                                            <td>
                                                <?php
                                                $estado = $row['estado'];
                                                if ($estado == 1) {
                                                    echo "Activo";
                                                } else {
                                                    echo "Inactivo";
                                                }
                                                ?>

                                            </td>
                                            <td>
                                                <a class="btn btn-danger">Eliminar</a>
                                                <a class="btn btn-warning">Actualizar</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
</div>
<?php require_once "include/footer.php"; ?>