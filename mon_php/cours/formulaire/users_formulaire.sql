CREATE DATABASE users_formulaire;
USE users;
CREATE TABLE users(
id_user INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
`login` VARCHAR(150),
email VARCHAR(150),
mdp VARCHAR(250),
age INT
)engine=InnoDB;

drop database users_formulaire;