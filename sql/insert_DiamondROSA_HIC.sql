INSERT INTO DiamondROSA_HIC
(
	-- "Datos estandard" (todas las tablas los llevan)
	id,
	process,
	shear_date,
	serial_num,
	system_id,
	user_id,
	comments,
	passfail,
	-------------------------------------------------
	-- Datos de los shear test
	TIA_1,
	TIA_2,
	TIA_3,
	TIA_4,
	Capacitor_1,
	Capacitor_2,
	Capacitor_3,
	Capacitor_4,
	Capacitor_5,
	Capacitor_6,
	Capacitor_7,
	Capacitor_8,
	Capacitor_SMT
)
VALUES
(
	:ID,
	:PROCESS,
	sysdate,
	:SERIAL_NUM,
	:SYSTEM_ID,
	:USER_ID,
	:COMMENTS,
	:PASSFAIL,
	:TIA_1,
	:TIA_2,
	:TIA_3,
	:TIA_4,
	:CAPACITOR_1,
	:CAPACITOR_2,
	:CAPACITOR_3,
	:CAPACITOR_4,
	:CAPACITOR_5,
	:CAPACITOR_6,
	:CAPACITOR_7,
	:CAPACITOR_8,
	:CAPACITOR_SMT
)