DROP DATABASE IF EXISTS php_mvc;

CREATE DATABASE php_mvc;

USE php_mvc;

CREATE TABLE user(
    id INT NOT NULL AUTO_INCREMENT,
    login VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE director(
    id INT NOT NULL AUTO_INCREMENT,
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE type(
    id INT NOT NULL AUTO_INCREMENT,
    label VARCHAR(255) NOT NULL UNIQUE,
    PRIMARY KEY (id)
);

CREATE TABLE scriptwriter(
    id INT NOT NULL AUTO_INCREMENT,
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE production_company(
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL UNIQUE,
    PRIMARY KEY (id)
);

CREATE TABLE movie(
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL UNIQUE,
    director INT NOT NULL,
    synopsis TEXT NOT NULL,
    type INT NOT NULL,
    scriptwriter INT NOT NULL,
    production_company INT NOT NULL,
    release_date VARCHAR(20) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (director) REFERENCES director(id),
    FOREIGN KEY (type) REFERENCES type(id),
    FOREIGN KEY (scriptwriter) REFERENCES scriptwriter(id),
    FOREIGN KEY (production_company) REFERENCES production_company(id)
);
