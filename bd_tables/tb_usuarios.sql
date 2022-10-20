

CREATE TABLE tb_usuarios(
    id                      INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombres                 VARCHAR (255) NULL,
    rol                     VARCHAR (255) NULL,
    email                   VARCHAR (255) NULL,
    email_verificado        VARCHAR (255) NULL,
    password_user           VARCHAR (255) NULL,
    token                   VARCHAR (255) NULL,
    fyh_creacion            DATETIME        NULL,
    fyh_actualizacion       DATETIME        NULL,
    fyh_eliminacion         DATETIME        NULL,
    estado                  VARCHAR (10)
);