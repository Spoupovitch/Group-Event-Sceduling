/*events*/
DELETE FROM `ued`.`comment`
WHERE c_id >= 0;

DELETE FROM `ued`.`private_event`
WHERE e_id >= 0;

DELETE FROM `ued`.`public_event`
WHERE e_id >= 0;

DELETE FROM `ued`.`rso_event`
WHERE e_id >= 0;

DELETE FROM `ued`.`event`
WHERE e_id >= 0;

/*pics*/
DELETE FROM `ued`.`pictures`
WHERE p_id >= 0;

/*rso*/
DELETE FROM `ued`.`rso_m`
WHERE r_id >= 0;

DELETE FROM `ued`.`rso`
WHERE r_id >= 0;

DELETE FROM `ued`.`admin`
WHERE s_id >= 0;

/*university*/
DELETE FROM `ued`.`stu`
WHERE s_id >= 0;

DELETE FROM `ued`.`uni`
WHERE u_id >= 0;

DELETE FROM `ued`.`s_admin`
WHERE s_a_id >= 0;
