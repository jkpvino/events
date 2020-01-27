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
	`updated_at` DATETIME on update CURRENT_TIMESTAMP NULL , 
	PRIMARY KEY (`id`), 
	UNIQUE `email` (`email`), 
	UNIQUE `phone_no` (`phone_no`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `user_info` ( 
	`id` INT NOT NULL AUTO_INCREMENT, 
	`firstname` VARCHAR(255) NULL , 
	`lastname` VARCHAR(255) NULL , 
	`website` VARCHAR(500) NULL , 
	`profileimg` VARCHAR(500) NULL , 
	`bio` TEXT NULL , 
	`gender` TINYINT NOT NULL DEFAULT '0' COMMENT '0 => Female 1=> Male' , 
	`user_id` INT NOT NULL, 
	`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
	`updated_at` DATETIME on update CURRENT_TIMESTAMP NULL , 
	PRIMARY KEY (`id`),
	FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE = InnoDB;

create or replace view userview as select id,email,password,status from users UNION select id, phone_no, password,status from users;



CREATE TABLE `event_type` ( 
	`id` INT NOT NULL AUTO_INCREMENT , 
	`name` VARCHAR(500) NOT NULL , 
	`name_code` VARCHAR(500) NOT NULL , 
	`category` VARCHAR(500) NOT NULL , 
	`category_code` VARCHAR(500) NOT NULL , 
	`status` ENUM('10','40') NOT NULL , 
	`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
	`updated_at` DATETIME on update CURRENT_TIMESTAMP NULL , 
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;


CREATE TABLE `institution` ( 
	`id` INT NOT NULL AUTO_INCREMENT , 
	`name` VARCHAR(500) NOT NULL , 
	`emblem` VARCHAR(255) NULL , 
	`description` TEXT NOT NULL , 
	`address` TEXT NOT NULL , 
	`gmap_location` TEXT NOT NULL , 
	`website_url` TEXT NOT NULL ,
	`institution_category` VARCHAR(255) NULL ,  
	`country` VARCHAR(255) NULL,
	`state` VARCHAR(255) NULL,
	`city` INT  NULL,
	`postal_code` VARCHAR(255) NULL,
	`facebook` TEXT NOT NULL , 
	`linkedin` TEXT NOT NULL , 
	`twitter` TEXT NOT NULL , 
	`google` TEXT NOT NULL , 
	`status` ENUM('10','20','30','40') NOT NULL COMMENT '10 => Active, 20 => Hold, 30 => Blocked 40=> Closed', 
	`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
	`modified_at` DATETIME on update CURRENT_TIMESTAMP NULL , 
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `symposium` ( 
	`id` INT NOT NULL AUTO_INCREMENT , 
	`name` VARCHAR(500) NULL , 
	`description` TEXT NULL , 
	`mobile_description` TEXT NULL , 
	`logo` VARCHAR(255) NULL , 
	`banner` VARCHAR(255) NULL , 
	`url_key` VARCHAR(255) NULL , 
	`contact_info` TEXT NULL , 
	`event_from` DATETIME NULL , 
	`event_to` DATETIME NULL , 
	`allowed_users` INT NULL , 
	`address` TEXT NULL , 
	`website` TEXT NULL , 
	`gmap_location` TEXT NULL , 	
	`country` VARCHAR(255) NULL,
	`state` VARCHAR(255) NULL,
	`city` INT  NULL,
	`postal_code` VARCHAR(255) NULL,
	`status` ENUM('10','20','30','40') NOT NULL COMMENT '10 => Active, 20 => Hold, 30 => Blocked 40=> Completed', 
	`user_id` INT NOT NULL, 
	`institution_id` INT NULL, 
	`event_type` INT NULL, 
	`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
	`updated_at` DATETIME on update CURRENT_TIMESTAMP NULL , 
	PRIMARY KEY (`id`),
	FOREIGN KEY (user_id) REFERENCES users(id),
	FOREIGN KEY (event_type) REFERENCES event_type(id),
	FOREIGN KEY (institution_id) REFERENCES institution(id)
) ENGINE = InnoDB;

CREATE TABLE `events` ( 
	`id` INT NOT NULL AUTO_INCREMENT , 
	`name` VARCHAR(500) NOT NULL , 
	`description` TEXT NOT NULL , 
	`contact_us` TEXT NULL , 
	`event_from` DATETIME NOT NULL , 
	`event_to` DATETIME NOT NULL , 
	`sym_id` INT NOT NULL, 
	`allowed_users` INT NOT NULL , 
	`status` ENUM('10','20','30','40') NOT NULL , 
	`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
	`updated_at` DATETIME on update CURRENT_TIMESTAMP NULL , 
	PRIMARY KEY (`id`),
	FOREIGN KEY (sym_id) REFERENCES symposium(id) ON DELETE CASCADE
) ENGINE = InnoDB;

CREATE TABLE `subscribers` ( 
`id` INT NOT NULL AUTO_INCREMENT , 
`name` VARCHAR(255) NULL , 
`email` VARCHAR(255) NULL , 
`phone_no` VARCHAR(255) NULL , 
`institution_id` INT NULL, 
`program_id` INT NULL, 
`event_ids` VARCHAR(255) NULL , 
`event_type` INT NULL, 
`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
`updated_at` DATETIME on update CURRENT_TIMESTAMP NULL , 
`status` ENUM('10','20','30','40') NOT NULL , 
PRIMARY KEY (`id`)
) ENGINE = InnoDB;


CREATE TABLE `hsm_admin` ( 
	`id` INT NOT NULL AUTO_INCREMENT , 
	`username` VARCHAR(255) NOT NULL , 
	`password` TEXT NOT NULL , 
	`status` ENUM('1') NOT NULL DEFAULT '1' , 
	`created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;


CREATE TABLE `contact_us` ( 
	`id` INT NOT NULL AUTO_INCREMENT , 
	`fullname` VARCHAR(255) NOT NULL , 
	`email` VARCHAR(255) NOT NULL , 
	`phone` VARCHAR(255) NULL , 
	`message` TEXT NULL , 
	`status` ENUM('10','20','30','') NOT NULL DEFAULT '30' COMMENT '10 => Completed, 20 => Inprogress, 30 => Pending' , 
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;



create or replace view searchevents as SELECT sys.id as id,sys.name as name,ins.name as institution, sys.status as status, logo, banner, url_key, event_from, event_to, sys.address, country.name as country, state.name as state, city.name as city, etype.name as etypename, etype.category as etypecategory FROM `symposium` as sys inner join institution as ins on sys.institution_id = ins.id LEFT JOIN event_type as etype on etype.id = sys.event_type LEFT JOIN countries as country ON sys.country = country.iso2 LEFT JOIN states as state ON sys.state = state.iso2 LEFT JOIN cities as city ON sys.city = city.id WHERE state.country_code = country.iso2;	

/*create or replace view searchevents as SELECT sys.id as id,sys.name as name,ins.name as institution, sys.status as status, logo, banner, url_key, event_from, event_to, sys.address, country.name as country, state.name as state, city.name as city, etype.name as etypename, etype.category as etypecategory FROM `symposium` as sys inner join institution as ins on sys.institution_id = ins.id LEFT JOIN event_type as etype on etype.id = sys.event_type LEFT JOIN countries as country ON ins.country = country.iso2 LEFT JOIN states as state ON ins.state = state.iso2 LEFT JOIN cities as city ON ins.city = city.id WHERE state.country_code = country.iso2;*/


INSERT INTO `users` (`id`, `email`, `phone_no`, `password`, `facebook`, `google`, `country_code`, `status`, `created_at`, `updated_at`) VALUES (NULL, 'vinothkumarjeyaraman@gmail.com', NULL, MD5('admin123'), NULL, NULL, NULL, '10', current_timestamp(), NULL);