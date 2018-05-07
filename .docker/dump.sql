SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "Europe/Prague";

CREATE DATABASE electron_releaser DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE electron_releaser;

-- Create users table
CREATE TABLE users (
	id INT NOT NULL AUTO_INCREMENT,
	first_name VARCHAR(32) NOT NULL,
	last_name VARCHAR(32) NOT NULL,
	email VARCHAR(64) NOT NULL,
	password TEXT NOT NULL,
	PRIMARY KEY (id)
) ENGINE = InnoDB;

-- Create upload_tokens table
CREATE TABLE upload_tokens (
	id INT NOT NULL AUTO_INCREMENT,
	value TEXT NOT NULL,
	label VARCHAR(32) NOT NULL,
	created_by INT NOT NULL,
	created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	used_times INT NOT NULL DEFAULT '0',
	PRIMARY KEY (id)
) ENGINE = InnoDB;

-- Create user "John Doe" with password "password"
INSERT INTO users (
	id, first_name, last_name, email, password
) VALUES (
	NULL, 'John', 'Doe', 'john@doe.com', '$2y$10$j50ile9utddYiMt2fMRm8.FhNmbNHzfip18w69lWkdBBq4jodULqi');
