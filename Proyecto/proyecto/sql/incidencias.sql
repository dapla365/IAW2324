CREATE TABLE incidencias (
    id INT PRIMARY KEY AUTO_INCREMENT,
    planta VARCHAR(20) NOT NULL,
    aula INT NOT NULL,
    descripcion TEXT,
    fecha_alta DATE NOT NULL,
    fecha_revision DATE,
    fecha_solucion DATE,
    comentario TEXT,
    usuario VARCHAR(20) NOT NULL
);

ALTER TABLE incidencias ADD CONSTRAINT USUARIO FOREIGN KEY (usuario) REFERENCES usuarios(id) ON DELETE RESTRICT ON UPDATE RESTRICT;
/*
ALTER TABLE incidencias ADD CONSTRAINT PLANTA FOREIGN KEY (planta) REFERENCES plantas(id) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE incidencias ADD CONSTRAINT AULA FOREIGN KEY (aula) REFERENCES aulas(id) ON DELETE RESTRICT ON UPDATE RESTRICT;
*/

INSERT INTO incidencias(planta, aula, descripcion, fecha_alta, usuario) VALUES ('Baja', 1, 'No va el proyector', '2024-01-25', 'david');
INSERT INTO incidencias(planta, aula, descripcion, fecha_alta, fecha_revision, fecha_solucion, comentario, usuario) VALUES ('Baja', 2, 'No va el proyector', '2024-01-25', '2024-01-26', '2024-01-26', 'Arreglado', 'david');