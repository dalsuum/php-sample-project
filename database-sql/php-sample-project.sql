-- CREATE DATABASE 'project'; in phpMyAdmin
-- copy and run the sql scritp in phpMyAdmin
-- cmake . -DDEFAULT_CHARSET=utf8 \
--  DDEFAULT_COLLATION=utf8_general_ci
-- ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS roles (
id int NOT NULL AUTO_INCREMENT,
  name varchar(255),
  value int NOT NULL,
  PRIMARY KEY (id)
);


INSERT INTO roles(name, value) VALUES
('User',1);
INSERT INTO roles(name, value) VALUES
('Manager',2);
INSERT INTO roles(name, value) VALUES
('Admin',3);



CREATE TABLE IF NOT EXISTS users (
  id int NOT NULL AUTO_INCREMENT,
  name varchar(255),
  email varchar(255),
  phone varchar(255),
  address TEXT,
  password varchar(255) NOT NULL,
  role_id INT DEFAULT 1,
  suspended INT DEFAULT 0,
  created_at DATETIME,
  updated_at DATETIME NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (role_id) REFERENCES roles(id)

);




