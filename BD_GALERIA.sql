CREATE DATABASE galeria;
USE galeria;
CREATE TABLE images (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    size INT NOT NULL,
    type VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL
);
SELECT * FROM images;
DROP table images;

CREATE USER 'User_alex'@'localhost' IDENTIFIED BY '123456';
GRANT ALL PRIVILEGES ON galeria.* TO 'User_alex'@'localhost';
FLUSH PRIVILEGES;


