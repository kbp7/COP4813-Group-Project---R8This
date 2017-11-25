ALTER TABLE `Comment`
  ADD CONSTRAINT `FK_CommentUser` FOREIGN KEY (`UserID`) REFERENCES `User` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `Comment`
  ADD CONSTRAINT `FK_CommentMedia` FOREIGN KEY (`MediaID`) REFERENCES `Media` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `Likes`
  ADD CONSTRAINT `FK_LikesUser` FOREIGN KEY (`UserID`) REFERENCES `User` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `Likes`
  ADD CONSTRAINT `FK_LikesMedia` FOREIGN KEY (`MediaID`) REFERENCES `Media` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `Review`
  ADD CONSTRAINT `FK_ReviewUser` FOREIGN KEY (`UserID`) REFERENCES `User` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `Review`
  ADD CONSTRAINT `FK_ReviewMedia` FOREIGN KEY (`MediaID`) REFERENCES `Media` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
INSERT INTO Media (Title, Genre, AgeRating, Cover, MediaType, ReleaseDate) VALUES ("Baby Driver", "Action", "R", NULL, 0, "2017-06-28 00:00:00.000");
INSERT INTO User (ID, Username, Email, Password, Admin) VALUES (1, "ratemaster", "group8@email.com", "octo", 1);
INSERT INTO Review (UserID, CreatedOn, MediaID, Review) VALUES (1, "2017-11-12 15:14:49.973", 1, "Talented getaway driver Baby relies on the beat of his own track to be the best in the game. After meeting the woman of his dreams, he sees a chance to ditch his shady lifestyle and make a clean break. Coerced into working for a crime boss, Baby must face the music as a doomed heist threatens his life.");
INSERT INTO Media (Title, Genre, AgeRating, Cover, MediaType, ReleaseDate) VALUES ("It", "Thriller", "R", NULL, 0, "2017-09-08 00:00:00.000");
INSERT INTO Media (Title, Genre, AgeRating, Cover, MediaType, ReleaseDate) VALUES ("Get Out", "Mystery", "R", NULL, 0, "2017-02-24 00:00:00.000");
INSERT INTO User (Username, Email, Password, Admin) VALUES ("bob.smith", "bob.smith@gmail.com", "movie1", 0);
INSERT INTO User (ID, Username, Email, Password, Admin) VALUES (2, "lisa.long", "lisa.long@gmail.com", "movie1", 0);
INSERT INTO Comment (ID, MediaID, UserID, CreatedOn, Comment) VALUES (1, 1, 2, "2017-11-12 15:14:49.973", "If you want to see John Hamm going HAM and Kevin Spacey quoting Monsters Inc. then this is the movie for you");
INSERT INTO Likes (ID, MediaID, UserID) VALUES (1, 1, 2);
INSERT INTO Likes (ID, MediaID, UserID) VALUES (2, 2, 2);
INSERT INTO User (ID, Username, Email, Password, Admin) VALUES (3, "john.tomspn", "jonny@gmail.com", "movie1", 0);
INSERT INTO User (ID, Username, Email, Password, Admin) VALUES (4, "wallace.porter", "wport@gmail.com", "movie1", 0);
INSERT INTO User (ID, Username, Email, Password, Admin) VALUES (5, "felicia.lock", "byefelicia@gmail.com", "movie1", 0);
INSERT INTO Media (Title, Genre, AgeRating, Cover, MediaType, ReleaseDate) VALUES ("Flatliners", "Science Fiction", "PG13", NULL, 0, "2017-09-29 00:00:00.000");
INSERT INTO Media (Title, Genre, AgeRating, Cover, MediaType, ReleaseDate) VALUES ("Justice League", "Science Fiction", "PG13", NULL, 0, "2017-11-17 00:00:00.000");
INSERT INTO Media (Title, Genre, AgeRating, Cover, MediaType, ReleaseDate) VALUES ("Zootopia", "Mystery", "PG", NULL, 0, "2016-03-04 00:00:00.000");
INSERT INTO Media (Title, Genre, AgeRating, Cover, MediaType, ReleaseDate) VALUES ("Deadpool", "Comedy", "R", NULL, 0, "2016-02-12 00:00:00.000");
INSERT INTO Comment (ID, MediaID, UserID, CreatedOn, Comment) VALUES (2, 2, 3, NOW(), "Average but not nearly as scary as it was played up to be");
INSERT INTO Comment (ID, MediaID, UserID, CreatedOn, Comment) VALUES (3, 3, 5, NOW(), "A must see comic book movie experience!!");
INSERT INTO Likes (ID, MediaID, UserID) VALUES (3, 3, 5);
INSERT INTO Likes (ID, MediaID, UserID) VALUES (4, 3, 4);
INSERT INTO Media (Title, Genre, AgeRating, Cover, MediaType, ReleaseDate) VALUES ("Destiny 2", "Action", "R", NULL, 1, "2017-09-06 00:00:00.000");
INSERT INTO Media (Title, Genre, AgeRating, Cover, MediaType, ReleaseDate) VALUES ("Prey", "Action", "R", NULL, 1, "2017-05-05 00:00:00.000");