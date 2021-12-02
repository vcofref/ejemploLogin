CREATE TABLE productos(
    id int auto_increment not null,
    nombre varchar(255),
    precio int,
    sucursal_id int not null,
    created_at datetime,
    updated_at datetime,
    CONSTRAINT pk_producto PRIMARY KEY(id),
    CONSTRAINT fk_producto_sucursal FOREIGN KEY(sucursal_id) REFERENCES sucursal(id)
)ENGINE=InnoDb;

CREATE TABLE sucursal(
    id int auto_increment not null,
    nombre varchar(255),
    created_at datetime,
    updated_at datetime,
    CONSTRAINT pk_sucursal PRIMARY KEY(id)
)ENGINE=InnoDb;