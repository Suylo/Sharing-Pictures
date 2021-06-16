CREATE TABLE user
(
    userID       int auto_increment,
    firstName    varchar(50),
    lastName     varchar(50),
    Address      varchar(50),
    PostalCode   varchar(50),
    BirthDate    date,
    Email        varchar(50),
    Password     varchar(128),
    creationDate date,
    PRIMARY KEY (userID)
);

CREATE TABLE photo
(
    pictureID int auto_increment,
    caption   varchar(50),
    url       mediumtext,
    fk_userID int,
    PRIMARY KEY (pictureID),
    FOREIGN KEY (fk_userID) REFERENCES user (userID)
);

CREATE TABLE favorite
(
    userID    int,
    pictureID int,
    PRIMARY KEY (userID, pictureID),
    FOREIGN KEY (userID) REFERENCES user (userID),
    FOREIGN KEY (pictureID) REFERENCES photo (pictureID)
);

CREATE TABLE comment
(
    commentID   INT AUTO_INCREMENT,
    userID      INT NOT NULL,
    pictureID   INT NOT NULL,
    dateComment DATETIME,
    Comment     VARCHAR(255),
    PRIMARY KEY (commentID),
    FOREIGN KEY (userID) REFERENCES user (userID),
    FOREIGN KEY (pictureID) REFERENCES photo (pictureID)
);

insert into user (firstName, lastName, Address, PostalCode, BirthDate, Email, Password, creationDate)
values ('Michelle', 'Dupont', '5 rue de la République', '75000', '1999-12-06', 'michelle.dupont@example.fr',
        'motdepasse', '2021-04-07');

insert into user (firstName, lastName, Address, PostalCode, BirthDate, Email, Password, creationDate)
values ('Claude', 'François', '9 avenue de la République', '75000', '2000-01-02', 'claude.francois@example.com', 'motdepasse2',
        '2021-04-07');

insert into user (firstName, lastName, Address, PostalCode, BirthDate, Email, Password, creationDate)
values ('Emmanuel', 'Macron', '8 rue des champs', '75000', '1935-06-08', 'emmanuel.macron@example.fr', 'motdepasse3',
        '2021-04-07');


-- USER 1
insert into photo (caption, url, fk_userID)
values ('Photo numéro 1', 'img/1.jpg', 1);
insert into photo (caption, url, fk_userID)
values ('Photo numéro 2', 'img/2.jpg', 1);
insert into photo (caption, url, fk_userID)
values ('Photo numéro 3', 'img/3.jpg', 1);
insert into photo (caption, url, fk_userID)
values ('Photo numéro 4', 'img/4.jpg', 1);
insert into photo (caption, url, fk_userID)
values ('Photo numéro 5', 'img/8.jpg', 1);
insert into photo (caption, url, fk_userID)
values ('Photo numéro 6', 'img/6.jpg', 1);
insert into photo (caption, url, fk_userID)
values ('Photo numéro 7', 'img/7.jpg', 1);
insert into photo (caption, url, fk_userID)
values ('Photo numéro 8', 'img/5.jpg', 1);
insert into photo (caption, url, fk_userID)
values ('Photo numéro 9', 'img/9.jpg', 1);
insert into photo (caption, url, fk_userID)
values ('Photo numéro 10', 'img/10.jpg', 1);

-- USER 2
insert into photo (caption, url, fk_userID)
values ('Photo numéro 1', 'img/1.jpg', 2);
insert into photo (caption, url, fk_userID)
values ('Photo numéro 2', 'img/2.jpg', 2);
insert into photo (caption, url, fk_userID)
values ('Photo numéro 3', 'img/3.jpg', 2);
insert into photo (caption, url, fk_userID)
values ('Photo numéro 4', 'img/4.jpg', 2);
insert into photo (caption, url, fk_userID)
values ('Photo numéro 5', 'img/8.jpg', 2);

insert into favorite (userID, pictureID)
values (1, 1);
insert into favorite (userID, pictureID)
values (1, 2);
insert into favorite (userID, pictureID)
values (1, 3);
insert into favorite (userID, pictureID)
values (1, 4);
insert into favorite (userID, pictureID)
values (1, 5);

insert into favorite (userID, pictureID)
values (2, 10);
insert into favorite (userID, pictureID)
values (2, 16);

insert into favorite (userID, pictureID)
values (3, 1);
insert into favorite (userID, pictureID)
values (3, 3);
insert into favorite (userID, pictureID)
values (3, 4);
insert into favorite (userID, pictureID)
values (3, 2);


insert into comment (userID, pictureID, dateComment, Comment)
values (2, 2, CURRENT_TIMESTAMP(), 'Commentaire no 1');
insert into comment (userID, pictureID, dateComment, Comment)
values (3, 2, CURRENT_TIMESTAMP(), 'Commentaire no 2');
insert into comment (userID, pictureID, dateComment, Comment)
values (2, 4, CURRENT_TIMESTAMP(), 'Commentaire no 3');
insert into comment (userID, pictureID, dateComment, Comment)
values (1, 34, CURRENT_TIMESTAMP(), 'Commentaire no 4');



# CREATE TABLE `group`
# (
#     groupID      int auto_increment,
#     groupName    varchar(50),
#     groupDesc    varchar(50),
#     fk_pictureID int,
#     fk_userID    int,
#     PRIMARY KEY (groupID),
#     FOREIGN KEY (fk_pictureID) REFERENCES photo (pictureID),
#     FOREIGN KEY (fk_userID) REFERENCES user (userID)
# );

# CREATE TABLE belongTo
# (
#     userID  int,
#     groupID int,
#     PRIMARY KEY (userID, groupID),
#     FOREIGN KEY (userID) REFERENCES user (userID),
#     FOREIGN KEY (groupID) REFERENCES `group` (groupID)
# );

# CREATE TABLE contain
# (
#     groupID   int,
#     pictureID int,
#     PRIMARY KEY (groupID, pictureID),
#     FOREIGN KEY (groupID) REFERENCES `group` (groupID),
#     FOREIGN KEY (pictureID) REFERENCES photo (pictureID)
# );

# insert into belongto (userID, groupID)
# values (1, 1);
# insert into belongto (userID, groupID)
# values (2, 1);
# insert into belongto (userID, groupID)
# values (3, 1);
# insert into belongto (userID, groupID)
# values (4, 1);
# insert into belongto (userID, groupID)
# values (5, 1);
# insert into belongto (userID, groupID)
# values (1, 2);
# insert into belongto (userID, groupID)
# values (2, 2);

# insert into `group` (groupID, groupName, groupDesc, fk_pictureID, fk_userID)
# values (1, 'Group numéro 1', 'test grp 1', null, 1);
# insert into `group` (groupID, groupName, groupDesc, fk_pictureID, fk_userID)
# values (2, 'Group numéro 2', 'test grp 2', null, 3);

#
# CREATE TABLE profile
# (
#     userEmail varchar(50),
#     ppURL     varchar(1000),
#     FOREIGN KEY (userEmail) REFERENCES user (Email)
# );
