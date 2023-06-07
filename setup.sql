-- CREATE DATABASE IF NOT EXISTS lojinha;
-- USE lojinha;

CREATE TABLE produto (
  id INT PRIMARY KEY AUTO_INCREMENT,
  descri VARCHAR(100),
  val FLOAT,
  expire_date DATE
);

CREATE TABLE user (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(50),
  phone CHAR(11),
  cpf CHAR(11)
);

CREATE TABLE purchase (
	cod INT PRIMARY KEY AUTO_INCREMENT,
  qtd INT,
  dt DATE,
  pag ENUM("V", "P"),
  cod_prod INT,
  id_user INT,
  FOREIGN KEY(id_user) REFERENCES user(id),
  FOREIGN KEY(cod_prod) REFERENCES produto(id)
);

INSERT INTO user (name, phone, cpf) VALUES 
  ("Jorge", "11989899898", "12345678909"), 
  ("Marcelo", "11232332323", "23234545677"), 
  ("Vicente", "11565665656", "74662453622"), 
  ("Victor", "11767676767", "56345265443"), 
  ("Rodrigo", "11090909721", "43235436312");

INSERT INTO produto (descri, val, expire_date) VALUES 
  ("adubo", 10, "2024-05-17"),
  ("buquê de rosas", 25, "2023-05-30"),
  ("buquê de tulipas", 22, "2023-05-30"),
  ("buquê de violetas", 35, "2023-05-30"),
  ("vaso de cerâmica", 80, "2024-05-17"),
  ("regador", 30, "2024-05-17"),
  ("semente de girassol", 5, "2023-05-30");

INSERT INTO purchase (qtd, dt, pag, cod_prod, id_user) VALUES
  (3, "2023-05-16", "V", 2, 1),
  (1, "2023-05-15", "V", 3, 1),
  (2, "2023-05-07", "V", 5, 2),
  (4, "2023-05-02", "P", 4, 3),
  (1, "2023-04-26", "P", 5, 4);

SELECT cod, qtd, dt, pag, cod_prod, descri FROM purchase INNER JOIN produto ON purchase.cod_prod=produto.id WHERE pag = "V";
SELECT cod, qtd, dt, pag, cod_prod, descri FROM purchase INNER JOIN produto ON purchase.cod_prod=produto.id WHERE pag = "P";

SELECT * FROM produto;
SELECT * FROM produto ORDER BY descri;

SELECT * FROM produto WHERE expire_date BETWEEN "2023-04-18" AND "2024-01-20";
