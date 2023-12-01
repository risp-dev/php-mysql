CREATE TABLE IF NOT EXISTS `person` (
    `person_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `person_name` VARCHAR(120),
    `person_city` VARCHAR(120),
    `person_phone` VARCHAR(120)
)ENGINE=INNODB DEFAULT CHARACTER SET utf8mb4;

CREATE TABLE IF NOT EXISTS `company` (
    `company_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `company_name` VARCHAR(120),
    `company_city` VARCHAR(120),
    `company_budget` INT(8.2),
    `person_id` INT, 
    FOREIGN KEY (`person_id`) REFERENCES `person` (`person_id`)
    );