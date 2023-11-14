-- Author: Oscar Pascual Ferrero
-- Created: 31 oct 2023

-- Crear la base de datos
CREATE DATABASE DB212DWESProyectoTema4;

-- Nos conectamos en la BBDD
USE DB212DWESProyectoTema4;

-- Crear tabla de datos
CREATE TABLE T02_Departamento (
    T02_CodDepartamento CHAR(3) PRIMARY KEY,
    T02_DescDepartamento VARCHAR(255),
    T02_FechaCreacionDepartamento DATETIME,
    T02_VolumenDeNegocio FLOAT,
    T02_FechaBajaDepartamento DATETIME  -- Cambiado a DATETIME
    
);

-- Crear un usuario y definir una contraseña
CREATE USER 'user212DWESProyectoTema4'@'%' IDENTIFIED BY 'paso';

-- Otorgar permisos al usuario para la base de datos
GRANT ALL PRIVILEGES ON DB212DWESProyectoTema4.* TO 'user212DWESProyectoTema4'@'%';

-- Recargar los privilegios
FLUSH PRIVILEGES;

