CREATE DATABASE zona_tigres;
USE zona_tigres;
-- TABLA 1
CREATE TABLE estudiantes(
    idestudiantes INTEGER PRIMARY KEY AUTO_INCREMENT UNIQUE,
    no_de_control VARCHAR(10),
    correo_institucional VARCHAR (60)
);
--TABLA 2
CREATE TABLE usuarios(
    idusuarios INTEGER PRIMARY KEY AUTO_INCREMENT UNIQUE,
    nombre VARCHAR(60),
    apellido_paterno VARCHAR(60),
    apellido_materno VARCHAR(60),
    no_de_control VARCHAR(10),
    nip VARCHAR(4),
    correo_institucional VARCHAR(60),
    tipo_de_usuario VARCHAR(5),
    fk_idestudiantes INTEGER,
    FOREIGN KEY (fk_idestudiantes) REFERENCES estudiantes(idestudiantes)
);
--TABLA 3
CREATE TABLE emprendedor(
    idemprendedor INTEGER PRIMARY KEY AUTO_INCREMENT UNIQUE,
    telefono VARCHAR(10),
    img_crendecial VARCHAR(1024),
    fk_idusuarios INTEGER,
    FOREIGN KEY (fk_idusuarios) REFERENCES usuarios(idusuarios)
);
--TABLA 4
CREATE TABLE categoria_servicios(
    idcategoria_servicios INTEGER PRIMARY KEY AUTO_INCREMENT UNIQUE,
    nombre VARCHAR(45)
);
--TABLA 5
CREATE TABLE servicios(
    idservicios INTEGER PRIMARY KEY AUTO_INCREMENT UNIQUE,
    nombre VARCHAR(50),
    descripcion VARCHAR(100),
    precio DECIMAL(10,2),
    img_servicio VARCHAR(1024),
    estatus VARCHAR(2),
    fk_idemprendedor INTEGER,
    fk_idcategoria_servicios INTEGER,
    FOREIGN KEY (fk_idemprendedor) REFERENCES emprendedor(idemprendedor),
    FOREIGN KEY (fk_idcategoria_servicios) REFERENCES categoria_servicios(idcategoria_servicios)
);
--TABLA 6
CREATE TABLE categoria_productos(
    idcategoria_productos INTEGER PRIMARY KEY AUTO_INCREMENT UNIQUE,
    nombre VARCHAR(45)
);
--TABLA 7
CREATE TABLE productos(
    idproductos INTEGER PRIMARY KEY AUTO_INCREMENT UNIQUE,
    nombre VARCHAR(50),
    descripcion VARCHAR(100),
    precio DECIMAL(10,2),
    img_producto VARCHAR(1024),
    estatus VARCHAR(2),
    fk_idemprendedor INTEGER,
    fk_idcategoria_productos INTEGER,
    FOREIGN KEY (fk_idemprendedor) REFERENCES emprendedor(idemprendedor),
    FOREIGN KEY (fk_idcategoria_productos) REFERENCES categoria_productos(idcategoria_productos)
);
--TABLA 8
CREATE TABLE resenia_servicios(
    idresenia_servicios INTEGER PRIMARY KEY AUTO_INCREMENT UNIQUE,
    comentario VARCHAR(100),
    calificacion INTEGER,
    fk_idservicios INTEGER,
    FOREIGN KEY (fk_idservicios) REFERENCES servicios(idservicios)
);
--TABLA 9
CREATE TABLE resenia_productos(
    idresenia_productos INTEGER PRIMARY KEY AUTO_INCREMENT UNIQUE,
    comentario VARCHAR(100),
    calificacion INTEGER,
    fk_idproductos INTEGER,
    FOREIGN KEY (fk_idproductos) REFERENCES productos(idproductos)  
);
--TABLA 10
CREATE TABLE pedidos(
    idpedidos INTEGER PRIMARY KEY AUTO_INCREMENT UNIQUE,
    cantidad INTEGER,
    total DECIMAL(10,2),
    fk_idusuarios INTEGER,
    fk_idproductos INTEGER,
    FOREIGN KEY (fk_idusuarios) REFERENCES usuarios(idusuarios),
    FOREIGN KEY (fk_idproductos) REFERENCES productos(idproductos)
);

INSERT INTO categoria_productos (nombre) 
VALUES ('ALIMENTOS'),
        ('POSTRES'),
        ('SNACKS'),
        ('BEBIDAS'),
        ('BELLEZA'),
        ('MODA'),
        ('OTROS');

INSERT INTO categoria_servicios (nombre) 
VALUES ('ACADEMICOS'),
        ('TECNOLOGICOS'),
        ('BELLEZA'),
        ('OTROS');

--CONSULTA
SELECT S.nombre, S.descripcion, S.precio, S.img_servicio, S.estatus, E.telefono, E.img_personal, U.nombre, U.apellido_paterno, U.apellido_materno, C.nombre AS categoria
FROM servicios S
LEFT JOIN emprendedor E ON E.idemprendedor = S.fk_idemprendedor
LEFT JOIN usuarios U ON U.idusuarios = E.fk_idusuarios
LEFT JOIN categoria_servicios C ON C.idcategoria_servicios = S.fk_idcategoria_servicios
WHERE C.idcategoria_servicios = 1
AND S.estatus= 'V';


--consulta 2
SELECT S.nombre, S.descripcion, S.precio, S.img_servicio, S.estatus, E.telefono, C.nombre AS categoria
FROM servicios S
LEFT JOIN emprendedor E ON E.idemprendedor = S.fk_idemprendedor
LEFT JOIN usuarios U ON U.idusuarios = E.fk_idusuarios
LEFT JOIN categoria_servicios C ON C.idcategoria_servicios = S.fk_idcategoria_servicios
WHERE C.idcategoria_servicios = 1
AND S.estatus= 'V';