<?php
require_once "include/header.php";
$conexion = mysqli_connect("localhost", "root", "", "clinica_medica");

// Verificar la conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
// Obtener el ID del cliente a editar
$id_cliente = $_GET['id'];

// Obtener los datos del cliente a partir de su ID
$query = "SELECT * FROM cliente c
          INNER JOIN persona p ON c.id_persona = p.id
          INNER JOIN persona_natural pn ON p.id = pn.id_persona
          INNER JOIN enfermedades e ON p.id = e.id_persona
          WHERE c.id=$id_cliente";
$resultado = mysqli_query($conexion, $query);
$cliente = mysqli_fetch_assoc($resultado);
// Verificar si se ha enviado el formulario de actualización
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_cliente = $_GET['id'];
    $id_persona = $_POST['id_persona'];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $cedula = $_POST["cedula"];
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

    $foto = $_FILES["foto"]["name"];
    $foto_tmp = $_FILES["foto"]["tmp_name"];
    $ruta_foto = "img/";
    
    if (!empty($foto) && !empty($foto_tmp)) {
        $ruta_foto .= $foto;
        move_uploaded_file($foto_tmp, $ruta_foto);
    }
    

    // Ejecutar consulta para actualizar los datos en la tabla "persona"
    $query_persona = "UPDATE persona SET nombre='$nombre', telefono='$telefono', direccion_domicilio='$direccion', correo='$correo', nacionalidad='$nacionalidad' WHERE id=$id_persona";
    mysqli_query($conexion, $query_persona);

    // Ejecutar consulta para actualizar los datos en la tabla "persona_natural"
    $query_persona_natural = "UPDATE persona_natural SET apellido='$apellido', fecha_nacimiento='$fecha_nacimiento', cedula='$cedula', genero='$genero' WHERE id_persona=$id_persona";
    mysqli_query($conexion, $query_persona_natural);

    // Ejecutar consulta para actualizar los datos en la tabla "enfermedades"
    $query_enfermedades = "UPDATE enfermedades SET tipo_sangre='$tipo_sangre', tipo_enfermedades='$tipo_enfermedad', descripcion_enfermedades='$enfermedades', alergias='$alergias' WHERE id_persona=$id_persona";
    mysqli_query($conexion, $query_enfermedades);
    // Ejecutar consulta para actualizar los datos en la tabla "cliente"
    $query_cliente = "UPDATE cliente SET tipo='$tipo_paciente', foto='$ruta_foto', estado=1 WHERE id=$id_cliente";
    mysqli_query($conexion, $query_cliente);
    
}
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Agregar Cliente</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Agregar Cliente</a></li>
                        <li class="breadcrumb-item active">Gestion de clientes</li>
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
                            <h3 class="card-title">Clientes </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" name="actualizar" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="id_persona" value="<?php echo $cliente['id_persona']; ?>" hidden>
                                                <label for="exampleInputEmail1">Nombre</label>
                                                <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" placeholder="Ingresa Nombre" value="<?php echo $cliente['nombre']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Apellido</label>
                                                <input type="text" name="apellido" class="form-control" id="exampleInputEmail1" placeholder="Ingresa Nombre" value="<?php echo $cliente['apellido']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Cedula</label>
                                                <input type="text" name="cedula" class="form-control" id="exampleInputEmail1" placeholder="Ingresa Nombre" value="<?php echo $cliente['cedula']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Telefono</label>
                                                <input type="text" name="telefono" class="form-control" id="exampleInputEmail1" placeholder="Ingresa Nombre" value="<?php echo $cliente['telefono']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Correo</label>
                                                <input type="email" name="correo" class="form-control" id="exampleInputEmail1" placeholder="Ingresa Nombre" value="<?php echo $cliente['correo']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nacionalidad</label>

                                                <select name="nacionalidad" class="selectpicker form-control" id="nacionalidad" value="">
                                                    <option value="<?php echo $cliente['nacionalidad'] ?>"><?php echo $cliente['nacionalidad'] ?></option>
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
                                                <input type="text" class="form-control" name="direccion" id="exampleInputEmail1" placeholder="Ingresa Nombre" value="<?php echo $cliente['direccion_domicilio']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Fecha de nacimiento</label>
                                                <input type="date" name="fecha_nacimiento" class="form-control" id="exampleInputEmail1" placeholder="Ingresa Nombre" value="<?php echo $cliente['fecha_nacimiento']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label style="font: bold 16px Arial, sans-serif;">Genero</label>
                                                <select name="genero" class="selectpicker form-control" id="genero">
                                                    <option value="M" <?php if ($cliente['genero'] == 'M') echo 'selected'; ?>>Masculino</option>
                                                    <option value="F" <?php if ($cliente['genero'] == 'F') echo 'selected'; ?>>Femenino</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tipo de paciente</label>
                                                <select name="tipo_paciente" class="selectpicker form-control" id="tipo_paciente">
                                                    <option value="<?php echo $cliente['tipo'] ?>"><?php echo $cliente['tipo'] ?></option>
                                                    <option value="Nuevo">Nuevo</option>
                                                    <option value="Reingreso">Reingreso</option>
                                                    <option value="Emergencia">Emergencia</option>
                                                    <option value="Pediátrico">Pediátrico</option>
                                                    <option value="Geriátrico">Geriátrico</option>
                                                    <option value="Control/Preventivo">Control/Preventivo</option>
                                                    <option value="Derivado">Derivado</option>
                                                    <option value="Hospitalizado">Hospitalizado</option>
                                                    <option value="Crónico">Crónico</option>
                                                    <option value="Oncológico">Oncológico</option>
                                                    <!-- Agrega más opciones según los tipos de pacientes que tengas en tu clínica -->
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tipo de sangre</label>
                                                <select name="tipo_sangre" class="selectpicker form-control" id="tipo_sangre" value="">
                                                    <option value="">Selecciona una opción</option>
                                                    <optgroup label="Grupo A">
                                                        <option value="A+" <?php if ($cliente['tipo_sangre'] == 'A+') echo 'selected'; ?>>A+</option>
                                                        <option value="A-" <?php if ($cliente['tipo_sangre'] == 'A-') echo 'selected'; ?>>A-</option>
                                                    </optgroup>
                                                    <optgroup label="Grupo B">
                                                        <option value="B+" <?php if ($cliente['tipo_sangre'] == 'B+') echo 'selected'; ?>>B+</option>
                                                        <option value="B-" <?php if ($cliente['tipo_sangre'] == 'B-') echo 'selected'; ?>>B-</option>

                                                    </optgroup>
                                                    <optgroup label="Grupo AB">
                                                        <option value="AB+" <?php if ($cliente['tipo_sangre'] == 'AB+') echo 'selected'; ?>>AB+</option>
                                                        <option value="AB-" <?php if ($cliente['tipo_sangre'] == 'AB-') echo 'selected'; ?>>AB-</option>

                                                    </optgroup>
                                                    <optgroup label="Grupo O">
                                                        <option value="O+" <?php if ($cliente['tipo_sangre'] == 'O+') echo 'selected'; ?>>O+</option>
                                                        <option value="O-" <?php if ($cliente['tipo_sangre'] == 'O-') echo 'selected'; ?>>O-</option>

                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tipo de enfermedad</label>
                                                <select name="tipo_enfermedad" class="selectpicker form-control" id="tipo_sangre" value="">
                                                    <option value="<?php echo $cliente['tipo'] ?>"><?php echo $cliente['tipo_enfermedades'] ?></option>
                                                    <option value="aguda_no_contagiosa">Aguda no contagiosa</option>
                                                    <option value="aguda_contagiosa">Aguda contagiosa</option>
                                                    <option value="cronica_no_contagiosa">Crónica no contagiosa</option>
                                                    <option value="cronica_contagiosa">Crónica contagiosa</option>
                                                    <option value="No tiene">No padece</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Alergias</label>
                                                <textarea type="text" class="form-control" name="alergias" id="exampleInputEmail1" placeholder="Enfermedades"><?php echo $cliente['alergias'] ?></textarea>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Descripcion de enfermedades</label>
                                                <textarea type="text" class="form-control" name="enfermedades" id="exampleInputEmail1" placeholder="Enfermedades"><?php echo $cliente['descripcion_enfermedades'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Foto</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="foto" value="<?php echo $cliente['foto'] ?>" class="custom-file-input" id="exampleInputFile">
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

<?php require_once "include/footer.php"; ?>