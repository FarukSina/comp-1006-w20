CREATE DATABASE IF NOT EXISTS Project_01;
USE Project_01;

CREATE TABLE IF NOT EXISTS supers (
	id int(11) NOT NULL AUTO_INCREMENT,
    first_name varchar(100) NOT NULL,
    last_name varchar(20) NOT NULL,
    date_of_birth varchar(30) NOT NULL,
    created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE
    CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);