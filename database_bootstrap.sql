CREATE DATABASE PaperShop;

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    firstname TEXT,
    surname TEXT,
    username TEXT,
    password TEXT,
    email VARCHAR(256),
    city TEXT,
    zipcode TEXT,
    address TEXT,
    verifyKey TEXT
);

CREATE TABLE uploads (
    id  INT PRIMARY KEY AUTO_INCREMENT,
    url VARCHAR(256)
);

CREATE TABLE messages (
    id        INT PRIMARY KEY AUTO_INCREMENT,
    firstname TEXT,
    surname   TEXT,
    email     VARCHAR(256),
    subject   TEXT,
    content   TEXT,
    date      DATE,
    status    TEXT
);

CREATE TABLE orders (
    id        INT PRIMARY KEY AUTO_INCREMENT,
    clientID  INT ,
    sum       FLOAT(6, 2),
    products  TEXT,
    date      DATE,
    status    TEXT,
    FOREIGN KEY (clientID) REFERENCES users(id)
);

CREATE TABLE products (
    id       INT PRIMARY KEY AUTO_INCREMENT,
    category TEXT,
    content  TEXT,
    uploadID INT,
    price    FLOAT(6, 2),
    FOREIGN KEY (uploadID) REFERENCES uploads(id)
);

INSERT INTO uploads VALUES
    (NULL, '/uploads/grafikaproduktu.jpg'),
    (NULL, '/uploads/kartonygraficzne.png'),
    (NULL, '/uploads/kartonyopakowaniowe.png'),
    (NULL, '/uploads/papieretykietowy.jpg'),
    (NULL, '/uploads/papiersamokopiujacy.jpg'),
    (NULL, '/uploads/papieroffsetowy.jpg');

ALTER DATABASE PaperShop CHARACTER SET utf8 COLLATE utf8_general_ci;

ALTER TABLE users CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE users MODIFY firstname TEXT CHARACTER SET utf8 COLLATE utf8_polish_ci;
ALTER TABLE users MODIFY surname TEXT CHARACTER SET utf8 COLLATE utf8_polish_ci;
ALTER TABLE users MODIFY username TEXT CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE users MODIFY password TEXT CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE users MODIFY email VARCHAR(256) CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE users MODIFY city TEXT CHARACTER SET utf8 COLLATE utf8_polish_ci;
ALTER TABLE users MODIFY zipcode TEXT CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE users MODIFY address TEXT CHARACTER SET utf8 COLLATE utf8_polish_ci;
ALTER TABLE users MODIFY verifyKey TEXT CHARACTER SET utf8 COLLATE utf8_general_ci;

ALTER TABLE uploads CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE uploads MODIFY url VARCHAR(256) CHARACTER SET utf8 COLLATE utf8_general_ci;

ALTER TABLE messages CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE messages MODIFY firstname TEXT CHARACTER SET utf8 COLLATE utf8_polish_ci;
ALTER TABLE messages MODIFY surname TEXT CHARACTER SET utf8 COLLATE utf8_polish_ci;
ALTER TABLE messages MODIFY email VARCHAR(256) CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE messages MODIFY subject TEXT CHARACTER SET utf8 COLLATE utf8_polish_ci;
ALTER TABLE messages MODIFY content TEXT CHARACTER SET utf8 COLLATE utf8_polish_ci;
ALTER TABLE messages MODIFY status TEXT CHARACTER SET utf8 COLLATE utf8_polish_ci;

ALTER TABLE orders CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE orders MODIFY products TEXT CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE orders MODIFY status TEXT CHARACTER SET utf8 COLLATE utf8_polish_ci;

ALTER TABLE products CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE products MODIFY category TEXT CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE products MODIFY content TEXT CHARACTER SET utf8 COLLATE utf8_polish_ci;