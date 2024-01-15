CREATE TABLE incidencias (
    id INT PRIMARY KEY AUTO_INCREMENT,
    planta INT NOT NULL,
    aula INT NOT NULL,
    descripcion TEXT,
    fecha_alta DATE NOT NULL,
    fecha_revision DATE,
    fecha_solucion DATE,
    comentario TEXT
);