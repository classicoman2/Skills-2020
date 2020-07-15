create database skills;

use skills;

create table personas (num_persona int auto_increment primary key,
                       dni varchar(9),
                       nombre varchar(30) not null,
                       apellido_1 varchar(30) not null,
                       apellido_2 varchar(30),
                       fecha_de_nac date,
                       genero character check (genero = "H" or genero = "F"),
                       vivo boolean default true,
                       descripcion text,
                       UNIQUE (dni));

/*Datos de prueba

insert into personas (dni, nombre, apellido_1, apellido_2, fecha_de_nac, genero, vivo, descripcion) values
    ("12345678K", "Manolo", "Ruíz", "Saenz", "1989-4-12", "H", true, "Hombre mayor de poca estatura y un tatuake en el cuello"),
    ("65789534F", "Francisco", "Torres", "Puigdemont", "1980-1-23", "H", true, "Hombre mayor, le gusta que le llamen Paco"),
    ("12348765G", "María", "Pérez", "Martínez", "1995-10-4", "F", true, "Mujer joven, vive con sus padres ancianos para cuidarlos");
*/