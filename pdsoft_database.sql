--initialize database;
CREATE DATABASE pdsoft;

BACKUP DATABASE pdsoft
TO DISK = 'to be defined';

--enter database;

--assemble tables;

CREATE TABLE User (
        userID INT,
        firstName VARCHAR(60) NOT NULL,
        lastName VARCHAR(60) NOT NULL,
        phone VARCHAR(25) NOT NULL,
        email VARCHAR(80) NOT NULL,
        pass_word VARCHAR(60) NOT NULL,
        accActive BOOLEAN,
        PRIMARY KEY (userID)
    );



CREATE TABLE Customer (
        customerID INT,
        userType BIT NOT NULL,
        personalNIF VARCHAR(60) NOT NULL,
        PRIMARY KEY (customerID),
        CONSTRAINT FK_UserCustomer FOREIGN KEY (customerID)
        REFERENCES User(userID)
    );



CREATE TABLE ServiceProvider (
        providerID INT,
        userID INT NOT NULL,
        companyName VARCHAR(200),
        companyNIF VARCHAR(40),
        providerURL VARCHAR(700),
        PRIMARY KEY (providerID),
        CONSTRAINT FK_UserProvider FOREIGN KEY (userID)
        REFERENCES Customer(customerID)
    );



CREATE TABLE UserLocation (
        locationID INT,
        userID INT,
        userAddress VARCHAR(300) NOT NULL,
        city VARCHAR(70) NOT NULL,
        postalCode VARCHAR(40) NOT NULL,
        CONSTRAINT PK_Location PRIMARY KEY (locationID, userID),
        CONSTRAINT FK_LocationUser FOREIGN KEY (userID)
        REFERENCES User(userID)
    );



CREATE TABLE RestrictedInfo (
        userID INT,
        creditCard INT NOT NULL;
        cardExpMonth DATE NOT NULL;
        cardExpYear DATE NOT NULL;
        billingAddress VARCHAR(300) NOT NULL,
        dateEntered DATE NOT NULL,
        photo LONGBLOB,
        PRIMARY KEY (userID),
        CONSTRAINT FK_RestrictUser FOREIGN KEY (userID)
        REFERENCES User(userID)
    );



CREATE TABLE Category (
        categoryID INT,
        parentID INT NOT NULL,
        catDescription VARCHAR(200) NOT NULL,
        icon MEDIUMBLOB UNIQUE NOT NULL,
        catStatus BOOLEAN,
        PRIMARY KEY (categoryID)
    );



CREATE TABLE Services (
        serviceID INT,
        userID INT NOT NULL,
        servName VARCHAR(100) NOT NULL,
        servDescription VARCHAR(250) NOT NULL,
        categoryID INT NOT NULL,
        discount FLOAT NOT NULL,
        available BOOLEAN,
        /*currentOrder |rethink*/
        active BOOLEAN,
        photo LONGBLOB,
        PRIMARY KEY (serviceID),
        FOREIGN KEY (userID) REFERENCES User(userID),
        FOREIGN KEY (categoryID) REFERENCES Category(categoryID)
    );



CREATE TABLE Price ( 
        priceID INT,
        serviceID INT NOT NULL,
        pricePerHr FLOAT NOT NULL,
        discountAvailable BOOLEAN,
        discount FLOAT NOT NULL,
        startDate DATE NOT NULL,
        endDate DATE NOT NULL,
        variation VARCHAR(100) NOT NULL,
        PRIMARY KEY (priceID),
        CONSTRAINT FK_PriceService FOREIGN KEY (serviceID)
        REFERENCES Services(serviceID)
    );



CREATE TABLE Payment (
        paymentID INT,
        payType VARCHAR(60) NOT NULL,
        payStatus VARCHAR(60) NOT NULL,
        PRIMARY KEY (paymentID)
    );



CREATE TABLE Order (
        orderID INT,
        userID INT NOT NULL,
        paymentID INT NOT NULL,
        creationDate DATE NOT NULL,
        executionDate DATE NOT NULL,
        serviceID INT NOT NULL,
        orderNumber INT NOT NULL,
        locomotionPrice FLOAT NOT NULL,
        total FLOAT NOT NULL,
        nrHrs INT NOT NULL,
        orderStatus VARCHAR(30) NOT NULL,
        PRIMARY KEY (orderID),
        FOREIGN KEY (userID) REFERENCES User(userID),
        FOREIGN KEY (paymentID) REFERENCES Payment(paymentID),
        FOREIGN KEY (serviceID) REFERENCES Services(serviceID)
    );



CREATE TABLE Review (
        reviewID INT,
        orderID INT NOT NULL,
        rating VARCHAR(10) NOT NULL,
        catDescription VARCHAR(250),
        reviewTime DATETIME NOT NULL,
        PRIMARY KEY (reviewID),
        CONSTRAINT FK_ReviewOrder FOREIGN KEY (orderID)
        REFERENCES Order(orderID)
    );