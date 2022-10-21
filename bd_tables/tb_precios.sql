

CREATE TABLE tb_precios(
    id_precio               INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    cantidad                VARCHAR (255) NULL,
    detalle                 VARCHAR (255) NULL,
    precio                  VARCHAR (255) NULL,

    fyh_creacion            DATETIME        NULL,
    fyh_actualizacion       DATETIME        NULL,
    fyh_eliminacion         DATETIME        NULL,
    estado                  VARCHAR (10)
);
