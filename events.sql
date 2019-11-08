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
	`id` INT NOT NULL , 
	`firstname` VARCHAR(255) NULL , 
	`lastname` VARCHAR(255) NULL , 
	`gender` TINYINT NOT NULL DEFAULT '0' COMMENT '0 => Female 1=> Male' , 
	`user_id` INT NOT NULL, 
	`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
	`updated_at` DATETIME on update CURRENT_TIMESTAMP NULL , 
	PRIMARY KEY (`id`),
	FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE = InnoDB;

create or replace view userview as select id,email,password,status from users UNION select id, phone_no, password,status from users;


CREATE TABLE `institution` ( 
	`id` INT NOT NULL AUTO_INCREMENT , 
	`name` VARCHAR(500) NOT NULL , 
	`emblem` VARCHAR(255) NULL , 
	`description` TEXT NOT NULL , 
	`address` TEXT NOT NULL , 
	`gmap_location` TEXT NOT NULL , 
	`website_url` TEXT NOT NULL , 
	`facebook` TEXT NOT NULL , 
	`linkedin` TEXT NOT NULL , 
	`twitter` TEXT NOT NULL , 
	`google` TEXT NOT NULL , 
	`status` ENUM('10','20','30','40') NOT NULL COMMENT '10 => Active, 20 => Hold, 30 => Blocked 40=> Closed', 
	`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
	`modified_at` DATETIME on update CURRENT_TIMESTAMP NULL , 
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;


