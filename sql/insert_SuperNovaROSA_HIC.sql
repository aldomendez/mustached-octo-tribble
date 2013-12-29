INSERT INTO supernovarosa_hic
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
	TIA_5,
	Capacitor_1,
	Capacitor_2,
	Capacitor_3,
	Capacitor_4,
	Capacitor_5

)
VALUES
(
	:id,
	:process,
	sysdate,
	:serial_num,
	:system_id,
	:user_id,
	:comments,
	:passfail,
	:TIA_1,
	:TIA_2,
	:TIA_3,
	:TIA_4,
	:TIA_5,
	:Capacitor_1,
	:Capacitor_2,
	:Capacitor_3,
	:Capacitor_4,
	:Capacitor_5
)