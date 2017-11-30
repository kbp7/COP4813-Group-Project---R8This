CREATE TABLE Comment(
	ID int NOT NULL auto_increment,
	MediaID int NOT NULL,
	UserID int NOT NULL,
	CreatedOn datetime NOT NULL,
	Comment varchar(300) NOT NULL,
  PRIMARY KEY (ID));

CREATE TABLE Likes(
  ID int NOT NULL auto_increment,
	MediaID int NOT NULL,
	UserID int NOT NULL,
  PRIMARY KEY(ID));

CREATE TABLE Media(
	ID int NOT NULL auto_increment,
	Title varchar(50) NOT NULL,
	Genre varchar(50) NOT NULL,
	AgeRating varchar(50) NOT NULL,
	Cover varchar(50) NULL,
	MediaType bit NOT NULL,
	ReleaseDate datetime NOT NULL,
  PRIMARY KEY (ID));

CREATE TABLE Review(
	ID int NOT NULL,
	UserID int NOT NULL,
	CreatedOn datetime NOT NULL,
	MediaID int NOT NULL,
	Review varchar(300) NOT NULL,
  PRIMARY KEY (ID));

CREATE TABLE User(
  ID int NOT NULL,
	Username varchar(50) NOT NULL,
	Email varchar(50) NOT NULL,
	Password varchar(50) NOT NULL,
	Admin bit NOT NULL,
  PRIMARY KEY (ID));
