INSERT INTO shear_icrx2
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
	diodo_2
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
	:Diodo_2
)