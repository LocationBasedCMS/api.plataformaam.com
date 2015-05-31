delimiter $$
DROP TRIGGER IF EXISTS trigger_after_insert_user;

CREATE TRIGGER trigger_after_insert_user
AFTER INSERT ON `db_central`.`User` 
FOR EACH ROW 

BEGIN

    INSERT IGNORE INTO `db_plataforma`.`User` (
        `id`, 
        `login`, 
        `name`, 
        `email`, 
        `password`, 
        `isExcluded`
    )
    VALUES 
    (
        new.id, 
        new.login, 
        new.name, 
        new.email, 
        new.password, 
        new.isExcluded
    );


END$$
delimiter ;
