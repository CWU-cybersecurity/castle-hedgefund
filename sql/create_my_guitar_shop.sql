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

-- Seed the database with a full roster
INSERT INTO customers (email_address, password, first_name, last_name, ssn, isAdmin) VALUES
-- Administrative / IT (High Value Targets)
('carter@castlehedgefund.com', MD5('admin123'), 'Carter', 'Briggs', '123456789', TRUE),
('sarah@castlehedgefund.com', MD5('supersecure1'), 'Sarah', 'Chen', '111223333', TRUE),

-- General Employees (Lower Privilege Targets for Sniffing)
('jimmy@castlehedgefund.com', MD5('password123'), 'Jimmy', 'Bee', '987654321', FALSE),
('marcus@castlehedgefund.com', MD5('castle2024'), 'Marcus', 'Vance', '555001234', FALSE),
('jenny@castlehedgefund.com', MD5('cupcake'), 'Jenny', 'Miller', '444119999', FALSE),
('travis@castlehedgefund.com', MD5('football'), 'Travis', 'Scott', '222884444', FALSE),
('elena@castlehedgefund.com', MD5('gooner'), 'Elena', 'Rodriguez', '333775555', FALSE),
('david@castlehedgefund.com', MD5('ilovecats'), 'David', 'Whitman', '666228888', FALSE),
('linda@castlehedgefund.com', MD5('monkey'), 'Linda', 'Park', '777331111', FALSE),
('brad@castlehedgefund.com', MD5('welcome'), 'Brad', 'Wilson', '888442222', FALSE);

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