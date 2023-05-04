/*CREATE VIEW vwLisTaMercancias As
SELECT cm.eIdMerca AS IdMercancia, lm.eIdList IdLista_Mercancias, lm.txtMercancia AS Mercancia, lm.txtBultos AS Bultos, lm.txtFraccion AS Fraccion_Arancelaria
FROM listmercas lm 
INNER JOIN catmercancias cm ON lm.fk_eIdMerca = cm.eIdMerca;

CREATE VIEW vwListaGastos AS
SELECT eIdGastos AS IdGasto, fk_eIdReferencia AS IdReferencia, txtCveGasto AS Nombre_Gasto, txtValor as Valor
	FROM catgastos g INNER JOIN catlistgastos lg ON g.fk_eIdGasto = lg.eIdLGasto ;
*/

CREATE VIEW vwListaExtras AS
SELECT fk_eIdGasto AS idGasto, fk_eIdReferencia AS idReferencia, txtManiobraE AS Maniobra, txtValor AS Valor
	FROM catmaniobrasextras me INNER JOIN catreferencias ref ON me.fk_eIDReferencia = ref.eIdReferencia; 
	


CREATE VIEW vwReferencias AS
SELECT re.eIdReferencia AS IdReferencia, re.fk_eIdCliente AS IdCliente,
 re.cveReferencia AS CveReferencia, re.feReferencia AS Fecha_Referencia, 
 txtContenedor AS Contenedor, txtTamTipo AS Tamano_Tipo, txtPedimento AS Pedimento, txtBL AS BL
	FROM catreferencias re
INNER JOIN catmercancias me
	ON re.eIdReferencia = me.fk_eIDReferencia
	INNER JOIN vwListaGastos lg ON lg.IdReferencia = re.eIdReferencia;
	
