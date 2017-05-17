CREATE TABLE users (
userID int(11) NOT NULL AUTO_INCREMENT,
user varchar(50) default NULL,
firstName varchar(50) default NULL,
lastName varchar(50) default NULL,
email varchar(50) default NULL,
password varchar(255) default NULL,
salt varchar(255) default NULL,
PRIMARY KEY (userID)

);
