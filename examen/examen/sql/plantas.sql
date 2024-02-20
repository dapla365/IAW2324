CREATE TABLE plantas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    planta VARCHAR(20) NOT NULL,
    descripcion TEXT
);

INSERT INTO plantas(planta, descripcion) VALUES ('Baja', 'En esta planta se encuentra la entrada con aparcamiento de patines, bicicletas y un patio');
INSERT INTO plantas(planta, descripcion) VALUES ('Primera', 'Contiene las aulas ESO');
INSERT INTO plantas(planta, descripcion) VALUES ('Segunda', 'Contiene las aulas Bachillerato');