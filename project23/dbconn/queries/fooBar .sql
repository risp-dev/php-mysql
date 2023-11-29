CREATE TABLE IF NOT EXISTS `test`.`foo` (
  `foo_id` INT NOT NULL AUTO_INCREMENT,
  `foo_value` VARCHAR(45),
  PRIMARY KEY (`foo_id`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `test`.`bar` (
  `bar_id` INT NOT NULL AUTO_INCREMENT,
  `bar_value` VARCHAR(45) NULL,
  `foo_id` INT,
  PRIMARY KEY (`bar_id`),
  CONSTRAINT `fk_foo_id` 
    FOREIGN KEY (`foo_id`)
    REFERENCES `test`.`foo` (`foo_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;




insert into foo (foo_value) values ('foo'), ('bar')

insert into bar (bar_value, foo_id) values ('buz', 2), ('qux', 3)

select * from foo f inner join bar b on b.foo_id=f.foo_id LIMIT 0, 1000

select * from foo f inner join bar b on b.foo_id=f.foo_id LIMIT 0, 1000

select * from foo f left outer join bar b  on f.foo_id=b.bar_id LIMIT 0, 1000

select * from foo f left outer join bar b  on f.foo_id=b.foo_id LIMIT 0, 1000

select * from foo f right outer join bar b  on f.foo_id=b.foo_id LIMIT 0, 1000
