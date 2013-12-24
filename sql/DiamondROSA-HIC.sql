-- Describe el contenido de la tabla que contiene los datos
-- del proceso PMQPSK
CREATE Table DiamondROSA_HIC (
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
	TIA_1			number(7,2),
	TIA_2			number(7,2),
	TIA_3			number(7,2),
	TIA_4			number(7,2),
	Capacitor_1		number(7,2),
	Capacitor_2		number(7,2),
	Capacitor_3		number(7,2),
	Capacitor_4		number(7,2),
	Capacitor_5		number(7,2),
	Capacitor_6		number(7,2),
	Capacitor_7		number(7,2),
	Capacitor_8		number(7,2),
	Capacitor_SMT	number(7,2)
)