-- Create our lesson_03 example database (if it doesn't exist)
CREATE DATABASE IF NOT EXISTS lesson_03;
USE lesson_03; -- Set the database to use for the next commands

-- Create the countries table
CREATE TABLE IF NOT EXISTS countries (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(100) NOT NULL,
  description varchar(2000) NULL,
  population int(15) NOT NULL,
  created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, -- Will auto create a date value
  updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, -- Will auto update the date value
  PRIMARY KEY (`id`)
);