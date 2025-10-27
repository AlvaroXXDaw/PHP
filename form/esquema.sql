
DROP TABLE IF EXISTS reg_personas;
CREATE TABLE reg_personas
(
codigo int NOT NULL AUTO_INCREMENT PRIMARY KEY,
usuario varchar(100),
clave varchar(100)
);

insert into reg_personas ( usuario, clave ) values ( "usuario", "password");
