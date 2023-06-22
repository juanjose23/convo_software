<?php
require_once "include/header.php";?>

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
                                                <label for="exampleInputEmail1">Sucursal</label>
                                                <input type="text" name="correo" class="form-control" id="exampleInputEmail1" placeholder="Ingresa Nombre">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Médico</label>
                                                <input type="text" class="form-control" name="direccion" id="exampleInputEmail1" placeholder="Ingresa Nombre">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Especialidad</label>
                                                <input type="text" class="form-control" name="direccion" id="exampleInputEmail1" placeholder="Ingresa Nombre">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Fecha de cita</label>
                                                <input type="date" name="fecha_nacimiento" class="form-control" id="exampleInputEmail1" placeholder="Ingresa Nombre">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                            <label for="exampleInputEmail1">Hora de cita</label>
                                                <input type="time" name="fecha_nacimiento" class="form-control" id="exampleInputEmail1" placeholder="Ingresa Nombre">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Consultorio</label>
                                                <input type="text" class="form-control" name="direccion" id="exampleInputEmail1" placeholder="Ingresa Nombre">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Motivo de cita</label>
                                                <textarea type="text" class="form-control" name="alergias" id="exampleInputEmail1" placeholder="Enfermedades"></textarea>

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