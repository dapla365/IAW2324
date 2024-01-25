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