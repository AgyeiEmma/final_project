-- Check your privileges


-- Drop the database if it exists
DROP DATABASE IF EXISTS booking_system_new;

-- Create the database
CREATE DATABASE booking_system_new;

-- Use the database
USE booking_system_new;


-- Create the Users table
CREATE TABLE Admin (
    Name VARCHAR(100) NOT NULL,
    Email VARCHAR(100) NOT NULL UNIQUE, -- Ensure email uniqueness
    Password VARCHAR(20),
    Role VARCHAR(50) NOT NULL DEFAULT 'admin' -- User role (user or admin)
);

CREATE TABLE Users (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(100) NOT NULL,
    Email VARCHAR(100) NOT NULL UNIQUE, -- Ensure email uniqueness
    Phone VARCHAR(20),
    Role VARCHAR(50) NOT NULL DEFAULT 'user' -- User role (user or admin)
);
ALTER TABLE Users ADD COLUMN Password VARCHAR(255) NOT NULL;

-- Create the Events table
CREATE TABLE Events (
    EventID INT AUTO_INCREMENT PRIMARY KEY,
    EventName VARCHAR(200) NOT NULL,
    Image VARCHAR(200) DEFAULT NULL,
    EventDate DATE NOT NULL, -- Ensure event dates are in the future
    Venue VARCHAR(200) NOT NULL
);

DELIMITER //
CREATE TRIGGER check_event_date
BEFORE INSERT ON Events
FOR EACH ROW
BEGIN
    IF NEW.EventDate < CURDATE() THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Event date must be in the future';
    END IF;
END //
DELIMITER ;

-- Create the Pins table
CREATE TABLE Pins (
    PinID INT AUTO_INCREMENT PRIMARY KEY,
    Pin VARCHAR(10) UNIQUE NOT NULL,
    EventID INT NOT NULL,
    IsUsed BOOLEAN NOT NULL DEFAULT 0, -- Flag to indicate if the pin has been used
    UsedBy INT, -- UserID of the person who used the pin
    IssuedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Timestamp when the pin was issued
    FOREIGN KEY (EventID) REFERENCES Events(EventID),
    FOREIGN KEY (UsedBy) REFERENCES Users(UserID)
);


-- Create the Bookings table
CREATE TABLE Bookings (
    BookingID INT AUTO_INCREMENT PRIMARY KEY,
    EventID INT NOT NULL,
    Seat VARCHAR(200) NOT NULL,
    Price VARCHAR(200) NOT NULL,
    BookingDate DATE NOT NULL,
    UserID INT NOT NULL,
    FOREIGN KEY (EventID) REFERENCES Events(EventID) ON DELETE CASCADE,
    FOREIGN KEY (UserID) REFERENCES Users(UserID) ON DELETE CASCADE
);



-- Create the UserRoles table
CREATE TABLE UserRoles (
    RoleID INT AUTO_INCREMENT PRIMARY KEY,
    RoleName VARCHAR(50) NOT NULL UNIQUE,
    Permissions TEXT NOT NULL -- Adjusted to TEXT to accommodate potentially large JSON data
);
CREATE TABLE AuditLogs (
    LogID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT, -- Assuming you're tracking which admin user made the change
    ActionType VARCHAR(50),
    Description TEXT,
    LogDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert user roles and permissions
INSERT INTO UserRoles (RoleName, Permissions) VALUES
    ('user', '["book_seats"]'),
    ('admin', '["manage_events", "manage_venues", "manage_seat_categories", "manage_bookings", "generate_pins", "view_reports"]');

INSERT INTO Admin (Name, Email, Password) VALUES
    ('Emmanuel Agyei', 'emmanuel.agyei@gmail.com', 'admin1234');