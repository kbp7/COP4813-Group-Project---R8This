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

/**-------  Add Images to Media  ------------**/

UPDATE Media SET Cover = 'BabyDriver.jpg' WHERE Title = 'Baby Driver';
UPDATE Media SET Cover = 'ItAlt.jpg' WHERE Title = 'It';
UPDATE Media SET Cover = 'GetOut.jpg' WHERE Title = 'Get Out';
UPDATE Media SET Cover = 'Flatliners.jpg' WHERE Title = 'Flatliners';
UPDATE Media SET Cover = 'Logan.jpg' WHERE Title = 'Logan';
UPDATE Media SET Cover = 'JusticeLeague.jpg' WHERE Title = 'Justice League';
UPDATE Media SET Cover = 'Zootopia.jpg' WHERE Title = 'Zooptopia';
UPDATE Media SET Cover = 'Deadpool.jpeg' WHERE Title = 'Deadpool';
UPDATE Media SET Cover = 'Destiny2.jpg' WHERE Title = 'Destiny 2';
UPDATE Media SET Cover = 'Prey.png' WHERE Title = 'Prey';

/**------- Add Reviews ------------**/


INSERT INTO Review (ID, UserID, CreatedOn, MediaID, Review) VALUES (1,1, "2017-10-21 23:21:40.800", 3, "Blending race-savvy satire ith horror to especially potent effect, this bombshell social critique from first time director Jordan Peele proves positively fearless."); 
INSERT INTO Review (ID, UserID, CreatedOn, MediaID, Review) VALUES (2,1, "2017-11-29 16:20:45.600", 4, "Flatliners is a remake of a 1990 thriller about medical students who flatline to try to find out what happens after death. The original movie was smart enough to know how ridiculous it was, but this remake lacks that self-awareness.");
INSERT INTO Review (ID, UserID, CreatedOn, MediaID, Review) VALUES (3,1, "2017-11-30 18:20:45.777", 5, "The best wolverine movie yet! Grown up, ballsy, character-driven and grounded. It feels right that it should be the last one, but it also feels a bit of a shame");
INSERT INTO Review (ID, UserID, CreatedOn, MediaID, Review) VALUES (4,1, "2017-11-23 23:20:45.744", 6, "The newest superhero jam from DC Comics is looser, goosier and certainly more watchable than the last one, though the bar could scarcely have been lower."); 
INSERT INTO Review (ID, UserID, CreatedOn, MediaID, Review) VALUES (5,1, "2017-11-22 22:20:45.722", 7, "Clever and heartwarming, this animated adventure is equal parts buddy-cop comedy, fish-out-of-water tale, and whodunit mystery.");
INSERT INTO Review (ID, UserID, CreatedOn, MediaID, Review) VALUES (6,1, "2017-11-11 54:20:45.455", 8, "Still, Deadpool is party time for action junkies and Reynolds may just have found the role that makes his career."); 
INSERT INTO Review (ID, UserID, CreatedOn, MediaID, Review) VALUES (7,1, "2017-11-12 34:20:45.655", 9, "Destiny 2 succeeds where the original failed the most: its delivery of a story-driven campaign good enough to match its finely tuned first-person shooter gameplay and great looks. "); 
INSERT INTO Review (ID, UserID, CreatedOn, MediaID, Review) VALUES (8,1, "2017-11-23 33:20:45.230", 10, "The first hours of Prey are enticing, with a mind-bending psychological opening scene that foreshadows a story more interesting than what the main plot ends up being");

INSERT INTO Review (ID, UserID, CreatedOn, MediaID, Review) VALUES (10,1, "2017-10-21 23:21:40.800", 2, "Seven young outcasts in Derry, Maine, are about to face their worst nightmare -- an ancient, 
shape-shifting evil that emerges from the sewer every 27 years to prey on the town's children. Banding together over the 
course of one horrifying summer, the friends must overcome their own personal fears 
to battle the murderous, bloodthirsty clown known as Pennywise. But Pennywise, the dancing clown who 
tracks down and torments the children of small-town Maine, is deeply unsettling. What Bill Skarsgard does with the 
role works well precisely because he doesn’t appear to be laboring 
so hard to frighten us. He doesn’t vamp it up. He’s coy—he toys with these kids—making his sudden bursts 
of insane clown hostility that much more shocking."); 









