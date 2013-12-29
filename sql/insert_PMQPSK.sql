INSERT INTO shear_pmkpsk
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
	diodo_1,
	diodo_2,
	diodo_3,
	diodo_4

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
	:Diodo_1,
	:Diodo_2,
	:Diodo_3,
	:Diodo_4
)