-- Describe el contenido de la tabla que contiene los datos
-- del proceso PMQPSK
CREATE Table Shear_DiamondTOSA_HIC (
	-- "Datos estandard" (todas las tablas los llevan)
	id 				number(6) NOT NULL,
	process 		varchar(30),
	shear_date 		date DEFAULT (sysdate),
	serial_num		varchar(30),
	system_id		varchar(30),
	user_id			varchar(30),
	comments		varchar(500),
	passfail		varchar(1),
	-------------------------------------------------
	-- Datos de los shear test
	Glass			number(7,2),
	Bobina_1		number(7,2),
	Bobina_2		number(7,2),
	Bobina_3		number(7,2),
	Bobina_4		number(7,2)
)