CREATE TABLE `event_type` ( 
	`id` INT NOT NULL AUTO_INCREMENT , 
	`name` VARCHAR(500) NOT NULL , 
	`category` VARCHAR(500) NOT NULL , 
	`status` ENUM('10','40') NOT NULL , 
	`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
	`updated_at` DATETIME on update CURRENT_TIMESTAMP NULL , 
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;


CREATE TABLE `symposium` ( 
	`id` INT NOT NULL AUTO_INCREMENT , 
	`name` VARCHAR(500) NULL , 
	`description` TEXT NULL , 
	`mobile_description` TEXT NULL , 
	`logo` VARCHAR(255) NULL , 
	`banner` VARCHAR(255) NULL , 
	`contact_info` TEXT NULL , 
	`event_from` DATETIME NULL , 
	`event_to` DATETIME NULL , 
	`allowed_users` INT NULL , 
	`address` TEXT NULL , 
	`gmap_location` TEXT NULL , 
	`status` ENUM('10','20','30','40') NOT NULL COMMENT '10 => Active, 20 => Hold, 30 => Blocked 40=> Completed', 
	`user_id` INT NOT NULL, 
	`institution_id` INT NOT NULL, 
	`event_type` INT NOT NULL, 
	`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
	`updated_at` DATETIME on update CURRENT_TIMESTAMP NULL , 
	PRIMARY KEY (`id`),
	FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
	FOREIGN KEY (event_type) REFERENCES event_type(id),
	FOREIGN KEY (institution_id) REFERENCES institution(id) ON DELETE CASCADE
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
`institution_id` INT NOT NULL, 
`program_id` INT NULL, 
`event_ids` VARCHAR(255) NULL , 
`event_type` INT NULL, 
`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
`updated_at` DATETIME on update CURRENT_TIMESTAMP NULL , 
`status` ENUM('10','20','30','40') NOT NULL , 
PRIMARY KEY (`id`),
FOREIGN KEY (event_type) REFERENCES event_type(id),
FOREIGN KEY (institution_id) REFERENCES institution(id) ON DELETE CASCADE
) ENGINE = InnoDB;



/* INSERT EVENT TYPE */

INSERT INTO `event_type` (`id`, `name`,  `category`, `status`, `created_at`, `updated_at`) VALUES (NULL,'symposium', 'college', '10', current_timestamp(), '2019-11-06 00:00:00');
INSERT INTO `event_type` (`id`, `name`, `category`, `status`, `created_at`, `updated_at`) VALUES (NULL,'symposium', 'school', '10', current_timestamp(), '2019-11-06 00:00:00');


/* INSERT Users */
INSERT INTO `users` (`email`, `phone_no`, `password`, `facebook`, `google`, `country_code`, `status`, `created_at`, `updated_at`) VALUES ('vinothkumar@gmail.com',  '8220466675',  MD5('admin123'), NULL, NULL, '', '10', CURRENT_TIMESTAMP, '2019-11-06 00:00:00');

INSERT INTO `users` (`email`, `phone_no`, `password`, `facebook`, `google`, `country_code`, `status`, `created_at`, `updated_at`) VALUES ('mani@gmail.com',  '9600255694',  MD5('admin123'), NULL, NULL, '', '10', CURRENT_TIMESTAMP, '2019-11-06 00:00:00');

INSERT INTO `users` (`email`, `phone_no`, `password`, `facebook`, `google`, `country_code`, `status`, `created_at`, `updated_at`) VALUES ('gopi@gmail.com',  '9566646773',  MD5('admin123'), NULL, NULL, '', '10', CURRENT_TIMESTAMP, '2019-11-06 00:00:00');


/*INSTITUTION*/


INSERT INTO `institution` (`id`, `name`, `emblem`, `description`, `address`, `gmap_location`, `website_url`, `facebook`, `linkedin`, `twitter`, `google`, `status`, `created_at`, `modified_at`) VALUES (NULL, 'SACS MAVMM Engg College', NULL, '', 'Kidaripatti, Melur - Azhagarkovil Road, Tamil Nadu 625301, Phone No: 0452 255 5100', '', 'http://sacsmec.in/web', '', '', '', '', '10', '2019-11-07 12:22:23', '2019-11-06 00:00:00');
INSERT INTO `institution` (`id`, `name`, `emblem`, `description`, `address`, `gmap_location`, `website_url`, `facebook`, `linkedin`, `twitter`, `google`, `status`, `created_at`, `modified_at`) VALUES (NULL, 'Latha Mathavan Engineering College', NULL, '', 'Plot Latha Mathavan Nagar, Near Alagarkovil Perumal Temple, Melur Taluk Madurai,, Kidaripatti, Tamil Nadu 625301\r\n', '', 'http://www.lathamathavan.edu.in/', '', '', '', '', '10', '2019-11-07 11:22:23', '2019-11-06 00:00:00');



/*SYMPOSIUM*/


INSERT INTO `symposium` (`id`, `name`, `description`, `mobile_description`, `logo`, `banner`, `contact_info`, `event_from`, `event_to`, `allowed_users`, `address`, `gmap_location`, `status`, `user_id`, `institution_id`, `event_type`, `created_at`, `updated_at`) VALUES (NULL, 'AARON 11', 'This symposium would contain around 12 events, which would have students from all engineering colleges competing for excellence.\r\n\r\nGENERAL RULES & REGULATIONS:\r\n\r\no Participants should bring their college identity cards along with bonafide certificates duly signed by the Head of the Institution/Department.\r\n\r\no Participants should come in full formals.\r\n\r\no A single candidate can participate only in maximum 3 events.\r\n\r\no Registration fee- Rs150/-\r\n\r\no DD should be taken in favor of “THE PRINCIPAL, SACS MAVMM ENGINEERING COLLEGE, ALAGAR KOVIL” payable at Madurai.\r\n\r\no DD should be sent to our college within 15-9-2011.\r\n\r\no Registration fee will be collected only once even if the candidate will participate in one (or) more events.\r\n\r\no There would be overlapping of events during the day of the symposium. Hence, the participants should make internal arrangements for participation accordingly.(refer agenda)\r\n\r\no The candidate who want to participate in gaming, can register their name in the spot by giving registration fee-Rs50/-', 'This symposium would contain around 12 events, which would have students from all engineering colleges competing for excellence.\r\n\r\nGENERAL RULES & REGULATIONS:\r\n\r\no Participants should bring their college identity cards along with bonafide certificates duly signed by the Head of the Institution/Department.\r\n\r\no Participants should come in full formals.\r\n\r\no A single candidate can participate only in maximum 3 events.\r\n\r\no Registration fee- Rs150/-\r\n\r\no DD should be taken in favor of “THE PRINCIPAL, SACS MAVMM ENGINEERING COLLEGE, ALAGAR KOVIL” payable at Madurai.\r\n\r\no DD should be sent to our college within 15-9-2011.\r\n\r\no Registration fee will be collected only once even if the candidate will participate in one (or) more events.\r\n\r\no There would be overlapping of events during the day of the symposium. Hence, the participants should make internal arrangements for participation accordingly.(refer agenda)\r\n\r\no The candidate who want to participate in gaming, can register their name in the spot by giving registration fee-Rs50/-', 'aaron.png', 'aaron-banner.jpeg', 'Mr. K.K.SUNDARRAJAN - 9943292163', '2019-11-10 09:00:00', '2019-11-10 19:00:00', '1500', 'Address: Kidaripatti, Melur - Azhagarkovil Road, Tamil Nadu 625301\r\nPhone: 0452 255 5100', NULL, '10', '1', '1', '2', current_timestamp(), '2019-11-21 00:00:00');

/*events*/

INSERT INTO `events` (`id`, `name`, `description`, `contact_us`, `event_from`, `event_to`, `sym_id`, `allowed_users`, `status`, `created_at`, `updated_at`) VALUES (NULL, 'MEMS and NEMS', '\r\n\r\nRules & Regulations:\r\n\r\n1. Number of Members – Max of 3.\r\n\r\n2. Working model should be presented.\r\n\r\n3. Desired output should be shown.\r\n\r\n4. Arrangements regarding the project should be made personally including laptop.\r\n\r\n5. Soft copies of the abstract should be mailed to aaron2k11e@gmail.com with subject as project.\r\n\r\n6. Last date for project submission is 10th September 2011 and the result would be intimated through mail on 13th September 2011.', 'For more details contact Mr. K.K.SUNDARRAJAN -9943292163', '2019-11-08 11:00:00', '2019-11-08 12:00:00', '1', '150', '10', current_timestamp(), '2019-11-07 16:00:00');
INSERT INTO `events` (`id`, `name`, `description`, `contact_us`, `event_from`, `event_to`, `sym_id`, `allowed_users`, `status`, `created_at`, `updated_at`) VALUES (NULL, 'DUMP C', '\r\n\r\nRules & Regulations:\r\n\r\n1. Number of Members – Max of 3.\r\n\r\n2. Working model should be presented.\r\n\r\n3. Desired output should be shown.\r\n\r\n4. Arrangements regarding the project should be made personally including laptop.\r\n\r\n5. Soft copies of the abstract should be mailed to aaron2k11e@gmail.com with subject as project.\r\n\r\n6. Last date for project submission is 10th September 2011 and the result would be intimated through mail on 13th September 2011.', 'For more details contact Mr. K.K.SUNDARRAJAN -9943292163', '2019-11-08 11:00:00', '2019-11-08 12:00:00', '1', '150', '10', '2019-11-07 12:38:59', '2019-11-07 16:00:00');


/*subscribers*/

INSERT INTO `subscribers` (`id`, `name`, `email`, `phone_no`, `institution_id`, `program_id`, `event_ids`, `event_type`, `created_at`, `updated_at`, `status`) VALUES (NULL, 'vinoth kumar', 'vinothJ@gmail.com', '8579347784', '1', '1', '1,2', '1', current_timestamp(), NULL, '10');

INSERT INTO `subscribers` (`id`, `name`, `email`, `phone_no`, `institution_id`, `program_id`, `event_ids`, `event_type`, `created_at`, `updated_at`, `status`) VALUES (NULL, 'kumar', 'kumar@gmail.com', '8579327784', '1', '1', '1,2', '1', current_timestamp(), NULL, '10');

INSERT INTO `subscribers` (`id`, `name`, `email`, `phone_no`, `institution_id`, `program_id`, `event_ids`, `event_type`, `created_at`, `updated_at`, `status`) VALUES (NULL, 'yashiv', 'yashiv@gmail.com', '8579327784', '1', '1', '1,2', '1', current_timestamp(), NULL, '10');
