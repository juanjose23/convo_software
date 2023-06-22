/*Migracion de datos de pancientes*/
INSERT INTO persona (nombre, telefono, direccion_domicilio, correo, nacionalidad, fecha_registro)
VALUES
    ('Juan', 123456789, 'Calle Principal 123', 'juan@example.com', 'Ecuador', '2023-01-01'),
    ('María', 987654321, 'Avenida Central 456', 'maria@example.com', 'Perú', '2023-02-01'),
    ('Pedro', 555555555, 'Calle Secundaria 789', 'pedro@example.com', 'México', '2023-03-01'),
    ('Ana ', 111111111, 'Avenida Principal 456', 'ana@example.com', 'Colombia', '2023-04-01'),
    ('Carlos', 999999999, 'Calle Central 789', 'carlos@example.com', 'Argentina', '2023-05-01');

INSERT INTO persona_natural (id_persona, apellido, fecha_nacimiento, cedula, genero)
VALUES
    (1, 'Pérez', '1990-05-10', '1234567890', 'M'),
    (2, 'López', '1985-08-15', '0987654321', 'F'),
    (3, 'Gómez', '1993-11-20', '5555555555', 'M'),
    (4, 'Rodríguez', '1982-04-25', '1111111111', 'F'),
    (5, 'Sánchez', '1998-09-30', '9999999999', 'M');




INSERT INTO enfermedades_personas (id_persona, id_enfermedades, estado)
VALUES
    (1, 1, 1),
    (2, 2, 1),
    (3, 3, 1),
    (4, 4, 1),
    (5, 5, 1);

-- INSERT para tabla sangre_personas
INSERT INTO sangre_personas (id_persona, id_tipos_sangre, estado)
VALUES
    (1, 1, 1),
    (2, 2, 1),
    (3, 3, 1),
    (4, 4, 1),
    (5, 5, 1);

INSERT INTO alergias_personas (id_persona, id_alergias, estado)
VALUES
    (1, 1, 1),
    (2, 2, 1),
    (3, 3, 1),
    (4, 4, 1),
    (5, 5, 1);


INSERT INTO cliente (id_persona, id_sucursal, codigo_inss, tipo, foto, estado)
VALUES
    (1, 1, '0123456789', 'Cliente', 'cliente_1.jpg', 1),
    (2, 2, '9876543210', 'Cliente', 'cliente_2.jpg', 1),
    (3, 3, '5555555555', 'Cliente', 'cliente_3.jpg', 1),
    (4, 4, '1111111111', 'Cliente', 'cliente_4.jpg', 1),
    (5, 5, '9999999999', 'Cliente', 'cliente_5.jpg', 1);
