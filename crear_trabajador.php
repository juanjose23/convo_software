<?php
require_once "include/header.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener los valores del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $cedula = $_POST["cedula"];
<<<<<<< HEAD
=======
    $inss = $_POST["codigo_inns"];
    $especialidad = $_POST["especialidad"];
>>>>>>> 14973406b29624d24d4d8790182e36cd98554efa
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $nacionalidad = $_POST["nacionalidad"];
    $direccion = $_POST["direccion"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $genero = $_POST["genero"];
    $tipo_paciente = $_POST["tipo_paciente"];
    $tipo_sangre = $_POST["tipo_sangre"];
    $tipo_enfermedad = $_POST["tipo_enfermedad"];
    $alergias = $_POST["alergias"];
    $enfermedades = $_POST["enfermedades"];

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
    $query_enfermedades = "INSERT INTO enfermedades (id_persona, tipo_sangre, tipo_enfermedades, descripcion_enfermedades, alergias)
                           VALUES ('$id_persona', '$tipo_sangre', '$tipo_enfermedad', '$enfermedades', '$alergias')";
    mysqli_query($conexion, $query_enfermedades);

    // Insertar en la tabla "cliente"
    $query_cliente = "INSERT INTO cliente (id_persona, tipo, foto, estado)
                      VALUES ('$id_persona', '$tipo_paciente', '$ruta_foto', 1)";
    mysqli_query($conexion, $query_cliente);
    
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Agregar Trabajador</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Agregar Trabajador</a></li>
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
                                                <label for="exampleInputEmail1">Nombre</label>
                                                <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" placeholder="Ingresa Nombre">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Apellido</label>
                                                <input type="text" name="apellido" class="form-control" id="exampleInputEmail1" placeholder="Ingresa Nombre">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Cedula</label>
                                                <input type="text" name="cedula" class="form-control" id="exampleInputEmail1" placeholder="Ingresa Nombre">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Teléfono</label>
                                                <input type="text" name="telefono" class="form-control" id="exampleInputEmail1" placeholder="Ingresa Nombre">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Correo</label>
                                                <input type="email" name="correo" class="form-control" id="exampleInputEmail1" placeholder="Ingresa Nombre">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nacionalidad</label>

                                                <select name="nacionalidad" class="selectpicker form-control" id="nacionalidad" value="">
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
                                                <label for="exampleInputEmail1">Direccion</label>
                                                <input type="text" class="form-control" name="direccion" id="exampleInputEmail1" placeholder="Ingresa Nombre">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Fecha de nacimiento</label>
                                                <input type="date" name="fecha_nacimiento" class="form-control" id="exampleInputEmail1" placeholder="Ingresa Nombre">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label style="font: bold 16px Arial, sans-serif;">Genero</label>
                                                <select name="genero" class="selectpicker form-control" id="genero" value="">
                                                    <option VALUE="F">Femenino</option>
                                                    <option VALUE="M">Masculino</option>
                                                    <Option value="O">Otro</OPTIOn>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Cargo</label>
                                                <select name="tipo_paciente" class="selectpicker form-control" id="tipo_paciente">
                                                    <option value="">Selecciona una opción</option>
                                                    <option value="Nuevo">Nuevo</option>
                                                    <option value="Reingreso">Contador</option>
                                                    <option value="Emergencia">Secretaria</option>
                                                    <option value="Pediátrico">Enfermera</option>
                                                    <option value="Geriátrico">Camillero</option>
                                                    <option value="Control/Preventivo">Médico</option>
                                                    <!-- Agrega más opciones según los tipos de pacientes que tengas en tu clínica -->
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tipo de contrato</label>
                                                <select name="tipo_sangre" class="selectpicker form-control" id="tipo_sangre" value="">
                                                    <option value="">Selecciona una opción</option>
                                                    <optgroup label="Contrato">
                                                        <option value="indeterminado">Contrato indeterminado</option>
                                                        <option value="determinado">Contrato determinado</option>
                                                        <option value="temporal">Contrato tempooral</option>
                                                        <option value="periodo de prueba">Contrato periodo de prueba</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Estado Civil</label>
                                                <select name="tipo_enfermedad" class="selectpicker form-control" id="tipo_sangre" value="">
                                                    <option value="">Selecciona una opción</option>
                                                    <option value="casada">casada</option>
                                                    <option value="soltera">soltera</option>
                                                    <option value="Comprometida">Comprometida</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Especialidades</label>
                                                <textarea type="text" class="form-control" name="alergias" id="exampleInputEmail1" placeholder="Enfermedades"></textarea>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Descripcion de Especialidades</label>
                                                <textarea type="text" class="form-control" name="enfermedades" id="exampleInputEmail1" placeholder="Enfermedades"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Foto</label>
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