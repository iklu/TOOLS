CREATE TABLE products (
productID int(11) NOT NULL AUTO_INCREMENT,
title varchar(50) default NULL,
type varchar(50) default NULL,
firstname varchar(50) default NULL,
mainname varchar(50) default NULL,
price float default NULL,
discount float default NULL,
productproperty int default NULL,
productkey varchar(255) default NULL,
PRIMARY KEY (productID)

);