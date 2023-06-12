CREATE TABLE
    sucursal (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        nombre VARCHAR(120) NOT NULL,
        ruc VARCHAR(250) NOT NULL,
        razon_social VARCHAR(250) NOT NULL,
        direccion VARCHAR(250) NOT NULL,
        correo VARCHAR(120) NOT NULL,
        telefono INTEGER,
        estado INTEGER NOT NULL
    );

CREATE TABLE
    persona (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        nombre VARCHAR(80) NOT NULL,
        telefono INTEGER NOT NULL,
        direccion_domicilio VARCHAR(250),
        correo VARCHAR(250),
        nacionalidad VARCHAR(80),
        fecha_registro DATE
    );

CREATE TABLE
    persona_natural (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        id_persona INTEGER REFERENCES persona(id),
        apellido VARCHAR(120) NOT NULL,
        fecha_nacimiento DATE NOT NULL,
        cedula INTEGER NOT NULL,
        genero CHAR
    );

CREATE TABLE
    persona_juridica(
        id INTEGER PRIMARY key AUTO_INCREMENT,
        id_persona INTEGER REFERENCES persona(id),
        ruc VARCHAR(250) NOT NULL,
        razon_social VARCHAR(120) NOT NULL,
        fecha_constitucional DATE NOT NULL
    );

CREATE TABLE
    enfermades(
        id INTEGER PRIMARY key AUTO_INCREMENT,
        id_persona INTEGER REFERENCES persona(id),
        tipo_sangre VARCHAR(250),
        tipo_enfermedad VARCHAR(120) NOT NULL,
        descripcion_enfermades VARCHAR(250) NOT NULL,
        alergias VARCHAR(250) NOT NULL
    );

CREATE TABLE
    cliente (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        id_persona INTEGER REFERENCES persona (id),
        id_sucursal INTEGER REFERENCES sucursal(id),
        tipo VARCHAR(120) NOT NULL,
        foto VARCHAR(250),
        estado INTEGER NOT NULL
    );

CREATE TABLE
    proveedor(
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        id_persona INTEGER REFERENCES persona(id),
        sector_comercial VARCHAR(250) NOT NULL,
        sitio_web VARCHAR(250),
        estado INTEGER NOT NULL
    );

CREATE TABLE
    proveedor_contacto (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        id_persona INTEGER REFERENCES persona(id),
        id_proveedor INTEGER REFERENCES proveedor(id),
        cargo VARCHAR(250) NOT NULL,
        estado INTEGER
    );

CREATE TABLE
    estado_civil (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        nombre VARCHAR(120) NOT NULL,
        descripcion VARCHAR(250)
    );

CREATE TABLE
    trabajador (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        id_persona INTEGER REFERENCES persona(id),
        id_estado_civil INTEGER REFERENCES estado_civil(id),
        id_sucursal INTEGER REFERENCES sucursal(id),
        codigo_trabajador VARCHAR(30) NOT NULL,
        codigo_inss VARCHAR(120) NOT NULL,
        especialidades VARCHAR(250) NOT NULL,
        foto VARCHAR(250) NOT NULL,
        fecha_ingreso DATE,
        estado INTEGER NOT NULL
    );

CREATE TABLE
    antecedentes_legal (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        id_trabajador INTEGER REFERENCES trabajador(id),
        record VARCHAR(250) NOT NULL,
        descripcion VARCHAR(250) NOT NULL,
        estado INTEGER NOT NULL
    );

CREATE TABLE
    contrato(
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        id_trabajador INTEGER REFERENCES trabajador(id),
        id_autorizacion INTEGER REFERENCES trabajador(id),
        tipo_contrato VARCHAR(250) NOT NULL,
        contrato_actual VARCHAR(250) NOT NULL,
        controto_anterior VARCHAR(250) NOT NULL,
        fecha_contrato DATE
    );

CREATE TABLE
    cargos (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        codigo VARCHAR(80) NOT NULL,
        nombre_cargo VARCHAR(80) NOT NULL,
        descripcion VARCHAR(250),
        estado INTEGER
    );

CREATE TABLE
    asignacion_cargos(
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        id_cargo INTEGER REFERENCES cargos(id),
        id_trabajador INTEGER REFERENCES trabajador(id),
        id_autorizacion INTEGER REFERENCES trabajador(id),
        fecha_registro DATE NOT NULL,
        estado INTEGER
    );

