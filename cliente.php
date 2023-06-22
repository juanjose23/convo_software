<?php
require_once "include/header.php";
$conexion = mysqli_connect("localhost", "root", "", "clinica_medica");
// Realizar la consulta para obtener los datos
$query = "SELECT
p.nombre AS persona_nombre,
p.telefono,
p.direccion_domicilio,
p.correo,
p.nacionalidad,
p.fecha_registro,
pn.apellido,
pn.fecha_nacimiento,
pn.cedula,
pn.genero,
e.nombre AS enfermedad_nombre,
e.descripcion AS enfermedad_descripcion,
ts.nombre AS tipo_sangre_nombre,
tp.nombre AS tipo_alergia_nombre,
tp.descripcion AS tipo_alergia_descripcion,
a.nombre AS alergia_nombre,
a.descripcion AS alergia_descripcion,
c.codigo_inss,
c.tipo,
c.foto,
c.id AS id_cliente,
c.estado
FROM persona p
LEFT JOIN persona_natural pn ON p.id = pn.id_persona
LEFT JOIN enfermedades_personas ep ON p.id = ep.id_persona
LEFT JOIN enfermedades e ON ep.id_enfermedades = e.id
LEFT JOIN sangre_personas sp ON p.id = sp.id_persona
LEFT JOIN tipos_sangre ts ON sp.id_tipos_sangre = ts.id
LEFT JOIN alergias_personas ap ON p.id = ap.id_persona
LEFT JOIN alergias a ON ap.id_alergias = a.id
LEFT JOIN tipo_alergias tp ON a.id_tipo = tp.id
LEFT JOIN cliente c ON p.id = c.id_persona";

$resultado = mysqli_query($conexion, $query);

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pacientes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Pacientes</a></li>
                        <li class="breadcrumb-item active">Gestion de pacientes</li>
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
                            <h3 class="card-title">Lista de Pacientes</h3>
                            <div class="align-content-end text-right">
                                <a href="crear_cliente.php" class="btn btn-success">Crear pacientes</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Fecha de Nacimiento</th>
                                        <th>Cédula</th>
                                        <th>Accion</th>
                                        <th>Género</th>
                                       
                                        <th>Teléfono</th>
                                        <th>Dirección</th>
                                        <th>Correo</th>
                                        <th>Nacionalidad</th>
                                        <th>Tipo</th>
                                        <th>Foto</th>
                                        <th>Tipo de Sangre</th>
                                        <th>Tipo de Enfermedad</th>
                                        <th>Descripción de Enfermedades</th>
                                        <th>Alergias</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($resultado && mysqli_num_rows($resultado) > 0) {
                                        while ($fila = mysqli_fetch_assoc($resultado)) {
                                            echo "<tr>
                                                <td>" . $fila['persona_nombre'] . "</td>
                                                <td>" . $fila['apellido'] . "</td>
                                                <td>" . $fila['fecha_nacimiento'] . "</td>
                                                <td>" . $fila['cedula'] . "</td>
                                               
                                                <td><a href='actualiza_cliente.php?id=" . $fila['id_cliente'] . "'>Editar</a></td>
                                                <td>" . $fila['genero'] . "</td>
                                                <td>" . $fila['telefono'] . "</td>
                                                <td>" . $fila['direccion_domicilio'] . "</td>
                                                <td>" . $fila['correo'] . "</td>
                                                <td>" . $fila['nacionalidad'] . "</td>
                                                <td>" . $fila['tipo'] . "</td>
                                                <td><img src='" . $fila['foto'] . "' width='100'></td>
                                                <td>" . $fila['tipo_sangre_nombre'] . "</td>
                                                <td>" . $fila['enfermedad_nombre'] . "</td>
                                                <td>" . $fila['enfermedad_descripcion'] . "</td>
                                                <td>" . $fila['alergia_nombre'] . "</td>
                                            </tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='15'>No se encontraron clientes</td></tr>";
                                    }
                                    ?>
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