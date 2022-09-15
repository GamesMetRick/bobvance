DROP DATABASE IF EXISTS bob_vance;

CREATE DATABASE bob_vance;

USE bob_vance;

CREATE TABLE login (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    repairs ENUM ('No', 'Yes') NOT NULL
);

CREATE TABLE Refrigerator (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    brand VARCHAR(255) NOT NULL,
    articlenumber VARCHAR(255) NOT NULL,
    price VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL,
    photo VARCHAR(255) NULL UNIQUE
);
CREATE TABLE contact (
    id INT NOT NULL PRIMARY key AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL UNIQUE,
    subject VARCHAR(255) NOT NULL,
    message VARCHAR(255) NOT NULL,
    e-mail VARCHAR(255) NOT NULL
)