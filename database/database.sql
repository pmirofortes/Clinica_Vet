
CREATE DATABASE IF NOT EXISTS bd_veterinaria;
USE bd_veterinaria;

-- Crear tablas

CREATE TABLE dueno (
    dni_dueno CHAR(9) PRIMARY KEY NOT NULL,
    nombre_dueno VARCHAR(25) NOT NULL,
    apellidos_dueno VARCHAR(50) NOT NULL,
    edad_dueno DATE NULL,
    localidad_dueno VARCHAR(85) NULL,
    telefono_dueno CHAR(9) NULL,
    correo_dueno VARCHAR(35) NULL
);

CREATE TABLE especie (
    id_especie INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nombre_especie VARCHAR(25) NOT NULL,
    nombre_cientifico_especie VARCHAR(40) NOT NULL,
    clasif_especie ENUM('mamifero','pez','invertebrado','ave','reptil','amfibio') NOT NULL
);

CREATE TABLE raza (
    id_raza INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nombre_raza VARCHAR(25) NOT NULL,
    id_especie INT NOT NULL
);

CREATE TABLE veterinario (
    dni_veterinario CHAR(9) PRIMARY KEY NOT NULL,
    nombre_veterinario VARCHAR(40) NOT NULL,
    apellidos_veterinario VARCHAR(50) NOT NULL,
    edad_veterinario DATE NULL,
    localidad_veterinario VARCHAR(85) NULL,
    telefono_veterinario CHAR(9) NULL,
    correo_veterinario VARCHAR(35) NULL,
    password_veterinario VARCHAR(10000) NOT NULL
);

CREATE TABLE animal (
    id_animal INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nombre_animal VARCHAR(15) NOT NULL,
    edad_animal DATE NULL,
    color_animal VARCHAR(30) NOT NULL,
    peso_animal DECIMAL(6, 2) NULL,
    dni_dueno CHAR(9) NOT NULL,
    id_especie INT NOT NULL,
    id_raza INT NOT NULL,
    dni_veterinario CHAR(9) NOT NULL
);

-- Relaciones (foreign keys)
ALTER TABLE animal
    ADD CONSTRAINT idAnimal_dniDueno FOREIGN KEY (dni_dueno) REFERENCES dueno(dni_dueno),
    ADD CONSTRAINT idAnimal_idEspecie FOREIGN KEY (id_especie) REFERENCES especie(id_especie),
    ADD CONSTRAINT idAnimal_idRaza FOREIGN KEY (id_raza) REFERENCES raza(id_raza),
    ADD CONSTRAINT idAnimal_dniVeterinario FOREIGN KEY (dni_veterinario) REFERENCES veterinario(dni_veterinario);

ALTER TABLE raza
    ADD CONSTRAINT idRaza_idespecie FOREIGN KEY (id_especie) REFERENCES especie(id_especie);

-- DATOS DE EJEMPLO REALISTAS

-- Especies
INSERT INTO especie (nombre_especie, nombre_cientifico_especie, clasif_especie) VALUES
('Perro', 'Canis lupus familiaris', 'mamifero'),
('Gato', 'Felis catus', 'mamifero'),
('Canario', 'Serinus canaria', 'ave');

-- Razas
INSERT INTO raza (nombre_raza, id_especie) VALUES
('Labrador Retriever', 1),
('Siames', 2),
('Canario común', 3);

-- Veterinarios
INSERT INTO veterinario (dni_veterinario, nombre_veterinario, apellidos_veterinario, edad_veterinario, localidad_veterinario, telefono_veterinario, correo_veterinario, password_veterinario) VALUES
('12345678A', 'Laura', 'Martínez Gómez', '1985-06-12', 'Barcelona', '600123456', 'laura@vet.com', '$2y$10$lqfzJk.PssKRmL1rgUvkwOLkjgHQ1OUD5yW9xtqQ45mHJRvZQ5pAO'),
('87654321B', 'Carlos', 'Pérez López', '1990-03-25', 'Valencia', '699987654', 'carlos@vet.com', '$2y$10$lqfzJk.PssKRmL1rgUvkwOLkjgHQ1OUD5yW9xtqQ45mHJRvZQ5pAO');

-- Dueños
INSERT INTO dueno (dni_dueno, nombre_dueno, apellidos_dueno, edad_dueno, localidad_dueno, telefono_dueno, correo_dueno) VALUES
('11223344C', 'Ana', 'Ramírez Torres', '1980-11-20', 'Madrid', '645112233', 'ana@email.com'),
('22334455D', 'Luis', 'Fernández Ruiz', '1995-08-05', 'Sevilla', '666223344', 'luis@email.com');

-- Animales
INSERT INTO animal (nombre_animal, edad_animal, color_animal, peso_animal, dni_dueno, id_especie, id_raza, dni_veterinario) VALUES
('Toby', '2019-04-15', 'Marrón claro', 28.50, '11223344C', 1, 1, '12345678A'),
('Misu', '2021-06-01', 'Gris con blanco', 4.20, '22334455D', 2, 2, '87654321B'),
('Pío', '2022-02-10', 'Amarillo', 0.05, '11223344C', 3, 3, '12345678A');
