
#create tables

DROP TABLE DocPriceBody;
DROP TABLE DocPrice;
DROP TABLE Product;

CREATE TABLE IF NOT EXISTS Product (
	id int AUTO_INCREMENT NOT NULL PRIMARY KEY,
	title varchar(20) NOT NULL,
	description varchar(20) DEFAULT NULL,
	product_status int NOT NULL 
)ENGINE=InnoDB CHARACTER SET=UTF8;

CREATE TABLE IF NOT EXISTS DocPrice (
	id int AUTO_INCREMENT NOT NULL PRIMARY KEY,
	create_datetime datetime NOT NULL,
	price_status int NOT NULL
)ENGINE=InnoDB CHARACTER SET=UTF8;

CREATE TABLE IF NOT EXISTS DocPriceBody (
	id int AUTO_INCREMENT NOT NULL PRIMARY KEY,
	doc_id int NOT NULL,
	product_id int NOT NULL,
	price decimal(10,2),
	FOREIGN KEY (doc_id) REFERENCES DocPrice(id),
	FOREIGN KEY (product_id) REFERENCES Product(id)
)ENGINE=InnoDB CHARACTER SET=UTF8;

INSERT INTO Product (title, description, product_status)
	VALUES ('umbrella','save from rain', 1),
	       ('table', 'table is table',0),
		   ('book', 'for reading', 0),
		   ('paper','few papers', 0),
		   ('pencil', 'for art', 1),
		   ('pen', 'for writing',0),
		   ('tea', 'its tasty',0);

INSERT INTO DocPrice (create_datetime, price_status)
	VALUES ('2017-05-13 14:22:23', 1),
		   ('2017-05-16 15:23:54', 0),
		   ('2017-05-16 15:54:54', 1),
		   ('2017-05-17 02:16:03', 0),
		   ('2017-05-18 03:45:28', 1),
		   ('2017-05-16 12:12:12', 1);

INSERT INTO DocPriceBody (doc_id, product_id, price)
	VALUES (1, 1, 0.6);

INSERT INTO DocPriceBody (doc_id, product_id, price)
	VALUES (1, 2, 1.5),
		   (2, 3, 0.5),
		   (1 ,4 ,0.6),
		   (4, 5, 0.6),
		   (3, 2, 0.8),
		   (4, 2, 1.23);

INSERT INTO DocPriceBody (doc_id, product_id, price)
	VALUES (1,4,2.05),
		   (1,5,6.33),
		   (1,1,5.1);

INSERT INTO DocPriceBody (doc_id, product_id, price)
	VALUES (1,5,0.95);


SELECT t1.title as Title, t2.price as Price 
	FROM Product as t1, DocPriceBody as t2 
	INNER JOIN Product as t ON t2.product_id = t.id; 


SELECT title, description, doc_id, date(create_datetime), price 
	FROM DocPriceBody dpc 
	INNER JOIN Product as pr ON dpc.product_id = pr.id 
    INNER JOIN DocPrice as dp ON dpc.doc_id = dp.id 
    WHERE date(create_datetime) = "2017-05-13"
    GROUP BY title
    HAVING max(dpc.id)