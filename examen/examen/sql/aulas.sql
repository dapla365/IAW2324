CREATE TABLE aulas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    aula INT NOT NULL,
    planta INT NOT NULL,
    descripcion TEXT
);
ALTER TABLE aulas ADD CONSTRAINT PLANTA FOREIGN KEY (planta) REFERENCES plantas(id) ON DELETE RESTRICT ON UPDATE RESTRICT;

INSERT INTO aulas(aula, planta, descripcion) VALUES (1, 1, 'Aula de 1 ASIR');
INSERT INTO aulas(aula, planta, descripcion) VALUES (2, 1, 'Aula de 1 ESO A');
INSERT INTO aulas(aula, planta, descripcion) VALUES (3, 1, 'Aula de 2 ESO A');

INSERT INTO aulas(aula, planta, descripcion) VALUES (101, 2, 'Aula de 3 ESO A');
INSERT INTO aulas(aula, planta, descripcion) VALUES (102, 2, 'Aula de 4 ESO A');
INSERT INTO aulas(aula, planta, descripcion) VALUES (103, 2, 'Aula de 1 Bachillerato A');

INSERT INTO aulas(aula, planta, descripcion) VALUES (201, 3, 'Aula de 1 Bachillerato B');
INSERT INTO aulas(aula, planta, descripcion) VALUES (202, 3, 'Aula de 2 Bachillerato A');
INSERT INTO aulas(aula, planta, descripcion) VALUES (203, 3, 'Aula de 2 Bachillerato B');
INSERT INTO aulas(aula, planta, descripcion) VALUES (204, 3, 'Aula de 2 ASIR');