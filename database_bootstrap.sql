CREATE DATABASE PaperShop;

CREATE TABLE images (
    id  INT PRIMARY KEY AUTO_INCREMENT,
    url VARCHAR(255)
);

CREATE TABLE messages (
    id        INT PRIMARY KEY AUTO_INCREMENT,
    firstname TEXT,
    surname   TEXT,
    email     VARCHAR(100),
    subject   TEXT,
    content   TEXT,
    date      DATE,
    status    TEXT
);

CREATE TABLE orders (
    id        INT PRIMARY KEY AUTO_INCREMENT,
    firstname TEXT,
    surname   TEXT,
    email     VARCHAR(100),
    city      TEXT,
    zipcode   TEXT,
    address   TEXT,
    sum       FLOAT(6, 2),
    products  TEXT,
    date      DATE,
    status    TEXT
);

CREATE TABLE products (
    id       INT PRIMARY KEY AUTO_INCREMENT,
    category TEXT,
    content  TEXT,
    img      VARCHAR(100),
    price    FLOAT(6, 2)
);

CREATE TABLE users (
    id       INT PRIMARY KEY AUTO_INCREMENT,
    username TEXT,
    password TEXT
);

INSERT INTO images VALUES
    (NULL, '/images/grafikaproduktu.jpg'),
    (NULL, '/images/kartonygraficzne.png'),
    (NULL, '/images/kartonyopakowaniowe.png'),
    (NULL, '/images/papieretykietowy.jpg'),
    (NULL, '/images/papiersamokopiujacy.jpg'),
    (NULL, '/images/papieroffsetowy.jpg');

INSERT INTO users VALUES
    (NULL, 'admin', 'admin'),
    (NULL, 'admin1', 'admin1');
