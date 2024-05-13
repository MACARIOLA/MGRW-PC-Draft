-----------------------------------
-- Create the MgwrPcDtb database --
-----------------------------------
CREATE DATABASE IF NOT EXISTS MgwrPcDtb;
USE MgwrPcDtb;



--------------------------------
-- Reservation Contacts Table --
--------------------------------
CREATE TABLE IF NOT EXISTS ReservationContactsTbl (
    ReservationID INT PRIMARY KEY,
    Name VARCHAR(255),
    Email VARCHAR(255),
    ContactNumber VARCHAR(11) CHECK (ContactNumber LIKE '09_________')
);


-----------------------------
-- Product Comments Table --
-----------------------------
CREATE DATABASE IF NOT EXISTS mgwrpcdtb;
USE mgwrpcdtb;

CREATE TABLE IF NOT EXISTS tbl_survey_responses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255),
    age INT,
    experience VARCHAR(255),
    liked_feature VARCHAR(255),
    recommend VARCHAR(255),
    sensible_part VARCHAR(255),
    improvement_suggestion VARCHAR(255),
    device_impact VARCHAR(255),
    likelihood_of_return VARCHAR(255),
    likelihood_of_purchase VARCHAR(255),
    overall_performance VARCHAR(255),
    comment TEXT
);



-----------------------------
-- Product Comments Table --
-----------------------------
CREATE TABLE IF NOT EXISTS ProductComments (
    CommentID INT PRIMARY KEY AUTO_INCREMENT,
    ProductID INT,
    Name VARCHAR(255),
    Comment TEXT,
    FOREIGN KEY (ProductID) REFERENCES Products(ProductID)
);



---------------------
-- PDF Files Table --
---------------------
CREATE TABLE IF NOT EXISTS PdfFiles (
    PdfID INT PRIMARY KEY AUTO_INCREMENT,
    FileName VARCHAR(255) NOT NULL,
    FilePath VARCHAR(255) NOT NULL,
    Description TEXT
);
