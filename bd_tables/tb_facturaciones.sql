

CREATE TABLE tb_facturaciones(
    id_facturacion           INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_informacion           VARCHAR (255) NULL,
    nro_factura              VARCHAR (255) NULL,
    id_cliente               VARCHAR (255) NULL,
    fecha_factura            VARCHAR (255) NULL,
    fecha_ingreso            VARCHAR (255) NULL,
    hora_ingreso             VARCHAR (255) NULL,
    fecha_salida             VARCHAR (255) NULL,
    hora_salida              VARCHAR (255) NULL,
    tiempo                   VARCHAR (255) NULL,
    cuviculo                 VARCHAR (255) NULL,
    detalle                  VARCHAR (255) NULL,
    precio                   VARCHAR (255) NULL,
    cantidad                 VARCHAR (255) NULL,
    total                    VARCHAR (255) NULL,
    monto_total              VARCHAR (255) NULL,
    monto_literal            VARCHAR (255) NULL,
    user_sesion              VARCHAR (255) NULL,
    qr                       VARCHAR (255) NULL,

    fyh_creacion            DATETIME        NULL,
    fyh_actualizacion       DATETIME        NULL,
    fyh_eliminacion         DATETIME        NULL,
    estado                  VARCHAR (10)
);