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

-- Seed the database with users
INSERT INTO customers (email_address, password, first_name, last_name, ssn, isAdmin) VALUES
-- Admin User: password is 'admin123'
('carter@castlehedgefund.com', MD5('admin123'), 'Carter', 'Briggs', '123456789', TRUE),

-- Lower Employee: password is 'password123'
('jimmy@castlehedgefund.com', MD5('password123'), 'Jimmy', 'Bee', '987654321', FALSE);

-- A sensitive table for the UNION SELECT SQL injection attack
CREATE TABLE secret_assets (
    id              INT AUTO_INCREMENT PRIMARY KEY,
    asset_name      VARCHAR(255),
    valuation       VARCHAR(50)
);

INSERT INTO secret_assets (asset_name, valuation) VALUES
('Offshore Account Alpha', '$2,500,000'),
('Cayman Holdings', '$12,450,000'),
('Crypto Cold Wallet', '$500,000');