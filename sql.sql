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