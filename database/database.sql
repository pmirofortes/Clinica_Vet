-- SQLBook: Code
CREATE DATABASE bd_veterinaria;
USE bd_veterinaria;

create table animal (
    id_animal int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nombre_animal varchar(15) NOT NULL,
    edad_animal date NULL,
    color_animal varchar(30) NOT NULL,
    tamano_animal decimal(6, 2) NULL,
    peso_animal decimal(6, 2) NULL,
    dni_dueno char(9) NOT NULL,
    id_especie int NOT NULL,
    id_raza int NOT NULL,
    dni_veterinario char(9) NOT NULL
);

create table dueno (
    dni_dueno char(9) PRIMARY KEY NOT NULL,
    nombre_dueno varchar(25) NOT NULL,
    apellidos_dueno varchar(50) NOT NULL,
    edad_dueno DATE NULL,
    localidad_dueno varchar(85) NULL,
    telefono_dueno char (9) NULL,
    correo_dueno varchar (35) NULL
);

create table especie (
    id_especie int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nombre_especie varchar(25) NOT NULL,
    nombre_cientifico_especie varchar(40) NOT NULL,
    clasif_especie enum('mamifero','pez','invertebrado','ave','reptil','amfibio') NOT NULL
);

create table raza (
    id_raza int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nombre_raza varchar(25) NOT NULL,
    id_noDefinida int
);

create table historial_medico (
    id_historial int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    sexo_animal_historial enum("macho","hembra","hermafrodita") NOT NULL,
    fecha_nac_historial DATE NOT NULL,
    microchip_historial char(30) NULL,
    vacunas_historial varchar(100) NULL,
    tratamiento varchar(200) NULL,
    id_animal int  
);

create table sinDefinir (
    id_noDefinido int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nombre_noDefinido varchar(45) NOT NULL
);

create table veterinario (
    dni_veterinario char(9) PRIMARY KEY NOT NULL,
    nombre_veterinario varchar(40) NOT NULL,
    apellidos_veterinario varchar(50) NOT NULL,
    edad_veterinario int(2) NULL,
    localidad_veterinario varchar(85) NULL,
    telefono_veterinario char (9) NULL,
    correo_veterinario varchar (35) NULL
);

alter table animal
ADD CONSTRAINT idAnimal_dniDueno
FOREIGN KEY (dni_dueno) REFERENCES dueno(dni_dueno);

alter table animal
ADD CONSTRAINT idAnimal_idEspecie
FOREIGN KEY (id_especie) REFERENCES especie(id_especie);

alter table animal
ADD CONSTRAINT idAnimal_idRaza
FOREIGN KEY (id_raza) REFERENCES raza(id_raza);

alter table historial_medico
ADD CONSTRAINT idHistorial_idAnimal
FOREIGN KEY (id_animal) REFERENCES animal(id_animal);

alter table raza
ADD CONSTRAINT idRaza_idNoDefinido
FOREIGN KEY (id_noDefinida) REFERENCES sinDefinir(id_noDefinida);

alter table animal
ADD CONSTRAINT idAnimal_dniVeterinario
FOREIGN KEY (dni_veterinario) REFERENCES veterinario(dni_veterinario);