CREATE DATABASE tasks;
USE tasks;
CREATE TABLE users(
	id_user INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    name_user VARCHAR(50),
    firstname_user VARCHAR(50),
    email_user VARCHAR(50) UNIQUE,
    mdp_user VARCHAR(100)
)engine=InnoDB;
CREATE TABLE tasks(
	id_task INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    name_task VARCHAR(50),
    content_task TEXT,
    date_task DATE,
    id_category INT,
    id_user INT
)engine=InnoDB;
CREATE TABLE categories(
	id_category INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    name_category VARCHAR(50)
)engine=InnoDB;
ALTER TABLE tasks
	ADD CONSTRAINT fk_categories
    FOREIGN KEY (id_category) REFERENCES categories (id_category);
ALTER TABLE tasks
	ADD CONSTRAINT fk_users
    FOREIGN KEY (id_user) REFERENCES users (id_user);
INSERT INTO categories (name_category) VALUE ("ménage"),("courses");
-- DROP DATABASE tasks;