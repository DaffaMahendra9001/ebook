CREATE DATABASE IF NOT EXISTS user_login;
USE user_login;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') NOT NULL
);


-- Insert data admin dan user
INSERT INTO users (username, password, role) VALUES
('admin', MD5('admin123'), 'admin'),
('user', MD5('User123'), 'user');
