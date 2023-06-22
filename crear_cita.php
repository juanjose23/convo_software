<?php
require_once "include/header.php"; 
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener los valores del formulario
    $id_cita = $_POST["cita"];
    $id_cliente = $_POST["id_cliente"];
   
    $fecha= $_POST["fecha"];
    $hora= $_POST["hora"];
    $motivo= $_POST["motivo"];

    // Realizar la conexión a la base de datos (reemplaza los valores con los de tu entorno)
    $conexion = mysqli_connect("localhost", "root", "", "clinica_medica");

    // Verificar la conexión
    if (!$conexion) {
        die("Error al conectar con la base de datos: " . mysqli_connect_error());
    }

   
        // Insertar en la tabla "persona"
        $query_persona = "INSERT INTO cita (id_servicios, id_cliente, motivo, fecha, hora, estado) VALUES
        ('$id_cita','$id_cliente', '$motivo', '$fecha', '$hora', 1)";
        mysqli_query($conexion, $query_persona);

    

       
    
    
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Agregar Cita</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Agregar Cita</a></li>
                        <li class="breadcrumb-item active">Servicios</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Citas</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Cita</label>

                                                <select name="cita" class="form-control select2bs4" id="tipo_enfermedad" value="">
                                                    <option value="">Selecciona una opción</option>

                                                    <?php
                                                    // Paso 1: Establecer la conexión a la base de datos
                                                    $conexion = mysqli_connect("localhost", "root", "", "clinica_medica");

                                                    // Verificar si la conexión fue exitosa
                                                    if (mysqli_connect_errno()) {
                                                        echo "Error en la conexión a la base de datos: " . mysqli_connect_error();
                                                        exit;
                                                    }

                                                    // Paso 2: Ejecutar la consulta SQL
                                                    $resultado = mysqli_query($conexion, "SELECT * FROM servicios_citas");

                                                    // Paso 3: Recorrer los resultados y generar las opciones
                                                    while ($fila = mysqli_fetch_assoc($resultado)) {
                                                        echo "<option value='" . $fila['id'] . "'>" . $fila['nombre']. "</option>";
                                                    }

                                                    // Paso 4: Cerrar la etiqueta del select
                                                    ?>

                                                </select>
                                            </div>
                                        </div>

                                       
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Paciente</label>
                                                <select name="id_cliente" class="form-control select2bs4" id="tipo_enfermedad" value="">
                                                    <option value="">Selecciona una opción</option>

                                                    <?php
                                                    // Paso 1: Establecer la conexión a la base de datos
                                                    $conexion = mysqli_connect("localhost", "root", "", "clinica_medica");

                                                    // Verificar si la conexión fue exitosa
                                                    if (mysqli_connect_errno()) {
                                                        echo "Error en la conexión a la base de datos: " . mysqli_connect_error();
                                                        exit;
                                                    }

                                                    // Paso 2: Ejecutar la consulta SQL
                                                    $resultado = mysqli_query($conexion, "SELECT
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
                                                    FROM
                                                    cliente c
                                                    INNER JOIN persona p ON c.id_persona = p.id
                                                    LEFT JOIN persona_natural pn ON p.id = pn.id_persona
                                                    LEFT JOIN enfermedades_personas ep ON p.id = ep.id_persona
                                                    LEFT JOIN enfermedades e ON ep.id_enfermedades = e.id
                                                    LEFT JOIN sangre_personas sp ON p.id = sp.id_persona
                                                    LEFT JOIN tipos_sangre ts ON sp.id_tipos_sangre = ts.id
                                                    LEFT JOIN alergias_personas ap ON p.id = ap.id_persona
                                                    LEFT JOIN alergias a ON ap.id_alergias = a.id
                                                    LEFT JOIN tipo_alergias tp ON a.id_tipo = tp.id");

                                                    // Paso 3: Recorrer los resultados y generar las opciones
                                                    while ($fila = mysqli_fetch_assoc($resultado)) {
                                                        echo "<option value='" . $fila['id_cliente'] . "'>" . $fila['persona_nombre'].' '. $fila['apellido']. "</option>";
                                                    }

                                                    // Paso 4: Cerrar la etiqueta del select
                                                    ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Fecha de cita</label>
                                                <input type="date" name="fecha" class="form-control" id="exampleInputEmail1" placeholder="Ingresa Nombre">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Hora de cita</label>
                                                <input type="time" name="hora" class="form-control" id="exampleInputEmail1" placeholder="Ingresa Nombre">
                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Motivo de cita</label>
                                                <textarea type="text" class="form-control" name="motivo" id="exampleInputEmail1" placeholder="Enfermedades"></textarea>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>

        </div>
    </section>

</div>
<?php
require_once "include/footer.php";
?>