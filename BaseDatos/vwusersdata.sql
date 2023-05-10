DROP VIEW IF EXISTS  vwuserdata;
CREATE VIEW  vwuserdata AS 
SELECT u.eIdUsr AS userID, u.cveEmpleado AS CveEmpleado,p.txtName AS Usuario, u.txtEmail, u.bActivo AS uActivo,p.eIdPersona, p.txtName AS Nombre, p.txtLastName AS Apellidos, 
CONCAT(p.txtName, " ", p.txtLastName) AS NombreCompleto, p.txtTelefono, p.bActivo AS pActivo,  t.txtUserType AS TipoUsuario
FROM catusers u  JOIN catpersonas p ON u.fkeIdPersona = p.eIdPersona
JOIN catusertypes t ON u.fkeIdTipo = t.eIdUserType ;