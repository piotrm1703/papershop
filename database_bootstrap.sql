CREATE DATABASE PaperShop CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE users  (
  id INT PRIMARY KEY AUTO_INCREMENT,
  firstname VARCHAR(200)
     CHARACTER SET utf8
     COLLATE utf8_polish_ci,
  surname   VARCHAR(200)
     CHARACTER SET utf8
     COLLATE utf8_polish_ci,
  username  VARCHAR(200),
  password  VARCHAR(200),
  email     VARCHAR(256),
  city      VARCHAR(200)
     CHARACTER SET utf8
     COLLATE utf8_polish_ci,
  zipcode   VARCHAR(200),
  address   VARCHAR(200)
     CHARACTER SET utf8
     COLLATE utf8_polish_ci,
  verifyKey VARCHAR(30),
  isAdmin   TINYINT
)
  CHARACTER SET utf8 COLLATE utf8_general_ci
;

CREATE TABLE uploads (
  id  INT PRIMARY KEY AUTO_INCREMENT,
  url VARCHAR(256)
)
  CHARACTER SET utf8 COLLATE utf8_general_ci
;

CREATE TABLE messages (
  id        INT PRIMARY KEY AUTO_INCREMENT,
  firstname VARCHAR(200)
            CHARACTER SET utf8
            COLLATE utf8_polish_ci,
  surname   VARCHAR(200)
            CHARACTER SET utf8
            COLLATE utf8_polish_ci,
  email     VARCHAR(256),
  subject   VARCHAR(200)
            CHARACTER SET utf8
            COLLATE utf8_polish_ci,
  content   VARCHAR(10000)
            CHARACTER SET utf8
            COLLATE utf8_polish_ci,
  date      DATE,
  status    VARCHAR(50)
            CHARACTER SET utf8
            COLLATE utf8_polish_ci
)
  CHARACTER SET utf8 COLLATE utf8_general_ci
;

CREATE TABLE orders (
  id        INT PRIMARY KEY AUTO_INCREMENT,
  clientID  INT ,
  sum       FLOAT(10, 2),
  products  VARCHAR(1000),
  date      DATE,
  status    VARCHAR(50)
            CHARACTER SET utf8
            COLLATE utf8_polish_ci,
  FOREIGN KEY (clientID) REFERENCES users(id) ON DELETE NO ACTION ON UPDATE NO ACTION
)
  CHARACTER SET utf8 COLLATE utf8_general_ci
;

CREATE TABLE products (
  id       INT PRIMARY KEY AUTO_INCREMENT,
  category VARCHAR(200),
  content  VARCHAR(10000)
           CHARACTER SET utf8
           COLLATE utf8_polish_ci,
  uploadID INT,
  price    FLOAT(10, 2),
  FOREIGN KEY (uploadID) REFERENCES uploads(id) ON DELETE SET NULL ON UPDATE NO ACTION
)
  CHARACTER SET utf8 COLLATE utf8_general_ci
;

CREATE TABLE comments (
  id       INT PRIMARY KEY AUTO_INCREMENT,
  productID INT,
  clientID  INT,
  content VARCHAR(10000)
           CHARACTER SET utf8
           COLLATE utf8_polish_ci,
  FOREIGN KEY (productID) REFERENCES products(id) ON DELETE SET NULL ON UPDATE NO ACTION,
  FOREIGN KEY (clientID) REFERENCES users(id) ON DELETE SET NULL ON UPDATE NO ACTION
)
  CHARACTER SET utf8 COLLATE utf8_general_ci
;

INSERT INTO uploads VALUES
  (NULL, '/uploads/no-image.jpg'),
  (NULL, '/uploads/grafikaproduktu.jpg'),
  (NULL, '/uploads/kartonygraficzne.png'),
  (NULL, '/uploads/kartonyopakowaniowe.png'),
  (NULL, '/uploads/papieretykietowy.jpg'),
  (NULL, '/uploads/papiersamokopiujacy.jpg'),
  (NULL, '/uploads/papieroffsetowy.jpg');

INSERT INTO users VALUES
  (NULL, 'Konto administratora', 'uzupelnij', 'admin', '$2y$10$8kF.nVSxdZTC3Za/FK8WT.hbPgxQeE8V3xHGVcrxoFTgFtbCKL4l6', 'uzupelnij', 'uzupelnij', 'uzupelnij', 'uzupelnij', '', 1),
  (NULL, 'Konto administratora', 'uzupelnij', 'administracja', '$2y$10$.HFyeEfk4sAOXIsKNioKSOPq33v90f2Mg.t9jqgT976ThQ8IxikA.', 'uzupelnij', 'uzupelnij', 'uzupelnij', 'uzupelnij', '', 1);

INSERT INTO products VALUES
  (NULL, 'Papiery-powlekane', 'Papiery powlekane - produkt 1', '2', '23.99'),
  (NULL, 'Papiery-powlekane', 'Papiery powlekane - produkt 2', '2', '24.99'),
  (NULL, 'Papiery-powlekane', 'Papiery powlekane - produkt 3', '2', '25.99'),
  (NULL, 'Papiery-powlekane', 'Papiery powlekane - produkt 4', '2', '25.99'),
  (NULL, 'Kartony-graficzne', 'Kartony graficzne - produkt 1', '3', '25.99'),
  (NULL, 'Kartony-graficzne', 'Kartony graficzne - produkt 2', '3', '26.99'),
  (NULL, 'Kartony-graficzne', 'Kartony graficzne - produkt 3', '3', '27.99'),
  (NULL, 'Kartony-opakowaniowe', 'Kartony opakowaniowe - produkt 1', '4', '28.99'),
  (NULL, 'Kartony-opakowaniowe', 'Kartony opakowaniowe - produkt 2', '4', '29.99'),
  (NULL, 'Kartony-opakowaniowe', 'Kartony opakowaniowe - produkt 3', '4', '30.99'),
  (NULL, 'Kartony-opakowaniowe', 'Kartony opakowaniowe - produkt 4', '4', '31.99'),
  (NULL, 'Kartony-opakowaniowe', 'Kartony opakowaniowe - produkt 5', '4', '32.99'),
  (NULL, 'Papiery-etykietowe', 'Papier etykietowy - produkt 1', '5', '33.99'),
  (NULL, 'Papiery-etykietowe', 'Papier etykietowy - produkt 2', '5', '34.99'),
  (NULL, 'Papiery-etykietowe', 'Papier etykietowy - produkt 3', '5', '35.99'),
  (NULL, 'Papiery-samokopiujace', 'Papier samokopiujący - produkt 1', '6', '36.99'),
  (NULL, 'Papiery-samokopiujace', 'Papier samokopiujący - produkt 2', '6', '37.99'),
  (NULL, 'Papiery-samokopiujace', 'Papier samokopiujący - produkt 3', '6', '38.99'),
  (NULL, 'Papiery-samokopiujace', 'Papier samokopiujący - produkt 4', '6', '39.99'),
  (NULL, 'Papier-offsetowy', 'Papier offsetowy - produkt 1', '7', '39.99'),
  (NULL, 'Papier-offsetowy', 'Papier offsetowy - produkt 2', '7', '39.99');
