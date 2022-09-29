

CREATE TABLE tb_roles(
    id_rol                  INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre                  VARCHAR (255) NULL,

    fyh_creacion            DATETIME        NULL,
    fyh_actualizacion       DATETIME        NULL,
    fyh_eliminacion         DATETIME        NULL,
    estado                  VARCHAR (10)
);