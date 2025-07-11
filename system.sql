CREATE DATABASE repair_web;

USE repair_web;

CREATE TABLE tbl_repair (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100),
  phone VARCHAR(20),
  device VARCHAR(50),
  description TEXT,
  photo VARCHAR(255),
  submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
