SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "Europe/Prague";

DROP DATABASE IF EXISTS electron_releaser;

CREATE DATABASE electron_releaser DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE electron_releaser;

-- Create users table
CREATE TABLE users (
	id INT NOT NULL AUTO_INCREMENT,
	first_name VARCHAR(32) NOT NULL,
	last_name VARCHAR(32) NOT NULL,
	email VARCHAR(64) NOT NULL,
	password TEXT NOT NULL,
	created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	updated_at TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (id)
) ENGINE = InnoDB;

-- Create tokens table
CREATE TABLE tokens (
	id INT NOT NULL AUTO_INCREMENT,
	value TEXT NOT NULL,
	label VARCHAR(32) NOT NULL,
	times_used INT NULL DEFAULT '0',
	created_by INT NOT NULL,
	created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (id)
) ENGINE = InnoDB;

-- Create versions table
CREATE TABLE versions (
	id INT NOT NULL AUTO_INCREMENT,
	version VARCHAR(64) NOT NULL,
	channel VARCHAR(10) NULL DEFAULT NULL,
	release_name TEXT NULL DEFAULT NULL,
	release_notes TEXT NULL DEFAULT NULL,
	is_public BOOLEAN NOT NULL DEFAULT FALSE,
	created_by INT NOT NULL,
	updated_by INT NOT NULL,
	created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	updated_at TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (id)
) ENGINE = InnoDB;

-- Create assets table
CREATE TABLE assets (
	id INT NOT NULL AUTO_INCREMENT,
	version_id INT NOT NULL,
	win_download TEXT NOT NULL,
	mac_download TEXT NOT NULL,
	win_update TEXT NOT NULL,
	mac_update TEXT NOT NULL,
	win_download_hash TEXT NOT NULL,
	mac_download_hash TEXT NOT NULL,
	win_update_hash TEXT NOT NULL,
	mac_update_hash TEXT NOT NULL,
	PRIMARY KEY (id)
) ENGINE = InnoDB;

-- Create user "John Doe" with password "password"
INSERT INTO users (
	id, first_name, last_name, email, password
) VALUES (
	NULL, 'John', 'Doe', 'john@doe.com', '$2y$10$j50ile9utddYiMt2fMRm8.FhNmbNHzfip18w69lWkdBBq4jodULqi');
