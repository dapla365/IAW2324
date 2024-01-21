CREATE TABLE incidencias (
    id INT PRIMARY KEY AUTO_INCREMENT,
    planta VARCHAR2(20) NOT NULL,
    aula INT NOT NULL,
    descripcion TEXT,
    fecha_alta DATE NOT NULL,
    fecha_revision DATE,
    fecha_solucion DATE,
    comentario TEXT
);