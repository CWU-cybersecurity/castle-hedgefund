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
    isAdmin               BOOLEAN        NOT NULL,
    CONSTRAINT customers_pk
        PRIMARY KEY (customer_id)
) ENGINE INNODB
;

SET FOREIGN_KEY_CHECKS=1;

INSERT INTO customers (email_address, password, first_name, last_name, ssn, isAdmin) VALUES
('admin@castlehedgefund.com', 'admin123', 'Admin', 'User', '123456789', TRUE);