/*/-- Insertar datos en la tabla 'categoria_servicio_cita'*/
INSERT INTO categoria_servicio_cita (nombre, descripcion, estado) VALUES
    ('Cita generales', 'Descripción de la categoría 1', 1),
    ('Cita generales cronicos', 'Descripción de la categoría 2', 1),
    ('Cita generales especiales', 'Descripción de la categoría 3', 1),
    ('Cita generales xd', 'Descripción de la categoría 4', 1),
    ('Cita generales  Examenes', 'Descripción de la categoría 5', 1);

/*/-- Insertar datos en la tabla 'servicios_citas'*/
INSERT INTO servicios_citas (id_categoria, nombre, descripcion, banner, estado) VALUES
    (1, 'Cita general', 'Descripción del servicio 1', 'banner1.jpg', 1),
    (2, 'Cita cronico', 'Descripción del servicio 2', 'banner2.jpg', 1),
    (3, 'Cita especialista', 'Descripción del servicio 3', 'banner3.jpg', 1),
    (4, 'Cita cirujia', 'Descripción del servicio 4', 'banner4.jpg', 1),
    (5, 'Cita examen', 'Descripción del servicio 5', 'banner5.jpg', 1);

/*/-- Insertar datos en la tabla 'precio_servicio'*/
INSERT INTO precio_servicio (id_servicio, id_autorizado, precio_actual, precio_anterior, fecha_registro, estado) VALUES
    (1, 1, 100.00, 90.00, '2023-06-01', 1),
    (2, 2, 150.00, 140.00, '2023-06-02', 1),
    (3, 3, 200.00, 190.00, '2023-06-03', 1),
    (4, 4, 250.00, 240.00, '2023-06-04', 1),
    (5, 5, 300.00, 290.00, '2023-06-05', 1);

/*Insertar datos en la tabla 'cita'*/
INSERT INTO cita (id_servicios, id_cliente, motivo, fecha, hora, estado) VALUES
    (1, 1, 'Motivo de la cita 1', '2023-06-01', '10:00:00', 1),
    (2, 2, 'Motivo de la cita 2', '2023-06-02', '11:00:00', 1),
    (3, 3, 'Motivo de la cita 3', '2023-06-03', '12:00:00', 1),
    (4, 4, 'Motivo de la cita 4', '2023-06-04', '13:00:00', 1),
    (5, 5, 'Motivo de la cita 5', '2023-06-05', '14:00:00', 1),
    (1, 6, 'Motivo de la cita 6', '2023-06-06', '15:00:00', 1),
    (2, 7, 'Motivo de la cita 7', '2023-06-07', '16:00:00', 1),
    (3, 8, 'Motivo de la cita 8', '2023-06-08', '17:00:00', 1),
    (4, 9, 'Motivo de la cita 9', '2023-06-09', '18:00:00', 1),
    (5, 10, 'Motivo de la cita 10', '2023-06-10', '19:00:00', 1),
    (1, 11, 'Motivo de la cita 11', '2023-06-11', '10:00:00', 1),
    (2, 12, 'Motivo de la cita 12', '2023-06-12', '11:00:00', 1),
    (3, 13, 'Motivo de la cita 13', '2023-06-13', '12:00:00', 1),
    (4, 14, 'Motivo de la cita 14', '2023-06-14', '13:00:00', 1),
    (5, 15, 'Motivo de la cita 15', '2023-06-15', '14:00:00', 1),
    (1, 16, 'Motivo de la cita 16', '2023-06-16', '15:00:00', 1),
    (2, 17, 'Motivo de la cita 17', '2023-06-17', '16:00:00', 1),
    (3, 18, 'Motivo de la cita 18', '2023-06-18', '17:00:00', 1),
    (4, 19, 'Motivo de la cita 19', '2023-06-19', '18:00:00', 1);
