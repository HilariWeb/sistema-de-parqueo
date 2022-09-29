


CREATE TABLE tb_mapeos(
    id_map                  INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nro_espacio             VARCHAR (255) NULL,
    estado_espacio          VARCHAR (255) NULL,
    obs                     VARCHAR (255) NULL,


    fyh_creacion            DATETIME        NULL,
    fyh_actualizacion       DATETIME        NULL,
    fyh_eliminacion         DATETIME        NULL,
    estado                  VARCHAR (10)
);