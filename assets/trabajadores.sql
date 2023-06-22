INSERT INTO persona (id, nombre, telefono, direccion_domicilio, correo, nacionalidad, fecha_registro)
VALUES
(6, 'Juan', 123456789, 'Calle Principal 123', 'juan@example.com', 'Argentina', '2022-01-01'),
(7, 'María', 987654321, 'Avenida Central 456', 'maria@example.com', 'México', '2022-02-02'),
(8, 'Carlos', 555555555, 'Plaza Mayor 789', 'carlos@example.com', 'España', '2022-03-03'),
(9, 'Ana', 111111111, 'Rua Principal 456', 'ana@example.com', 'Brasil', '2022-04-04'),
(10, 'Luis', 999999999, 'Main Street 789', 'luis@example.com', 'Estados Unidos', '2022-05-05'),
(11, 'Laura', 777777777, 'Rue Principale 123', 'laura@example.com', 'Francia', '2022-06-06'),
(12, 'Diego', 222222222, 'Hauptstraße 456', 'diego@example.com', 'Alemania', '2022-07-07'),
(13, 'Sofía', 888888888, 'Via Principale 789', 'sofia@example.com', 'Italia', '2022-08-08'),
(14, 'Pedro', 333333333, 'Hauptstraße 123', 'pedro@example.com', 'Alemania', '2022-09-09'),
(15, 'Marta ', 666666666, 'Plaza Principal 456', 'marta@example.com', 'España', '2022-10-10');

INSERT INTO persona_natural (id, id_persona, apellido, fecha_nacimiento, cedula, genero)
VALUES
(6, 6, 'Pérez', '1990-05-10', '1234567890', 'M'),
(7, 7, 'López', '1985-08-15', '9876543210', 'F'),
(8, 8, 'González', '1992-12-20', '5555555555', 'M'),
(9, 9, 'Silva', '1998-03-25', '1111111111', 'F'),
(10, 10, 'Ramirez', '1994-07-30', '9999999999', 'M'),
(11, 11, 'Torres', '1997-10-05', '7777777777', 'F'),
(12, 12, 'Fernández', '1993-04-12', '2222222222', 'M'),
(13, 13, 'Rodríguez', '1999-09-17', '8888888888', 'F'),
(14, 14, 'Gómez', '1995-01-22', '3333333333', 'M'),
(15, 15, 'Vargas', '1996-06-27', '6666666666', 'F');


INSERT INTO enfermedades_personas (id, id_persona, id_enfermedades, fecha_registro, estado)
VALUES
(6, 6, 1, NOW(), 1),
(7, 7, 2, NOW(), 1),
(8, 8, 3, NOW(), 1),
(9, 9, 4, NOW(), 1),
(10, 10, 5, NOW(), 1),
(11, 11, 1, NOW(), 1),
(12, 12, 2, NOW(), 1),
(13, 13, 3, NOW(), 1),
(14, 14, 4, NOW(), 1),
(15, 15, 5, NOW(), 1);

INSERT INTO sangre_personas (id, id_persona, id_tipos_sangre, fecha_registro, estado)
VALUES
(6, 6, 1, NOW(), 1),
(7, 7, 2, NOW(), 1),
(8, 8, 3, NOW(), 1),
(9, 9, 4, NOW(), 1),
(10, 10, 1, NOW(), 1),
(11, 11, 2, NOW(), 1),
(12, 12, 3, NOW(), 1),
(13, 13, 4, NOW(), 1),
(14, 14, 1, NOW(), 1),
(15, 15, 2, NOW(), 1);

INSERT INTO alergias_personas (id, id_persona, id_alergias, fecha_registro, estado)
VALUES
(6, 6, 1, NOW(), 1),
(7, 7, 2, NOW(), 1),
(8, 8, 3, NOW(), 1),
(9, 9, 4, NOW(), 1),
(10, 10, 1, NOW(), 1),
(11, 11, 2, NOW(), 1),
(12, 12, 3, NOW(), 1),
(13, 13, 4, NOW(), 1),
(14, 14, 1, NOW(), 1),
(15, 15, 2, NOW(), 1);

INSERT INTO estado_civil (nombre, descripcion)
VALUES
('Soltero(a)', 'Sin matrimonio'),
('Casado(a)', 'Con matrimonio'),
('Divorciado(a)', 'Matrimonio disuelto'),
('Viudo(a)', 'Cónyuge fallecido'),
('Separado(a)', 'Matrimonio separado'),
( 'Unión libre', 'Convivencia sin matrimonio'),
( 'Comprometido(a)', 'Compromiso de matrimonio'),
( 'Otros', 'Otro estado civil');


INSERT INTO trabajador (id_persona, id_estado_civil, id_sucursal, codigo_trabajador, codigo_inss, foto, fecha_ingreso, estado)
VALUES
(6, 1, 1, 'TRAB-001', 'INSS-001', 'img/foto_trabajador_1.jpg', '2022-01-01', 1),
(7, 2, 1, 'TRAB-002', 'INSS-002', 'img/foto_trabajador_2.jpg', '2022-02-02', 1),
(8, 3, 1, 'TRAB-003', 'INSS-003', 'img/foto_trabajador_3.jpg', '2022-03-03', 1),
(9, 4, 1, 'TRAB-004', 'INSS-004', 'img/foto_trabajador_4.jpg', '2022-04-04', 1),
(10, 1, 1, 'TRAB-005', 'INSS-005', 'img/foto_trabajador_5.jpg', '2022-05-05', 1),
( 11, 2, 1, 'TRAB-006', 'INSS-006', 'img/foto_trabajador_6.jpg', '2022-06-06', 1),
( 12, 3, 1, 'TRAB-007', 'INSS-007', 'img/foto_trabajador_7.jpg', '2022-07-07', 1),
( 13, 4, 1, 'TRAB-008', 'INSS-008', 'img/foto_trabajador_8.jpg', '2022-08-08', 1),
( 14, 1, 1, 'TRAB-009', 'INSS-009', 'img/foto_trabajador_9.jpg', '2022-09-09', 1),
( 15, 2, 1, 'TRAB-010', 'INSS-010', 'img/foto_trabajador_10.jpg', '2022-10-10', 1);

INSERT INTO antecedentes_legal (id_trabajador, record, descripcion, estado)
VALUES
(1, 'Record 1', 'Descripción 1', 1),
(2, 'Record 2', 'Descripción 2', 1),
( 3, 'Record 3', 'Descripción 3', 1),
( 4, 'Record 4', 'Descripción 4', 1),
( 5, 'Record 5', 'Descripción 5', 1),
( 6, 'Record 6', 'Descripción 6', 1),
( 7, 'Record 7', 'Descripción 7', 1),
( 8, 'Record 8', 'Descripción 8', 1),
( 9, 'Record 9', 'Descripción 9', 1),
(10, 'Record 10', 'Descripción 10', 1);
