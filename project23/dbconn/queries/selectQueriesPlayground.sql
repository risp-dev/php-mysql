create table `test.jumbo` ( `id` int not null auto_increment primary key, `name` varchar(45), `street` varchar(45), `date` varchar(45) ) engine=innodb default charset=utf8mb4

insert into `jumbo`(name, street, date) values ('Jonas', 'Pievu', '2000-01-02'), ('Petras', 'Geliu', '2002-01-02'), ('Ona', 'Pievu', '2003-01-02'), ('Kestas', 'Roziu', '2005-01-08'), ('Aras', 'Lokiu', '2010-01-04'), ('Gintas', 'Lochu', '2011-01-08'), ('Plovas', 'Ryziu', '2022-01-02')

alter table `jumbo`rename to `petras`

create table if not exists `jonas` ( `id` INT not null auto_increment primary key,  `disorder` varchar(45) )engine=InnoDB default charset=utf8mb4

insert into `jonas` (`disorder`) values ('Sloga'), ('Triperis'), ('Kosulys'), ('Psycho'), ('Tryda'), ('Opa'), ('Nepagydomas')

select * from `jonas` LIMIT 0, 1000

select * from `petras` LIMIT 0, 1000

alter table `jonas` add column ( `drug` varchar(45) )

alter table `jonas` add  column `mug` varchar(45) after `id`

alter table `jonas` rename to `bonifacius`

alter table `bonifacius` add column `crazy` INT after `disorder`

alter table `bonifacius` add column `mazy` INT after `crazy`

alter table `bonifacius` drop column `mazy`

ALTER TABLE `bonifacius` change `mug` `newkolumn` varchar(45)

alter table petras rename to kaziukas

alter table `kaziukas` change `street` `gatve` varchar(45)

alter table kaziukas change gatve street varchar(45)

alter table kaziukas rename to vardai

alter table bonifacius rename to ligos

alter table ligos drop column drug

alter table ligos  add column diagnoze varchar(45) after newkolumn

update  ligos set diagnoze='susirgimas' where id=2

update ligos set newkolumn='parazitoze' where id < 6

update ligos set newkolumn='kakalioze' where id = 6

update ligos set newkolumn='' where id = 6

UPDATE ligos SET newkolumn='kokiuhgo' WHERE id <> 5 AND id > 0

update ligos set newkolumn='No' where id < 5 

update ligos set newkolumn='Yrs' where id >= 5
