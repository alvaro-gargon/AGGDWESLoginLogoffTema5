/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/SQLTemplate.sql to edit this template
 */
/**
 * Author:  alvaro.gargon.4
 * Created: 20 nov 2025
 */

-- Creacion de la base de datos
create database if not exists DBAGGDWESProyectoLoginLogoffTema5;
-- me situo en ella
use DBAGGDWESProyectoLoginLogoffTema5;


--creamos la tabla sino existe, y nunca deberia existir
create table if not exists T02_Departamento(
T02_CodDepartamento varchar(3),
T02_DescDepartamento varchar(255),
T02_VolumenDeNegocio float,
T02_FechaCreacionDepartamento datetime,
T02_FechaBajaDepartamento datetime,
primary key(T02_CodDepartamento)
)engine=innodb;

--creo el usuario con todos los privilegios sobre la base de datos
create user if not exists'userAGGDWESProyectoLoginLogoffTema5'@'%' identified by 'paso';
grant all on DBAGGDWESProyectoLoginLogoffTema5.* to 'userAGGDWESProyectoLoginLogoffTema5'@'%' with grant option;
--refrescamos los privilegios para asegurarnos que se ha actualizado
flush privileges;