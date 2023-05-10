CREATE PROCEDURE `insNewReferencia`(
	IN `idCte` INT,
	IN `cveRef` VARCHAR(50),
	IN `txtETA` VARCHAR(50),
	IN `txtNaviera` VARCHAR(50),
	IN `txtVessel` BINARY(50),
	IN `txtVoyaje` VARCHAR(50),
	IN `txtTerminal` VARCHAR(50),
	IN `txtCtaGastos` VARCHAR(50),
	IN `txtUrl` VARCHAR(50),
	IN `txtDocName` VARCHAR(50),
	IN `txtValor` VARCHAR(50),
	IN `txtContenedor` VARCHAR(50),
	IN `txtTamTipo` VARCHAR(50),
	IN `txtPedimento` VARCHAR(50),
	IN `txtBL` VARCHAR(50),
	IN `txtMercancia` VARCHAR(50),
	IN `txtBultos` VARCHAR(50),
	IN `txtFraccion` VARCHAR(50),
	IN `tstManiobraE` VARCHAR(50),
	IN `txtValorE` VARCHAR(50)
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT ''
BEGIN
		INSERT INTO catreferencias
	(fk_eIdCliente, cveReferencia, feReferencia) VALUES  (idCte, cveRef, NOW());
	
	SET idRef := LAST_INSERT_ID();
	
	INSERT INTO catgenerales
	(fk_eIdReferencia, txtETA, txtNaviera, txtVessel, txtVoyaje, txtTerminal)
	VALUES (eIdRef, txtETA, txtNaviera, txtVessel, txtVoyaje, txtTerminal);
	
	INSERT INTO docctagastos
	(fk_eIdReferencia, txtCtaGastos, txtUrl, txtDocName)
	VALUES (idRef, txtCtaGastos, txtUrl, txtDocName);
	
	INSERT INTO listgastos
	(fk_eIdGasto, fk_eIdReferencia, txtValor)
	VALUES (idGasto,idRef,txtvalor);
	
	SET idGasto  := SELECT MAX(eIdGastos) FROM listgastos;
	
	
	
	INSERT INTO catmercancias
	(fk_eIDReferencia, txtContenedor, txtTamTipo, txtPedimento, txtBL)
	VALUES (idRef,txtContenedor , txtTamTipo, txtPedimento, txtBL);
	
	SET idMerca := LAST_INSERT_ID();
	
	INSERT INTO listmercas
	(fk_eIdMerca, fk_eIdReferencia, txtMercancia, txtBultos, txtFraccion)
	VALUES (idMerca, idRef, txtMercancia, txtBultos, txtFraccion);
	
	INSERT INTO catmaniobrasextras
	(fk_eIdGasto, fk_eIdReferencia, txtManiobraE, txtValor)
	VALUES (idGasto, idRef, txtManiobraE, txtValorE);
END