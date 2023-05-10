#"SELECT * FROM vwusersactive WHERE Usuario = '$user' AND Pass = '$pass'";
#
#DROP VIEW vwusersactive;
CREATE VIEW vwusersactive AS 
SELECT u.txtNickName AS Usuario, u.txtEmail AS Email, u.txtPass AS Pass, t.eIdUserType AS IdType  FROM catusers u 
JOIN catusertypes t ON u.fkeIdTipo = t.eIdUserType
WHERE u.bActivo = 1; 