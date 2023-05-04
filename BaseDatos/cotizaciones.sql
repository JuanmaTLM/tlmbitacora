CREATE TABLE catCotizaciones (
  eIdCotizacion int AUTO_INCREMENT PRIMARY KEY,
  fk_eIdCliente INT NOT NULL,
  fk_eIdEstatus INT NOT NULL,
  feEmision DATE DEFAULT CURRENT_DATE,
  txtProyecto varchar(100) NOT NULL,
  txtVigencia varchar(20) NOT NULL,
  txtMoneda varchar(3) NOT NULL,
  txtTipoCambio varchar(5) NOT NULL,
  txtDiasCredito varchar(10) NOT NULL,
  flSubtotal decimal(15,2) NOT NULL,
  flIVA decimal(15,2) NOT NULL,
  flRetencion decimal(15,2) NOT NULL,
  flTotal decimal(15,2) NOT NULL,
  feCreacion DATETIME DEFAULT CURRENT_TIMESTAMP,
  feActualizacion DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE catEstatus (
  eIdEstatus INT PRIMARY KEY AUTO_INCREMENT,
  txtEstatus VARCHAR(10) NOT NULL,
  txtDesc TEXT NOT NULL,
  feCreacion DATETIME DEFAULT CURRENT_TIMESTAMP,
  feActualizacion DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE catClientes(
  eIdCliente INT AUTO_INCREMENT PRIMARY KEY,
  txtNombreCliente varchar(100) NOT NULL,
  txtEmail varchar(50) NOT NULL,
  txtTelefono varchar(10) NOT NULL,
  txtRFC varchar(18) NOT NULL,
  feCreacion DATETIME DEFAULT CURRENT_TIMESTAMP,
  feActualizacion DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE detCotizaciones (
  eIdDetalle int NOT NULL PRIMARY KEY,
  fk_eIdCotizacion int NOT NULL,
  cantidad decimal(15,2) NOT NULL,
  txtDescripcion longtext NOT NULL,
  flPrecioUnitario decimal(15,2) NOT NULL,
  flPorcentajeIVA decimal(5,2) NOT NULL,
  flMontoIva decimal(15,2) NOT NULL,
  flPorcentajeRetencion decimal(5,2) NOT NULL,
  flMontoRetencion decimal(15,2) NOT NULL,
  flImporte decimal(15,2) NOT NULL,
  feCreacion DATETIME DEFAULT CURRENT_TIMESTAMP,
  feActualizacion DATETIME DEFAULT CURRENT_TIMESTAMP
);