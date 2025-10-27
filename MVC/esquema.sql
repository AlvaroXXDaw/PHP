DROP TABLE IF EXISTS sorteo_premios;


CREATE TABLE sorteo_premios
 ( 
	sorteo_id INTEGER NOT NULL AUTO_INCREMENT , 
	numero integer,
	fecha date NOT NULL , 
	premioPequeño integer ,
    premioGrande integer,
	serie integer, 
	PRIMARY KEY(sorteo_id) 
);
INSERT INTO sorteo_premios (fecha, numero, premioPequeño, premioGrande, serie) VALUES ( '2025-10-19', 10000, 20000, 200000, 20);