CREATE TABLE
    salario (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        id_trabajador INTEGER REFERENCES trabajador(id),
        id_autorizacion INTEGER REFERENCES trabajador(id),
        salario_actual DECIMAL(10, 2) NOT NULL,
        salario_anterior DECIMAL(10, 2),
        fecha_cambio DATE,
        estado INTEGER NOT NULL
    );

CREATE TABLE
    categoria_servicio_cita (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        nombre VARCHAR(120) NOT NULL,
        descripcion VARCHAR(250),
        estado INTEGER NOT NULL
    );

CREATE TABLE
    servicios_citas (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        id_categoria INTEGER REFERENCES categoria_servicio_cita(id),
        nombre VARCHAR(120) NOT NULL,
        descripcion VARCHAR(250),
        banner VARCHAR(250),
        estado INTEGER NOT NULL
    );

CREATE TABLE
    precio_servicio (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        id_servicio INTEGER REFERENCES servicios(id),
        id_autorizado INTEGER REFERENCES trabajador(id),
        precio_actual DECIMAL(10, 2) NOT NULL,
        precio_anterior DECIMAL(10, 2) NOT NULL,
        fecha_registro DATE NOT NULL,
        estado INTEGER NOT NULL
    );

CREATE TABLE cita (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_servicios INTEGER REFERENCES servicios_citas(id),
    id_cliente INTEGER REFERENCES cliente(id),
    id_doctor INTEGER REFERENCES trabajador(id),
    motivo VARCHAR(250) NOT NULL,
    fecha DATE  NOT NULL,
    estado INTEGER NOT NULL
);

CREATE TABLE
    categoria (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        nombre VARCHAR (120) NOT NULL,
        descripcion VARCHAR(250),
        estado INTEGER NOT NULL
    );

CREATE TABLE
    unidad_medida (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        nombre VARCHAR(120) NOT NULL,
        siglas VARCHAR(120) NOT NULL,
        equivalencia DECIMAL (10, 2)
    );

CREATE TABLE
    presentacion (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        nombre VARCHAR(120) NOT NULL,
        descripcion VARCHAR(250),
        estado INTEGER
    );

CREATE TABLE
    producto (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        id_categoria INTEGER REFERENCES categoria(id),
        id_unidad INTEGER REFERENCES unidad_medida(id),
        id_presentacion INTEGER REFERENCES presentacion(id),
        id_proveedor INTEGER REFERENCES proveedor(id),
        nombre VARCHAR(120) NOT NULL,
        descripcion VARCHAR(250),
        banner VARCHAR(250),
        fecha_registro DATE,
        estado INTEGER NOT NULL
    );

CREATE TABLE
    precio_producto (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        id_producto INTEGER REFERENCES producto(id),
        precio_actual_compra DECIMAL(10, 2) NOT NULL,
        precio_anterior_compra DECIMAL(10, 2),
        precio_venta_actual DECIMAL(10, 2) NOT NULL,
        precio_venta_anterior DECIMAL(10, 2),
        fecha_registro DATE NOT NULL,
        estado INTEGER NOT NULL
    );

CREATE TABLE
    venta(
        id INTEGER PRIMARY KEY,
        id_cliente INTEGER REFERENCES cliente(id),
        id_trabajador INTEGER REFERENCES trabajador(id),
        subtotal DECIMAL(10, 2),
        descuento DECIMAL(10, 2),
        impuesto DECIMAL(10, 2),
        total DECIMAL(10, 2) NOT NULL,
        fecha_venta DATE DEFAULT NOW(),
        tipo_venta VARCHAR(20),
        estado INTEGER
    );

CREATE TABLE
    detalle_venta(
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        id_venta INTEGER REFERENCES venta(id),
        id_cita INTEGER REFERENCES cita(id),
        cantidad INTEGER NOT NULL,
        precio DECIMAL(10, 2) NOT NULL,
        monto DECIMAL(10, 2)
    );

CREATE TABLE
    detalle_venta_producto(
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        id_venta INTEGER REFERENCES venta(id),
        id_producto INTEGER REFERENCES producto(id),
        cantidad INTEGER NOT NULL
    );

CREATE TABLE
    tipo_caja(
        id INTEGER PRIMARY KEY,
        nombre VARCHAR(80) NOT NULL,
        descripcion VARCHAR(250),
        estado INTEGER
    );

