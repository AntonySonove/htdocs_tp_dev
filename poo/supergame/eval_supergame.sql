CREATE DATABASE IF NOT EXISTS supergame CHARSET utf8mb4;
USE supergame;
CREATE TABLE IF NOT EXISTS players(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    pseudo VARCHAR(100) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    score INT DEFAULT 0,
    psswrd VARCHAR(150) NOT NULL
)ENGINE=innoDB;

INSERT INTO players (pseudo, email, score, psswrd) 
	VALUES ("Flora","flora@gmail.com",500,"$2y$10$1tYmIFANMlnlqU/I4DQ11.4oQudG8on8tIHQ1yaOlq.QoEQmMcQTa"),
		("Kevin31","theking@sfr.fr",900,"$2y$10$/8WwBJtAOJnl4BA6eJB9n.WZ2zMIMC1cRZl0deESLfnvkAyzY1C4e"),
        ("Chuck Norris","beyondgod@hotmail.com",100,"$2y$10$uuVbf7UGx0zz6QnZjn1MnOBfZDhMnLrcJHpz6U/X8VvAmH88AOzaW");

