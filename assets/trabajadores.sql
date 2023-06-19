/*-- Insertar datos en la tabla 'persona'*/
INSERT INTO persona (nombre, telefono, direccion_domicilio, correo, nacionalidad, fecha_registro)
VALUES
    ('Juan Pérez', 1234567890, 'Calle A, Ciudad X', 'juan@example.com', 'México', '2022-01-01'),
    ('María García', 9876543210, 'Calle B, Ciudad Y', 'maria@example.com', 'España', '2022-02-02'),
    ('Carlos López', 5555555555, 'Calle C, Ciudad Z', 'carlos@example.com', 'Argentina', '2022-03-03'),
    ('Laura Martínez', 1111111111, 'Calle D, Ciudad W', 'laura@example.com', 'Colombia', '2022-04-04'),
    ('Pedro Rodríguez', 9999999999, 'Calle E, Ciudad V', 'pedro@example.com', 'Chile', '2022-05-05');

/*-- Insertar datos en la tabla 'persona_natural'*/
INSERT INTO persona_natural (id_persona, apellido, fecha_nacimiento, cedula, genero)
VALUES
    (1, 'Pérez', '1990-01-01', 123456789012, 'M'),
    (2, 'García', '1995-02-02', 987654321012, 'F'),
    (3, 'López', '1985-03-03', 555555555512, 'M'),
    (4, 'Martínez', '2000-04-04', 111111111112, 'F'),
    (5, 'Rodríguez', '1998-05-05', 999999999912, 'M');

/*-- Insertar datos en la tabla 'enfermedades'*/
INSERT INTO enfermedades (id_persona, tipo_sangre, tipo_enfermedades, descripcion_enfermedades, alergias)
VALUES
    (1, 'O+', 'Enfermedad A', 'Descripción enfermedad A', 'Alergias A'),
    (2, 'AB-', 'Enfermedad B', 'Descripción enfermedad B', 'Alergias B'),
    (3, 'A+', 'Enfermedad C', 'Descripción enfermedad C', 'Alergias C'),
    (4, 'B-', 'Enfermedad D', 'Descripción enfermedad D', 'Alergias D'),
    (5, 'O-', 'Enfermedad E', 'Descripción enfermedad E', 'Alergias E');

/*-- Insertar datos en la tabla 'estado_civil'*/
INSERT INTO estado_civil (nombre, descripcion)
VALUES
    ('Soltero(a)', 'Persona que no está casada.'),
    ('Casado(a)', 'Persona que está legalmente casada.'),
    ('Viudo(a)', 'Persona que ha perdido a su cónyuge.'),
    ('Divorciado(a)', 'Persona que se ha separado legalmente de su cónyuge.'),
    ('Unión libre', 'Persona que vive en pareja sin estar casada legalmente.');

/*-- Insertar datos en la tabla 'trabajador'*/
INSERT INTO trabajador (id_persona, id_estado_civil, id_sucursal, codigo_trabajador, codigo_inss, especialidades, foto, fecha_ingreso, estado)
VALUES
    (1, 1, 1, 'TRAB01', 'INSS001', 'Especialidad A', 'foto1.jpg', '2021-01-01', 1),
    (2, 2, 2, 'TRAB02', 'INSS002', 'Especialidad B', 'foto2.jpg', '2021-02-02', 1),
    (3, 3, 3, 'TRAB03', 'INSS003', 'Especialidad C', 'foto3.jpg', '2021-03-03', 1),
    (4, 4, 4, 'TRAB04', 'INSS004', 'Especialidad D', 'foto4.jpg', '2021-04-04', 1),
    (5, 5, 5, 'TRAB05', 'INSS005', 'Especialidad E', 'foto5.jpg', '2021-05-05', 1);

/*-- Insertar datos en la tabla 'antecedentes_legal'*/
INSERT INTO antecedentes_legal (id_trabajador, record, descripcion, estado)
VALUES
    (1, 'Registro 1', 'Descripción antecedente legal 1', 1),
    (2, 'Registro 2', 'Descripción antecedente legal 2', 1),
    (3, 'Registro 3', 'Descripción antecedente legal 3', 1),
    (4, 'Registro 4', 'Descripción antecedente legal 4', 1),
    (5, 'Registro 5', 'Descripción antecedente legal 5', 1);
