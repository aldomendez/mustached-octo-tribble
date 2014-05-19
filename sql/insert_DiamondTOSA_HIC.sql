INSERT INTO shear_DiamondTOSA_HIC
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
	-- Glass,
	Bobina_1,
	Bobina_2,
	Bobina_3,
	Bobina_4
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
	-- :GLASS,
	:BOBINA_1,
	:BOBINA_2,
	:BOBINA_3,
	:BOBINA_4
)