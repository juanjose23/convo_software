INSERT INTO persona (id, nombre, telefono, direccion_domicilio, correo, nacionalidad, fecha_registro)
VALUES 
    (1, 'Juan', 12345678, 'Calle 1, Ciudad 1', 'juanperez@mail.com', 'Dominicana', '2022-01-01'),
    (2, 'María', 87654321, 'Calle 2, Ciudad 2', 'marialopez@mail.com', 'Puertorriqueña', '2022-01-02'),
    (3, 'Pedro', 23456789, 'Calle 3, Ciudad 3', 'pedrogarcia@mail.com', 'Mexicana', '2022-01-03'),
    (4, 'Ana', 98765432, 'Calle 4, Ciudad 4', 'anamartinez@mail.com', 'Costarricense', '2022-01-04'),
    (5, 'Jorge', 34567890, 'Calle 5, Ciudad 5', 'jorgesanchez@mail.com', 'Chilena', '2022-01-05'),
    (6, 'Laura', 65432198, 'Calle 6, Ciudad 6', 'laurarodriguez@mail.com', 'Argentina', '2022-01-06'),
    (7, 'Carlos', 98761234, 'Calle 7, Ciudad 7', 'carloshernandez@mail.com', 'Colombiana', '2022-01-07'),
    (8, 'Luisa', 87651234, 'Calle 8, Ciudad 8', 'luisagomez@mail.com', 'Ecuatoriana', '2022-01-08'),
    (9, 'Andrés', 12348765, 'Calle 9, Ciudad 9', 'andresperez@mail.com', 'Salvadoreña', '2022-01-09'),
    (10, 'Carmen', 87651234, 'Calle 10, Ciudad 10', 'carmenlopez@mail.com', 'Guatemalteca', '2022-01-10'),
    (11, 'Javier', 23459876, 'Calle 11, Ciudad 11', 'javiergarcia@mail.com', 'Venezolana', '2022-01-11'),
    (12, 'Marta', 98762345, 'Calle 12, Ciudad 12', 'martamartinez@mail.com', 'Uruguaya', '2022-01-12'),
    (13, 'Federico', 34561234, 'Calle 13, Ciudad 13', 'federicosanchez@mail.com', 'Panameña', '2022-01-13'),
    (14, 'Sofía', 65431234, 'Calle 14, Ciudad 14', 'sofiarodriguez@mail.com', 'Paraguaya', '2022-01-14'),
    (15, 'Raúl', 98765431, 'Calle 15, Ciudad 15', 'raulhernandez@mail.com', 'Boliviana', '2022-01-15'),
    (16, 'Sara', 87654321, 'Calle 16, Ciudad 16', 'saragomez@mail.com', 'Brasileña', '2022-01-16'),
    (17, 'David', 12345678, 'Calle 17, Ciudad 17', 'davidperez@mail.com', 'PR', '2022-01-17'),
    (18, 'Lucía', 87654321, 'Calle 18, Ciudad 18', 'lucialopez@mail.com', 'MX', '2022-01-18'),
    (19, 'Pablo', 23456789, 'Calle 19, Ciudad 19', 'pablogarcia@mail.com','NIC', '2022-01-22');

INSERT INTO persona_natural (id, id_persona, apellido, fecha_nacimiento, cedula, genero)
VALUES 
    (1, 1, 'Pérez', '1985-05-12', '001-0000000-1', 'M'),
    (2, 2, 'Rodríguez', '1992-03-17', '001-0000001-2', 'F'),
    (3, 3, 'García', '1988-09-24', '001-0000002-3', 'M'),
    (4, 4, 'González', '1982-11-01', '001-0000003-4', 'F'),
    (5, 5, 'Martínez', '1995-02-28', '001-0000004-5', 'M'),
    (6, 6, 'Hernández', '1990-07-15', '001-0000005-6', 'F'),
    (7, 7, 'López', '1999-04-09', '001-0000006-7', 'M'),
    (8, 8, 'Díaz', '1993-06-21', '001-0000007-8', 'F'),
    (9, 9, 'Flores', '1991-12-05', '001-0000008-9', 'M'),
    (10, 10, 'Sánchez', '1989-08-03', '001-0000009-0', 'F'),
    (11, 11, 'Ramírez', '1997-01-23', '001-0000010-1', 'M'),
    (12, 12, 'Torres', '1984-10-19', '001-0000011-2', 'F'),
    (13, 13, 'Reyes', '1994-03-11', '001-0000012-3', 'M'),
    (14, 14, 'Sosa', '1996-12-27', '001-0000013-4', 'F'),
    (15, 15, 'Castro', '1998-05-07', '001-0000014-5', 'M'),
    (16, 16, 'Fernández', '1990-02-14', '001-0000015-6', 'F'),
    (17, 17, 'Ortiz', '1987-09-08', '001-0000016-7', 'M'),
    (18, 18, 'Chávez', '1991-11-03', '001-0000017-8', 'F'),
    (19, 19, 'Gómez', '1986-07-26', '001-0000018-9', 'M');




