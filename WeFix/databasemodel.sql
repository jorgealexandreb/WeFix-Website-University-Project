
CREATE DATABASE pdsoft1;

CREATE TABLE `User`(
    `userID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(255) NOT NULL,
    `firstName` VARCHAR(255) NOT NULL,
    `lastName` VARCHAR(255) NOT NULL,
    `userType` INT NOT NULL,
    `phone` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `accActive` TINYINT(1) NOT NULL,
    `personalNIF` INT NOT NULL,
    PRIMARY KEY (`userID`)
);

CREATE TABLE `Category`(
    `categoryID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `description` VARCHAR(255) NOT NULL,
    `icon` CHAR(36) NOT NULL,
    `status` TINYINT(1) NOT NULL,
    PRIMARY KEY (`categoryID`)
);

CREATE TABLE `Service Provider`(
    `serviceProviderID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `userID` INT UNSIGNED NOT NULL,
    `companyName` VARCHAR(255) NOT NULL,
    `companyNIF` INT NOT NULL,
    PRIMARY KEY (`serviceProviderID`),
    FOREIGN KEY (`userID`) REFERENCES `User` (`userID`)
);

CREATE TABLE `Service`(
    `serviceID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `serviceproviderID` INT UNSIGNED 	NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `description` VARCHAR(255) NOT NULL,
    `categoryID` INT UNSIGNED NOT NULL,
    `discount` DOUBLE(8, 2) NOT NULL,
    `available` TINYINT(1) NOT NULL,
    `currentOrder` VARCHAR(255) NOT NULL,
    `active` TINYINT(1) NOT NULL,
    `photo` BLOB NOT NULL,
    `locomotionPrice` DOUBLE(8, 2) NOT NULL,
    PRIMARY KEY (`serviceID`),
    FOREIGN KEY (`serviceproviderID`) REFERENCES `service provider`(`serviceProviderID`),
    FOREIGN KEY(`categoryID`) REFERENCES `Category`(`categoryID`)
);

CREATE TABLE `Payment`(
    `paymentID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `type` VARCHAR(255) NOT NULL,
    `status` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`paymentID`)
);

CREATE TABLE `Order`(
    `orderID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `userID` INT UNSIGNED NOT NULL,
    `paymentID` INT UNSIGNED NOT NULL,
    `creationDate` TIMESTAMP NOT NULL,
    `serviceID` INT UNSIGNED NOT NULL,
    `executionDate` DATE NOT NULL,
    `number` INT NOT NULL,
    `total` DOUBLE(8, 2) NOT NULL,
    `nrHrs` INT NOT NULL,
    `status` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`orderID`),
    FOREIGN KEY(`userID`) REFERENCES `User`(`userID`),
    FOREIGN KEY(`serviceID`) REFERENCES `Service`(`serviceID`),
    FOREIGN KEY(`paymentID`) REFERENCES `Payment`(`paymentID`)
);
    
CREATE TABLE `Review`(
    `reviewID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `orderID` INT UNSIGNED NOT NULL,
    `rating` VARCHAR(255) NOT NULL,
    `description` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`reviewID`),
    FOREIGN KEY(`orderID`) REFERENCES `Order`(`orderID`)
);

CREATE TABLE `Price`(
    `priceID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `serviceID` INT UNSIGNED NOT NULL,
    `pricePerHr` DOUBLE(8, 2) NOT NULL,
    `discountAvailability` TINYINT(1) NOT NULL,
    `startDate` DATETIME NOT NULL,
    `endDate` DATETIME NOT NULL,
    `variation` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`priceID`),
    FOREIGN KEY(`serviceID`) REFERENCES `Service`(`serviceID`)
);

CREATE TABLE `Restricted Info`(
    `infoID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `userID` INT UNSIGNED NOT NULL,
    `creditCard` INT NOT NULL,    
    `billingAddress` VARCHAR(255) NOT NULL,
    `dateEntered` TIMESTAMP NOT NULL,
    `cardExp` DATETIME,
    PRIMARY KEY (`infoID`),
    FOREIGN KEY(`userID`) REFERENCES user(`userID`)
);

CREATE TABLE userlocation(
    `locationID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `userID` INT UNSIGNED NOT NULL,
    `addresss` VARCHAR(100) NOT NULL,
    `city` VARCHAR(50) NOT NULL,
    `postal_code` INT NOT NULL,
    PRIMARY KEY (`locationID`),
    FOREIGN KEY (`userID`) REFERENCES user (`userID`)
);
INSERT INTO user
VALUES (NULL, 'client1', 'Cliente', 'De Compras', 0, '9600000', 'client@gmail.com', '123', 0, 333333333);
INSERT INTO user
VALUES (NULL, 'professional1', 'Service', 'Provider', 1, '9600001', 'provider@gmail.com', '123', 0, 333333334);
INSERT INTO user
VALUES (NULL, 'client2', 'Cliente2', 'De Compras', 0, '9600002', 'client2@gmail.com', '123', 0, 333333335);
INSERT INTO category
VALUES (NULL, 'Home', '', 0);
INSERT INTO category
VALUES (NULL, 'Software', '', 0);
INSERT INTO category
VALUES (NULL, 'Animals', '', 0);
INSERT INTO category
VALUES (NULL, 'Lighting', '', 0);
INSERT INTO `Service Provider`
VALUES (NULL, 2, 3333335, 'APSA');
















