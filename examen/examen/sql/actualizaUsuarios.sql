ALTER TABLE usuarios
ADD rol INT NOT NULL DEFAULT 0,
ADD ultimo_acceso VARCHAR(255),
ADD ip VARCHAR(255);