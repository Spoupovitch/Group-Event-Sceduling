
INSERT INTO `ued`.`s_admin`
(`s_a_id`,
`name`,
`p_word`)
VALUES
(1,
'Ann',
'pass1');
INSERT INTO `ued`.`s_admin`
(`s_a_id`,
`name`,
`p_word`)
VALUES
(2,
'Bob',
'pass2');

INSERT INTO `ued`.`uni`
(`u_id`,
`num_s`,
`s_a_id`,
`description`,
`lat`,
`lon`,
`name`)
VALUES
(1,
0,
1,
'University of Central Florida',
28.6024,
81.2001,
'UCF');
INSERT INTO `ued`.`uni`
(`u_id`,
`num_s`,
`s_a_id`,
`description`,
`lat`,
`lon`,
`name`)
VALUES
(2,
0,
2,
'Florida State University',
30.4419,
84.2985,
'FSU');


INSERT INTO `ued`.`stu`
(`s_id`,
`u_id`,
`p_word`,
`name`)
VALUES
(1,
1,
'pass1',
'Ann');
INSERT INTO `ued`.`stu`
(`s_id`,
`u_id`,
`p_word`,
`name`)
VALUES
(2,
1,
'pass2',
'Bob');
INSERT INTO `ued`.`stu`
(`s_id`,
`u_id`,
`p_word`,
`name`)
VALUES
(3,
1,
'pass3',
'Carl');
INSERT INTO `ued`.`stu`
(`s_id`,
`u_id`,
`p_word`,
`name`)
VALUES
(4,
1,
'pass4',
'Dale');
INSERT INTO `ued`.`stu`
(`s_id`,
`u_id`,
`p_word`,
`name`)
VALUES
(5,
1,
'pass5',
'Earl');
INSERT INTO `ued`.`stu`
(`s_id`,
`u_id`,
`p_word`,
`name`)
VALUES
(6,
1,
'pass6',
'Felix');
INSERT INTO `ued`.`stu`
(`s_id`,
`u_id`,
`p_word`,
`name`)
VALUES
(7,
1,
'pass7',
'Gerald');
INSERT INTO `ued`.`stu`
(`s_id`,
`u_id`,
`p_word`,
`name`)
VALUES
(8,
1,
'pass8',
'Hanna');
INSERT INTO `ued`.`stu`
(`s_id`,
`u_id`,
`p_word`,
`name`)
VALUES
(9,
1,
'pass9',
'Ingrid');
INSERT INTO `ued`.`stu`
(`s_id`,
`u_id`,
`p_word`,
`name`)
VALUES
(10,
1,
'pass10',
'Janine');
INSERT INTO `ued`.`stu`
(`s_id`,
`u_id`,
`p_word`,
`name`)
VALUES
(11,
2,
'pass11',
'Alex');
INSERT INTO `ued`.`stu`
(`s_id`,
`u_id`,
`p_word`,
`name`)
VALUES
(12,
2,
'pass12',
'Barbara');
INSERT INTO `ued`.`stu`
(`s_id`,
`u_id`,
`p_word`,
`name`)
VALUES
(13,
2,
'pass13',
'Carla');
INSERT INTO `ued`.`stu`
(`s_id`,
`u_id`,
`p_word`,
`name`)
VALUES
(14,
2,
'pass14',
'Daryl');
INSERT INTO `ued`.`stu`
(`s_id`,
`u_id`,
`p_word`,
`name`)
VALUES
(15,
2,
'pass15',
'Elizabeth');
INSERT INTO `ued`.`stu`
(`s_id`,
`u_id`,
`p_word`,
`name`)
VALUES
(16,
2,
'pass16',
'Frank');
INSERT INTO `ued`.`stu`
(`s_id`,
`u_id`,
`p_word`,
`name`)
VALUES
(17,
2,
'pass17',
'Garfield');
INSERT INTO `ued`.`stu`
(`s_id`,
`u_id`,
`p_word`,
`name`)
VALUES
(18,
2,
'pass18',
'Harold');
INSERT INTO `ued`.`stu`
(`s_id`,
`u_id`,
`p_word`,
`name`)
VALUES
(19,
2,
'pass19',
'Irene');
INSERT INTO `ued`.`stu`
(`s_id`,
`u_id`,
`p_word`,
`name`)
VALUES
(20,
2,
'pass20',
'Jack');

