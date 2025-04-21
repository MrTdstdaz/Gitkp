CREATE DATABASE click_counter CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE click_counter;

CREATE TABLE users (
    email VARCHAR(255) PRIMARY KEY
);

CREATE TABLE counter (
    id INT PRIMARY KEY,
    count INT NOT NULL DEFAULT 0
);

INSERT INTO counter (id, count) VALUES (1, 0);