-- Create the MgwrPcDtb database --
CREATE DATABASE IF NOT EXISTS MgwrPcDtb;
USE MgwrPcDtb;

-- Reservation Contacts Table --
CREATE TABLE IF NOT EXISTS ReservationContactsTbl (
    ReservationID INT PRIMARY KEY,
    Name VARCHAR(255),
    Email VARCHAR(255),
    ContactNumber VARCHAR(11) CHECK (ContactNumber LIKE '09_________')
);

-- Customer Feedback Table --
CREATE TABLE IF NOT EXISTS CustomerFeedbackTbl (
    CustomerID INT PRIMARY KEY,
    Customer_Name VARCHAR(255),
    Feedback TEXT
);

-- SurveyQuestions Table --
CREATE TABLE IF NOT EXISTS SurveyQuestions (
    QuestionID INT PRIMARY KEY AUTO_INCREMENT,
    QuestionText TEXT NOT NULL
);

-- SurveyChoices Table --
CREATE TABLE IF NOT EXISTS SurveyChoices (
    ChoiceID INT PRIMARY KEY AUTO_INCREMENT,
    ChoiceText VARCHAR(255) NOT NULL
);

-- Survey Table --
CREATE TABLE IF NOT EXISTS Survey (
    ResponseID INT PRIMARY KEY AUTO_INCREMENT,
    QuestionID INT,
    QuestionText TEXT NOT NULL,
    ChoiceID INT,
    ChoiceText VARCHAR(255) NOT NULL,
    CustomerID INT, 
    FOREIGN KEY (QuestionID) REFERENCES SurveyQuestions(QuestionID),
    FOREIGN KEY (ChoiceID) REFERENCES SurveyChoices(ChoiceID)
);

-- Admin Login Table --
CREATE TABLE IF NOT EXISTS AdminLogin (
    AdminID INT PRIMARY KEY AUTO_INCREMENT,
    Username VARCHAR(255) UNIQUE NOT NULL,
    Password VARCHAR(255) NOT NULL
);