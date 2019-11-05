CREATE TABLE IF NOT EXISTS `users` ( 
	`id` INT NOT NULL AUTO_INCREMENT, 
	`email` VARCHAR(255) NULL , 
	`phone_no` VARCHAR(255) NULL , 
	`password` VARCHAR(255) NOT NULL , 
	`facebook` VARCHAR(255) NULL , 
	`google` VARCHAR(255) NULL , 
	`country_code` VARCHAR(255) NULL, 
	`status` ENUM('10','20','30','40') NOT NULL COMMENT '10 => Active, 20 => Hold, 30 => Blocked 40=> Disabled' , 
	`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
	`updated_at` DATETIME on update CURRENT_TIMESTAMP NOT NULL , 
	PRIMARY KEY (`id`), 
	UNIQUE `email` (`email`), 
	UNIQUE `phone_no` (`phone_no`)
) ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `user_info` ( 
	`id` INT NOT NULL , 
	`firstname` VARCHAR(255) NULL , 
	`lastname` VARCHAR(255) NULL , 
	`gender` TINYINT NOT NULL DEFAULT '0' COMMENT '0 => Female 1=> Male' , 
	`user_id` INT NOT NULL REFERENCES users(id) ON DELETE CASCADE, 
	`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
	`updated_at` DATETIME on update CURRENT_TIMESTAMP NOT NULL , 
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;


INSERT INTO `users` (`email`, `phone_no`, `password`, `facebook`, `google`, `country_code`, `status`, `created_at`, `updated_at`) VALUES 'vinothkumar@gmail.com',  '8220466675',  MD5('admin123'), NULL, NULL, '', '10', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000');

INSERT INTO `users` (`email`, `phone_no`, `password`, `facebook`, `google`, `country_code`, `status`, `created_at`, `updated_at`) VALUES 'mani@gmail.com',  '9600255694',  MD5('admin123'), NULL, NULL, '', '10', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000');

INSERT INTO `users` (`email`, `phone_no`, `password`, `facebook`, `google`, `country_code`, `status`, `created_at`, `updated_at`) VALUES 'gopi@gmail.com',  '9566646773',  MD5('admin123'), NULL, NULL, '', '10', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000');

create or replace view userview as select id,email,password,status from users UNION select id, phone_no, password,status from users;