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
    sum       FLOAT(10, 2),
    products  TEXT,
    date      DATE,
    status    TEXT,
    FOREIGN KEY (clientID) REFERENCES users(id) ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE TABLE products (
    id       INT PRIMARY KEY AUTO_INCREMENT,
    category TEXT,
    content  TEXT,
    uploadID INT,
    price    FLOAT(10, 2),
    FOREIGN KEY (uploadID) REFERENCES uploads(id) ON DELETE SET NULL ON UPDATE NO ACTION
);

INSERT INTO uploads VALUES
    (NULL, '/uploads/no-image.jpg'),
    (NULL, '/uploads/grafikaproduktu.jpg'),
    (NULL, '/uploads/kartonygraficzne.png'),
    (NULL, '/uploads/kartonyopakowaniowe.png'),
    (NULL, '/uploads/papieretykietowy.jpg'),
    (NULL, '/uploads/papiersamokopiujacy.jpg'),
    (NULL, '/uploads/papieroffsetowy.jpg');

INSERT INTO users VALUES
    (NULL,'uzupelnij','uzupelnij','admin','admin','uzupelnij','uzupelnij','uzupelnij','uzupelnij',''),
    (NULL,'uzupelnij','uzupelnij','administracja','admin1','uzupelnij','uzupelnij','uzupelnij','uzupelnij','');

INSERT INTO products VALUES
    (NULL,'Papiery-powlekane','Papiery powlekane - produkt 1','2','23.99'),
    (NULL,'Papiery-powlekane','Papiery powlekane - produkt 2','2','24.99'),
    (NULL,'Papiery-powlekane','Papiery powlekane - produkt 3','2','25.99'),
    (NULL,'Papiery-powlekane','Papiery powlekane - produkt 4','2','25.99'),
    (NULL,'Kartony-graficzne','Kartony graficzne - produkt 1','3','25.99'),
    (NULL,'Kartony-graficzne','Kartony graficzne - produkt 2','3','26.99'),
    (NULL,'Kartony-graficzne','Kartony graficzne - produkt 3','3','27.99'),
    (NULL,'Kartony-opakowaniowe','Kartony opakowaniowe - produkt 1','4','28.99'),
    (NULL,'Kartony-opakowaniowe','Kartony opakowaniowe - produkt 2','4','29.99'),
    (NULL,'Kartony-opakowaniowe','Kartony opakowaniowe - produkt 3','4','30.99'),
    (NULL,'Kartony-opakowaniowe','Kartony opakowaniowe - produkt 4','4','31.99'),
    (NULL,'Kartony-opakowaniowe','Kartony opakowaniowe - produkt 5','4','32.99'),
    (NULL,'Papiery-etykietowe','Papier etykietowy - produkt 1','5','33.99'),
    (NULL,'Papiery-etykietowe','Papier etykietowy - produkt 2','5','34.99'),
    (NULL,'Papiery-etykietowe','Papier etykietowy - produkt 3','5','35.99'),
    (NULL,'Papiery-samokopiujace','Papier samokopiujący - produkt 1','6','36.99'),
    (NULL,'Papiery-samokopiujace','Papier samokopiujący - produkt 2','6','37.99'),
    (NULL,'Papiery-samokopiujace','Papier samokopiujący - produkt 3','6','38.99'),
    (NULL,'Papiery-samokopiujace','Papier samokopiujący - produkt 4','6','39.99'),
    (NULL,'Papier-offsetowy','Papier offsetowy - produkt 1','7','39.99'),
    (NULL,'Papier-offsetowy','Papier offsetowy - produkt 2','7','39.99');

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