INSERT INTO `ued`.`admin`
(`s_id`)
VALUES
(1);
INSERT INTO `ued`.`admin`
(`s_id`)
VALUES
(2);
INSERT INTO `ued`.`admin`
(`s_id`)
VALUES
(3);

INSERT INTO `ued`.`rso`
(`r_id`,
`s_id`,
`u_id`,
`name`)
VALUES
(1,
1,
1,
'Lacrosse Enthusiasts');
INSERT INTO `ued`.`rso`
(`r_id`,
`s_id`,
`u_id`,
`name`)
VALUES
(2,
2,
1,
'UCF Yoga');
INSERT INTO `ued`.`rso`
(`r_id`,
`s_id`,
`u_id`,
`name`)
VALUES
(3,
3,
1,
'Foodies');

INSERT INTO `ued`.`event`
(`e_id`,
`phone`,
`date`,
`s_time`,
`e_time`,
`lat`,
`lon`,
`name`,
`type`,
`description`,
`email`,
`status`)
VALUES
(1,
123456789,
20170714,
120000,
130000,
20,
80,
'Yoga',
'Fitness',
'Come make friends at our public yoga class!',
'shelly@ucf.edu',
0);
INSERT INTO `ued`.`event`
(`e_id`,
`phone`,
`date`,
`s_time`,
`e_time`,
`lat`,
`lon`,
`name`,
`type`,
`description`,
`email`,
`status`)
VALUES
(2,
234567891,
20170714,
200000,
210000,
21,
83,
'Wine Tasting',
'Social',
'Must be 18 or older to attend.',
'david@ucf.edu',
0);
INSERT INTO `ued`.`event`
(`e_id`,
`phone`,
`date`,
`s_time`,
`e_time`,
`lat`,
`lon`,
`name`,
`type`,
`description`,
`email`,
`status`)
VALUES
(3,
345678912,
20170715,
180000,
190000,
21,
80,
'Lights Festival',
'Cultural',
'Celebrate the Festival of Lights on campus!',
'brian@ucf.edu',
0);
INSERT INTO `ued`.`event`
(`e_id`,
`phone`,
`date`,
`s_time`,
`e_time`,
`lat`,
`lon`,
`name`,
`type`,
`description`,
`email`,
`status`)
VALUES
(4,
456789123,
20170715,
120000,
130000,
20,
8,
'Book Club',
'Literature',
'Reading Flowers for Algernon',
'alan@ucf.edu',
0);
INSERT INTO `ued`.`event`
(`e_id`,
`phone`,
`date`,
`s_time`,
`e_time`,
`lat`,
`lon`,
`name`,
`type`,
`description`,
`email`,
`status`)
VALUES
(5,
567891234,
20170715,
160000,
170000,
22,
81,
'Swim Meet',
'Sports Event',
'Show your school spirit at the swim meet!',
'farnsworth@ucf.edu',
0);
INSERT INTO `ued`.`event`
(`e_id`,
`phone`,
`date`,
`s_time`,
`e_time`,
`lat`,
`lon`,
`name`,
`type`,
`description`,
`email`,
`status`)
VALUES
(6,
678912345,
20170716,
140000,
160000,
23,
80,
'Campus Tour',
'Informational',
'Walk-in tour event, no appointment necessary.',
'dana@ucf.edu',
0);

INSERT INTO `ued`.`rso_event`
(`e_id`,
`r_id`)
VALUES
(2,
3);
INSERT INTO `ued`.`public_event`
(`e_id`)
VALUES
(4);
INSERT INTO `ued`.`private_event`
(`e_id`,
`u_id`)
VALUES
(6,
2);

INSERT INTO `ued`.`comment`
(`text`,
`rating`,
`c_id`,
`e_id`,
`s_id`)
VALUES
('This is gonna be a great event!',
4,
2165,
2,
4);

