<?php
require_once "include/header.php";
require_once "conexion.php";
$db = conectar::conexion();
$sql = "SELECT *
FROM persona
JOIN trabajador ON persona.id = trabajador.id_persona
JOIN persona_natural ON persona.id = persona_natural.id_persona";
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
                    <h1>Trabajadores</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trabajadores</a></li>
                        <li class="breadcrumb-item active">Gestion de trabajadores</li>
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
                            <h3 class="card-title">Lista de Colaboradores</h3>
                            <div class="align-content-end text-right">
                                <a href="crear_trabajador.php" class="btn btn-success">Crear trabajador</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Codigo Inss</th>
                                        <th>Telefono</th>
                                        <th>Direccion</th>
                                        <th>Correo</th>
                                        <th>Estado</th>
                                   
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($array_resultado as $row) : ?>
                                        <tr>
                                            <td><?php echo $row['codigo_trabajador']; ?></td>
                                            <td><img src="<?php echo $row['foto']; ?>" alt="" width="30"> <?php echo $row['nombre']; ?></td>
                                            <td><?php echo $row['apellido']; ?></td>
                                            <td><?php echo $row['codigo_inss']; ?></td>
                                            <td><?php echo $row['telefono']; ?></td>
                                           
                                            <td><?php echo $row['direccion_domicilio']; ?></td>
                                            <td><?php echo $row['correo']; ?></td>
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