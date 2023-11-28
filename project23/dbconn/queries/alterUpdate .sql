ALTER TABLE `petras` 
ADD COLUMN `kose` int AFTER `name`,
ADD COLUMN `aliose` varchar(45) AFTER `date`

ALTER TABLE `petras` DROP aliose

UPDATE petras set zose='Gargasaite' WHERE id <= 7 and id > 0

UPDATE petras SET street='Pajurio' WHERE street = 'Pievu';

ALTER TABLE rimas CHANGE gatve gatve varchar(45)

UPDATE rimas 
SET `gatve` =
CASE
WHEN id = 1 THEN 'Pievu'
when id = 2 THEN 'Tulpiu'
when id = 3 THEN 'Jūros'
when id = 4 THEN 'Smilčių'
when id = 5 THEN 'Pajurio'
when id = 6 THEN 'Kopu'
WHEN id = 7 THEN 'Bangu'
END;