CREATE TABLE
    caja(
        id INTEGER PRIMARY KEY,
        tipo INTEGER REFERENCES tipo_caja(id),
        id_ubicacion INTEGER REFERENCES sub_ubicacion_habitacion(id),
        creada_por INTEGER REFERENCES trabajador(id),
        nombre VARCHAR(100) NOT NULL,
        fecha_registro TIMESTAMP DEFAULT NOW(),
        estado INTEGER
    );

CREATE TABLE
    apertura_caja(
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        id_caja INTEGER REFERENCES caja(id),
        id_trabajador INTEGER REFERENCES trabajador(id),
        id_autorizado_por INTEGER REFERENCES trabajador(id),
        fecha_apertura DATE,
        estado INTEGER
    );

CREATE TABLE
    detalle_apertura_caja(
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        id_apertura_caja INTEGER REFERENCES apertura_caja(id),
        monto_cordobas NUMERIC(10, 2),
        monto_dolares NUMERIC(10, 2)
    );



CREATE TABLE
    pago(
        id INTEGER PRIMARY KEY,
        id_caja INTEGER REFERENCES caja(id),
        id_venta INTEGER REFERENCES venta(id),
        id_hecho INTEGER REFERENCES trabajador(id),
        codigo VARCHAR(80) NOT NULL,
        monto_total DECIMAL(10,2),
        pago DECIMAL(10,2),
        cambio DECIMAL(10,2),
        fecha DATE
    );
CREATE TABLE
    egreso(
        id INTEGER PRIMARY KEY,
        id_caja INTEGER REFERENCES caja(id),
        id_hecho INTEGER REFERENCES trabajador(id),
        codigo VARCHAR(80) NOT NULL,
        concepto VARCHAR(250)NOT NULL,
        monto_total DECIMAL(10,2),
        fecha DATE
    );
CREATE TABLE
    tesoreria(
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        id_caja INTEGER REFERENCES caja(id),
        autorizado INTEGER REFERENCES trabajador(id),
        numero_mov VARCHAR(250) NOT NULL,
        fecha_movimiento DATE DEFAULT NOW(),
        concepto VARCHAR(100) NOT NULL,
        entrada NUMERIC(10, 2),
        salida NUMERIC(10,2),
        estado INTEGER 
    );

CREATE TABLE
    arqueo_caja(
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        id_caja INTEGER REFERENCES apertura(id),
        id_trabajador INTEGER REFERENCES trabajador(id),
        fecha_arqueo DATE,
        monto_inicial NUMERIC(10, 2),
        monto_final NUMERIC(10, 2),
        estado INTEGER
    );

CREATE TABLE detalle_arqueo (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        id_apertura INTEGER REFERENCES apertura_caja(id),
        cantidad_billete INTEGER NOT NULL,
        monton_billete DECIMAL(10,2) NOT NULL
    );

CREATE TABLE
    cierre_caja(
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        id_caja INTEGER REFERENCES caja(id),
        monto_cordoba NUMERIC(10, 2),
        monto_dolar NUMERIC(10, 2),
        fecha_cierre DATE,
        estado INTEGER
    );

CREATE TABLE
    detalle_cierre_caja(
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        id_cierre_caja INTEGER REFERENCES cierre_caja(id),
        id_trabajador INTEGER REFERENCES trabajador(id),
        id_autorizado INTEGER REFERENCES trabajador(id),
        motivo VARCHAR(250)
    );

CREATE TABLE
    grupo_usuario (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        nombre VARCHAR(80) NOT NULL,
        descripcion VARCHAR(100),
        estado INTEGER
    );

CREATE TABLE
    sub_grupo_usuario (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        id_grupo INTEGER REFERENCES grupo_usuario(id),
        nombre VARCHAR(150) NOT NULL,
        descripcion VARCHAR(150),
        estado INTEGER
    );

CREATE TABLE
    usuario (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        id_persona INTEGER REFERENCES persona(id),
        id_grupo INTEGER REFERENCES sub_grupo_usuario(id),
        usuario VARCHAR(40) NOT NULL,
        fecha_registro TIMESTAMP NOT NULL,
        estado INTEGER
    );

CREATE TABLE
    detalle_usuario (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        id_usuario INTEGER REFERENCES usuario(id),
        contraseña_anterior VARCHAR(60) NOT NULL,
        contraseña_actual VARCHAR(60) NOT NULL,
        fecha DATE DEFAULT NOW()
    );

