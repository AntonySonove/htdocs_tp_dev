CREATE DATABASE articles;
USE articles;
CREATE TABLE article(
	id_article INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nom_article VARCHAR(50),
    description_article VARCHAR(255),
    prix_article DECIMAL(6,2)
)engine=InnoDB;