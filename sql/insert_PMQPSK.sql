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
	:ID,
	:PROCESS,
	sysdate,
	:SERIAL_NUM,
	:SYSTEM_ID,
	:USER_ID,
	:COMMENTS,
	:PASSFAIL,
	:DIODO_1,
	:DIODO_2,
	:DIODO_3,
	:DIODO_4
)