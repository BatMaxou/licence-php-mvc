DROP DATABASE IF EXISTS php_mvc;

CREATE DATABASE php_mvc;

USE php_mvc;

CREATE TABLE user(
    id INT NOT NULL AUTO_INCREMENT,
    login VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE movie(
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    cover BLOB,
    director VARCHAR(255) NOT NULL,
    synopsis TEXT NOT NULL,
    type VARCHAR(255) NOT NULL,
    scriptwriter VARCHAR(255) NOT NULL,
    production_company VARCHAR(255) NOT NULL,
    release_date VARCHAR(20) NOT NULL,
    user INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (user) REFERENCES user(id)
);

CREATE TABLE list(
    user INT NOT NULL,
    movie INT NOT NULL,
    PRIMARY KEY (user, movie),
    FOREIGN KEY (user) REFERENCES user(id),
    FOREIGN KEY (movie) REFERENCES movie(id) ON DELETE CASCADE
)
