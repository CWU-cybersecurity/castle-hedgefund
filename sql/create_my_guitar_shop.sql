/********************************************************
* This script creates the database named my_guitar_shop 
*********************************************************/

DROP DATABASE IF EXISTS my_guitar_shop;
CREATE DATABASE my_guitar_shop;
USE my_guitar_shop;

-- create the tables for the database
CREATE TABLE customers (
    customer_id           INT                           AUTO_INCREMENT,
    email_address         VARCHAR(255)   NOT NULL       UNIQUE,
    password              VARCHAR(255)   NOT NULL,
    first_name            VARCHAR(60)    NOT NULL,
    last_name             VARCHAR(60)    NOT NULL,
    ssn                   CHAR(9)        NOT NULL,
    CONSTRAINT customers_pk
        PRIMARY KEY (customer_id)
) ENGINE INNODB
;

SET FOREIGN_KEY_CHECKS=1;

DROP USER IF EXISTS 'CS351user'@'localhost';

CREATE USER 'CS351user'@'localhost'
IDENTIFIED BY ''
;

GRANT ALL 
ON my_guitar_shop.* 
TO 'CS351user'@'localhost'
;