INSERT INTO cliente (id_persona, id_sucursal, tipo, foto, estado)
VALUES
    (1, 1, 'Particular', NULL, 1),
    (2, 1, 'Corporativo', NULL, 1),
    (3, 1, 'Particular', NULL, 1),
    (4, 1, 'Particular', NULL, 1),
    (5, 1, 'Corporativo', NULL, 1),
    (6, 1, 'Corporativo', NULL, 1),
    (7, 1, 'Particular', NULL, 1),
    (8, 1, 'Corporativo', NULL, 1),
    (9, 1, 'Corporativo', NULL, 1),
    (10, 1, 'Particular', NULL, 1),
    (11, 1, 'Corporativo', NULL, 1),
    (12, 1, 'Corporativo', NULL, 1),
    (13, 1, 'Particular', NULL, 1),
    (14, 1, 'Corporativo', NULL, 1),
    (15, 1, 'Particular', NULL, 1),
    (16, 1, 'Corporativo', NULL, 1),
    (17, 1, 'Particular', NULL, 1),
    (18, 1, 'Corporativo', NULL, 1),
    (19, 1, 'Corporativo', NULL, 1);



INSERT INTO enfermades (id_persona, tipo_sangre, tipo_enfermedad, descripcion_enfermades, alergias)
VALUES (1, 'A+', 'Diabetes', 'Paciente con diabetes tipo 2 controlada con medicación.', 'Ninguna alergia conocida'),
       (2, 'B-', 'Asma', 'Paciente asmático crónico con necesidad de inhalador.', 'Alergia al polen'),
       (3, 'O+', 'Hipertensión', 'Paciente con presión arterial alta controlada con medicación.', 'Alergia a la penicilina'),
       (4, 'AB+', 'Cáncer', 'Paciente en tratamiento de quimioterapia para cáncer de mama.', 'Ninguna alergia conocida'),
       (5, 'A-', 'Enfermedad renal', 'Paciente en diálisis debido a insuficiencia renal crónica.', 'Alergia a los mariscos'),
       (6, 'O-', 'Hipotiroidismo', 'Paciente con función tiroidea disminuida y tomando levotiroxina.', 'Alergia al polvo'),
       (7, 'B+', 'Artritis', 'Paciente con artritis reumatoide en tratamiento con medicación inmunosupresora.', 'Ninguna alergia conocida'),
       (8, 'AB-', 'Enfermedad pulmonar obstructiva crónica', 'Paciente con EPOC moderada y usando inhaladores.', 'Alergia al polvo y al polen'),
       (9, 'A+', 'Asma', 'Paciente asmático con episodios frecuentes de dificultad para respirar.', 'Alergia a los gatos'),
       (10, 'B-', 'Hipertensión', 'Paciente con presión arterial alta controlada con medicación.', 'Ninguna alergia conocida'),
       (11, 'O+', 'Diabetes', 'Paciente con diabetes tipo 1 que requiere inyecciones de insulina.', 'Ninguna alergia conocida'),
       (12, 'AB+', 'Enfermedad cardiovascular', 'Paciente con enfermedad coronaria en tratamiento con medicación.', 'Alergia a la aspirina'),
       (13, 'A-', 'Enfermedad renal', 'Paciente en lista de espera para trasplante de riñón.', 'Ninguna alergia conocida'),
       (14, 'O-', 'Hipotiroidismo', 'Paciente con hipotiroidismo primario y tomando levotiroxina.', 'Alergia al polen'),
       (15, 'B+', 'Cáncer', 'Paciente en tratamiento de radioterapia para cáncer de pulmón.', 'Alergia a la penicilina'),
       (16, 'AB-', 'Artritis', 'Paciente con artritis reumatoide en tratamiento con medicación inmunosupresora.', 'Alergia al polvo y a los mariscos'),
       (17, 'A+', 'Asma', 'Paciente asmático con episodios frecuentes de dificultad para respirar.', 'Alergia al polen y a los gatos'),
       (18, 'B-', 'Hipertensión', 'Paciente con presión arterial alta controlada con medicación.', 'Ninguna alergia conocida'),
       (19, 'O+', 'Diabetes', 'Paciente con diabetes tipo 2 controlada con medicación.', 'Alergia a la penicilina');




