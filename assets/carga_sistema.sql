/*CARGA INCIAL DEL SISTEMA CLINICA MEDICA*/
INSERT INTO tipo_enfermedades (nombre, descripcion) VALUES
    ('Resfriado', 'Enfermedad viral común que afecta el sistema respiratorio.'),
    ('Gripe', 'Infección viral aguda que causa fiebre, dolor de garganta y malestar general.'),
    ('Dolor de cabeza', 'Sensación de dolor o malestar en la cabeza.'),
    ('Alergias', 'Respuesta exagerada del sistema inmunológico a una sustancia que normalmente es inofensiva.'),
    ('Hipertensión', 'Presión arterial alta que puede aumentar el riesgo de enfermedades cardíacas.');



INSERT INTO enfermedades (id_tipo, nombre, descripcion) VALUES
    (1, 'Resfriado común', 'Infección viral del tracto respiratorio superior que causa congestión nasal, estornudos y dolor de garganta.'),
    (1, 'Sinusitis', 'Inflamación de los senos paranasales que puede causar dolor de cabeza y congestión nasal.'),
    (1, 'Bronquitis', 'Inflamación de los bronquios que provoca tos y dificultad para respirar.'),
    (2, 'Gripe estacional', 'Infección viral que causa fiebre alta, dolores musculares y debilidad generalizada.'),
    (2, 'Gripe H1N1', 'Causada por el virus de la influenza A (H1N1) que puede provocar síntomas similares a la gripe estacional.'),
    (2, 'Gripe aviar', 'Enfermedad causada por el virus de la influenza aviar que afecta a las aves y ocasionalmente puede transmitirse a los humanos.'),
    (3, 'Migraña', 'Tipo de dolor de cabeza intenso y pulsátil que puede estar acompañado de náuseas y sensibilidad a la luz y al sonido.'),
    (3, 'Cefalea tensional', 'Dolor de cabeza causado por la tensión muscular en el cuello y el cuero cabelludo.'),
    (3, 'Cefalea en racimos', 'Dolor de cabeza extremadamente intenso y recurrente que se presenta en ciclos o racimos.'),
    (4, 'Rinitis alérgica', 'Inflamación de la mucosa nasal debido a una reacción alérgica a sustancias como el polen o los ácaros del polvo.'),
    (4, 'Asma', 'Enfermedad crónica que afecta las vías respiratorias y provoca dificultad para respirar y sibilancias.'),
    (4, 'Dermatitis alérgica', 'Inflamación de la piel causada por una reacción alérgica a sustancias como el látex o ciertos alimentos.'),
    (5, 'Hipertensión arterial', 'Presión arterial elevada que puede dañar los vasos sanguíneos y aumentar el riesgo de enfermedades cardíacas.'),
    (5, 'Hipertensión pulmonar', 'Presión arterial alta en los vasos sanguíneos que conectan los pulmones al corazón.'),
    (5, 'Hipertensión gestacional', 'Presión arterial alta que se desarrolla durante el embarazo y puede afectar tanto a la madre como al feto.');

INSERT INTO tipos_sangre (nombre, descripcion) VALUES ('O+', 'Tipo O positivo'),
('A+', 'Tipo A positivo'),
('B+', 'Tipo B positivo'),
('AB+', 'Tipo AB positivo'),
('O-', 'Tipo O negativo');


INSERT INTO tipo_alergias (nombre, descripcion) VALUES ('Alérgica', 'Tipo de alergia común'),
 ('Respiratoria', 'Alergia relacionada con problemas respiratorios'),
 ('Alimentaria', 'Alergia a alimentos específicos'),
 ('Dermatológica', 'Alergia que afecta la piel'),
 ('Medicamentosa', 'Alergia a medicamentos');


INSERT INTO alergias (id_tipo, nombre, descripcion) VALUES (1, 'Rinitis alérgica', 'Alergia que afecta la mucosa nasal'),
 (1, 'Conjuntivitis alérgica', 'Alergia que afecta los ojos'),
 (1, 'Urticaria', 'Alergia que causa ronchas y picazón en la piel'),
 (2, 'Asma', 'Alergia que afecta las vías respiratorias'),
 (2, 'Sinusitis alérgica', 'Alergia que afecta los senos paranasales'),
 (2, 'Bronquitis alérgica', 'Alergia que inflama los bronquios'),
 (3, 'Intolerancia al gluten', 'Alergia a la proteína del trigo'),
 (3, 'Alergia al marisco', 'Alergia a los mariscos'),(3, 'Alergia a la leche', 'Alergia a la lactosa'),
 (4, 'Dermatitis atópica', 'Alergia que causa inflamación y enrojecimiento de la piel'),
 (4, 'Eczema alérgico', 'Alergia que causa sequedad y picazón en la piel'),
 (4, 'Urticaria por contacto', 'Alergia que causa ronchas en la piel por contacto con sustancias alergénicas'),
 (5, 'Reacción alérgica a la penicilina', 'Alergia a los antibióticos de la familia de la penicilina'),
 (5, 'Alergia a los antiinflamatorios no esteroides', 'Alergia a medicamentos antiinflamatorios'),
 (5, 'Alergia a los anestésicos', 'Alergia a los medicamentos anestésicos');



INSERT INTO especialidades (nombre, descripcion) VALUES ('Medicina General', 'Especialidad en atención médica general'),
 ('Pediatría', 'Especialidad en atención médica infantil'),
 ('Cardiología', 'Especialidad en enfermedades del corazón'),
 ('Dermatología', 'Especialidad en enfermedades de la piel'),
 ('Ginecología', 'Especialidad en salud reproductiva de la mujer'),
 ('Oftalmología', 'Especialidad en enfermedades oculares'),
 ('Otorrinolaringología', 'Especialidad en enfermedades del oído, nariz y garganta'),
 ('Neurología', 'Especialidad en enfermedades del sistema nervioso'),
 ('Psiquiatría', 'Especialidad en salud mental'),
 ('Ortopedia', 'Especialidad en trastornos del sistema musculoesquelético'),
 ('Radiología', 'Especialidad en diagnóstico por imágenes'), 
 ('Anestesiología', 'Especialidad en administración de anestesia'),
 ('Urología', 'Especialidad en enfermedades del sistema urinario'), 
 ('Endocrinología', 'Especialidad en enfermedades hormonales'),
 ('Nutrición', 'Especialidad en nutrición y dietética'),
 ('Fisioterapia', 'Especialidad en terapia física y rehabilitación'),
 ('Enfermería', 'Especialidad en cuidado y atención de pacientes'),
 ('Farmacia', 'Especialidad en dispensación y manejo de medicamentos'),
 ('Administración Hospitalaria', 'Especialidad en gestión y administración de hospitales'),
 ('Gestión de Recursos Humanos', 'Especialidad en administración de personal'),
 ('Contabilidad', 'Especialidad en contabilidad y finanzas hospitalarias');
