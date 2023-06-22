<?php
require_once "include/header.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener los valores del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $cedula = $_POST["cedula"];
    $inss = $_POST["inss"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $nacionalidad = $_POST["nacionalidad"];
    $direccion = $_POST["direccion"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $genero = $_POST["genero"];
    $tipo_paciente = $_POST["tipo_paciente"];
    $id_sangre = $_POST["tipo_sangre"];
    $id_alergias = $_POST["alergias"];
    $id_enfermedades = $_POST["tipo_enfermedad"];
    // Guardar la foto en la carpeta "img"
    $foto = $_FILES["foto"]["name"];
    $foto_tmp = $_FILES["foto"]["tmp_name"];
    $ruta_foto = "img/" . $foto;
    move_uploaded_file($foto_tmp, $ruta_foto);

    // Realizar la conexión a la base de datos (reemplaza los valores con los de tu entorno)
    $conexion = mysqli_connect("localhost", "root", "", "clinica_medica");

    // Verificar la conexión
    if (!$conexion) {
        die("Error al conectar con la base de datos: " . mysqli_connect_error());
    }
    // Verificar si la cédula ya existe en la tabla "persona"
    $consulta_cedula = "SELECT cedula FROM persona_natural WHERE cedula = '$cedula'";
    $resultado_cedula = mysqli_query($conexion, $consulta_cedula);

    if (mysqli_num_rows($resultado_cedula) > 0) {
        // La cédula ya existe, no se realiza la inserción
        echo '
  <script>
  document.addEventListener("DOMContentLoaded", function() {
      $("#modal-danger").modal("show");
  });
  </script>';
        echo '
     ';
    } else {
        // Insertar los datos en las tablas correspondientes
        $fecha_registro = date("Y-m-d");

        // Insertar en la tabla "persona"
        $query_persona = "INSERT INTO persona (nombre, telefono, direccion_domicilio, correo, nacionalidad, fecha_registro)
                      VALUES ('$nombre', '$telefono', '$direccion', '$correo', '$nacionalidad', '$fecha_registro')";
        mysqli_query($conexion, $query_persona);

        // Obtener el ID de la persona insertada
        $id_persona = mysqli_insert_id($conexion);

        // Insertar en la tabla "persona_natural"
        $query_persona_natural = "INSERT INTO persona_natural (id_persona, apellido, fecha_nacimiento, cedula, genero)
                              VALUES ('$id_persona', '$apellido', '$fecha_nacimiento', '$cedula', '$genero')";
        mysqli_query($conexion, $query_persona_natural);

        // Insertar en la tabla "enfermedades"
        $query_enfermedades = "INSERT INTO enfermedades_personas (id_persona, id_enfermedades, fecha_registro, estado)
      VALUES('$id_persona','$id_enfermedades', NOW(), 1)";
        mysqli_query($conexion, $query_enfermedades);
        // Insertar en la tabla "Tipo de sangre persona"
        $query_sangres = "INSERT INTO sangre_personas (id_persona, id_tipos_sangre, fecha_registro, estado)
      VALUES('$id_persona','$id_sangre', NOW(), 1)";
        mysqli_query($conexion, $query_sangres);
        // Insertar en la tabla alergias de personas
        $query_sangres = "INSERT INTO alergias_personas (id_persona, id_alergias, fecha_registro, estado)
      VALUES('$id_persona','$id_alergias', NOW(), 1)";
        mysqli_query($conexion, $query_sangres);
        // Insertar en la tabla "cliente"
        $query_cliente = "INSERT INTO cliente (id_persona,codigo_inss tipo, foto, estado)
                      VALUES ('$id_persona','$inss','$tipo_paciente', '$ruta_foto', 1)";
        mysqli_query($conexion, $query_cliente);
    }
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Agregar Paciente</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Agregar Paciente</a></li>
                        <li class="breadcrumb-item active">Gestion de Pacientes</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="modal fade" id="modal-danger">
        <div class="modal-dialog">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title">Cédula existente</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>La cédula ingresada ya existe en la base de datos.</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Trabajadores </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nombre:</label>
                                                <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" placeholder="Ingresa Nombre">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Apellido:</label>
                                                <input type="text" name="apellido" class="form-control" id="exampleInputEmail1" placeholder="Ingresa Nombre">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Cedula:</label>
                                                <input type="text" name="cedula" class="form-control" id="exampleInputEmail1" placeholder="Ingresa Nombre">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Inss:</label>
                                                <input type="text" name="inss" class="form-control" id="exampleInputEmail1" placeholder="Ingresa Nombre">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Teléfono:</label>
                                                <input type="number" name="telefono" class="form-control" id="exampleInputEmail1" placeholder="Ingresa Nombre">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Correo:</label>
                                                <input type="email" name="correo" class="form-control" id="exampleInputEmail1" placeholder="Ingresa Nombre">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nacionalidad:</label>

                                                <select name="nacionalidad" class=" form-control select2bs4" id="nacionalidad" value="">
                                                    <optgroup label="América del Norte">
                                                        <option value="CA">Canadá</option>
                                                        <option value="US">Estados Unidos</option>
                                                    </optgroup>
                                                    <optgroup label="América Central">
                                                        <option value="CR">Costa Rica</option>
                                                        <option value="CU">Cuba</option>
                                                        <option value="DO">República Dominicana</option>
                                                        <option value="SV">El Salvador</option>
                                                        <option value="GT">Guatemala</option>
                                                        <option value="HT">Haití</option>
                                                        <option value="HN">Honduras</option>
                                                        <option value="JM">Jamaica</option>
                                                        <option value="MX">México</option>
                                                        <option value="NI">Nicaragua</option>
                                                        <option value="PA">Panamá</option>
                                                        <option value="PR">Puerto Rico</option>
                                                    </optgroup>
                                                    <optgroup label="América del Sur">
                                                        <option value="AR">Argentina</option>
                                                        <option value="BO">Bolivia</option>
                                                        <option value="BR">Brasil</option>
                                                        <option value="CL">Chile</option>
                                                        <option value="CO">Colombia</option>
                                                        <option value="EC">Ecuador</option>
                                                        <option value="PY">Paraguay</option>
                                                        <option value="PE">Perú</option>
                                                        <option value="UY">Uruguay</option>
                                                        <option value="VE">Venezuela</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Direccion:</label>
                                                <input type="text" class="form-control" name="direccion" id="exampleInputEmail1" placeholder="Ingresa Nombre">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Fecha de nacimiento:</label>
                                                <input type="date" name="fecha_nacimiento" class="form-control" id="exampleInputEmail1" placeholder="Ingresa Nombre">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label style="font: bold 16px Arial, sans-serif;">Genero:</label>
                                                <select name="genero" class="form-control select2bs4" id="genero" value="">
                                                    <option VALUE="F">Femenino</option>
                                                    <option VALUE="M">Masculino</option>
                                                    <Option value="O">Otro</OPTIOn>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label style="font: bold 16px Arial, sans-serif;">Tipo de paciente:</label>
                                                <select name="tipo_paciente" class="form-control select2bs4" id="genero" value="">
                                                    <option VALUE="nuevo">Nuevo</option>
                                                    <option VALUE="reingreso">Reingreso</option>
                                                    <Option value="Otro">Otro</OPTIOn>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tipo de sangre:</label>
                                                <select name="tipo_sangre" class="form-control select2bs4" id="tipo_sangre" value="">
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
                                                    $resultado = mysqli_query($conexion, "SELECT id, nombre FROM tipos_sangre");

                                                    // Paso 3: Recorrer los resultados y generar las opciones
                                                    while ($fila = mysqli_fetch_assoc($resultado)) {
                                                        echo "<option value='" . $fila['id'] . "'>" . $fila['nombre'] . "</option>";
                                                    }

                                                    // Paso 4: Cerrar la etiqueta del select
                                                    ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Enfermedades:</label>
                                                <select name="tipo_enfermedad" class="form-control select2bs4" id="tipo_enfermedad" value="">
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
                                                    $resultado = mysqli_query($conexion, "SELECT id, nombre FROM enfermedades");

                                                    // Paso 3: Recorrer los resultados y generar las opciones
                                                    while ($fila = mysqli_fetch_assoc($resultado)) {
                                                        echo "<option value='" . $fila['id'] . "'>" . $fila['nombre'] . "</option>";
                                                    }

                                                    // Paso 4: Cerrar la etiqueta del select
                                                    ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Alergias:</label>
                                                <select name="alergias" class="form-control select2bs4" id="alergias" value="">
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
                                                    $resultado = mysqli_query($conexion, "SELECT id, nombre FROM alergias");

                                                    // Paso 3: Recorrer los resultados y generar las opciones
                                                    while ($fila = mysqli_fetch_assoc($resultado)) {
                                                        echo "<option value='" . $fila['id'] . "'>" . $fila['nombre'] . "</option>";
                                                    }

                                                    // Paso 4: Cerrar la etiqueta del select
                                                    ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Foto:</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="foto" class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Cargar</span>
                                                    </div>
                                                </div>
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