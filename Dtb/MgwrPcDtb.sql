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
-- Customer Feedback Table --
-----------------------------
CREATE TABLE IF NOT EXISTS CustomerFeedbackTbl (
    CustomerID INT PRIMARY KEY,
    Customer_Name VARCHAR(255),
    Feedback TEXT
);



-----------------------------
-- SurveyRespondents Table --
-----------------------------
CREATE TABLE IF NOT EXISTS SurveyRespondents (
    RespondentID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    Age INT
);



---------------------------
-- SurveyQuestions Table --
---------------------------
CREATE TABLE IF NOT EXISTS SurveyQuestions (
    QuestionID INT PRIMARY KEY AUTO_INCREMENT,
    QuestionText TEXT NOT NULL
    Answer10 TEXT
);

INSERT INTO SurveyQuestions (QuestionText) VALUES 
('1. How was your experience with the MGWR PC Online website?'),
('2. What did you like most about the MGWR PC Online website?'),
('3. Would you recommend the MGWR PC Online website to others?'),
('4. What part of the MGWR PC Online website made the most sense to you?'),
('5. How can we make the MGWR PC Online website better for you?'),
('6. Does the kind of device you have affect how well you use the MGWR PC Online website?'),
('7. On a scale of 1 to 10, how likely are you to visit the MGWR PC Online website again in the future?'),
('8. How likely are you to purchase products or services from MGWR PC Online in the future?'),
('9. How would you rate the overall performance of the MGWR PC Online website?'),
('10. Did you encounter any technical issues while using the MGWR PC Online website? If yes, please specify.');



-------------------------
-- SurveyChoices Table --
-------------------------
CREATE TABLE IF NOT EXISTS SurveyChoices (
    ChoiceID INT PRIMARY KEY AUTO_INCREMENT,
    ChoiceText VARCHAR(255) NOT NULL,
    QuestionID INT,
    FOREIGN KEY (QuestionID) REFERENCES SurveyQuestions(QuestionID)
);

INSERT INTO SurveyChoices (ChoiceText, QuestionID) VALUES 
('Excellent', 1),
('Very Good', 1),
('Good', 1),
('Fair', 1),
('Poor', 1),
('Looks & Design', 2),
('Easy to Use', 2),
('Useful Content', 2),
('Fun Features', 2),
('None', 2),
('Definitely', 3),
('Probably', 3),
('Not Sure', 3),
('Probably Not', 3),
('Definitely Not', 3),
('Home', 4),
('About Us', 4),
('Pricelists', 4),
('Feedbacks', 4),
('FAQs', 4),
('It’s PERFECT', 5),
('Faster Loading', 5),
('Easy to Navigate', 5),
('More Interesting Stuff', 5),
('Instructive', 5),
('Helps a Lot', 6),
('Makes it a bit harder', 6),
('Doesn''t Matter', 6),
('Doesn''t Apply to Me', 6),
('1 - 3', 7),
('4 - 6', 7),
('7 - 9', 7),
('10', 7),
('Very likely', 8),
('Likely', 8),
('Neutral', 8),
('Unlikely', 8),
('Very Unlikely', 8),
('Excellent', 9),
('Good', 9),
('Average', 9),
('Below Average', 9),
('Poor', 9);


------------------
-- Survey Table --
------------------
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
