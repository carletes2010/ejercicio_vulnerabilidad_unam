CREATE DATABASE IF NOT EXISTS sasno;
USE sasno;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(50),
    role VARCHAR(20)
);

CREATE TABLE flags (
    id INT AUTO_INCREMENT PRIMARY KEY,
    flag VARCHAR(100)
);

INSERT INTO users (username, password, role) VALUES
('operador', '1234', 'user'),
('admin_sasno', 'sismo2024', 'admin');

INSERT INTO flags (flag) VALUES
('FLAG{SASNO_flag_nivel_1}'),
('FLAG{SASNO_flag_nivel_2}'),
('FLAG{SASNO_flag_final}');
