

CREATE TABLE tb_clientes(
    id_cliente               INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_cliente          VARCHAR (255) NULL,
    nit_ci_cliente          VARCHAR (255) NULL,
    placa_auto        VARCHAR (255) NULL,

    fyh_creacion            DATETIME        NULL,
    fyh_actualizacion       DATETIME        NULL,
    fyh_eliminacion         DATETIME        NULL,
    estado                  VARCHAR (10)
);