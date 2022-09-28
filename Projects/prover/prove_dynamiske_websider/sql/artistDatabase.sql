CREATE TABLE artist (
    idartist int NOT NULL AUTO_INCREMENT,
    navn varchar(100) NOT NULL,
    sjanger varchar(45),
    land varchar(45),
    opprettet int,
    PRIMARY KEY(idartist)
);

INSERT INTO artist (navn, sjanger, land, opprettet)
VALUES
    ('Hannah Montana', 'Pop', 'USA', 2006),
    ('Smash Mouth', 'Alternativ Rock', 'USA', 1994),
    ('Limp Bizkit', 'Nu Metal', 'USA', 1994),
    ('Tokio Hotel', 'Rock', 'Tyskland', 2001),
    ('One Direction', 'Pop', 'England', 2010),
    ('Nickelback', 'Rock', 'Canada', 1995),
    ('Justin Biber', 'Pop', 'Canada', 2007),
    ('Insane Clown Posse', 'Hip hop', 'USA', 1989),
    ('My Chemical Romance', 'Alternativ Rock', 'USA', 2001),
    ('BABYMETAL', 'Kawaii metal', 'Japan', 2010),
    ('XXXTentacion', 'Emo rap', 'USA', 2013),
    ('Lisa Børud', 'Kristen musikk', 'Norge', 2001),
    ('Backstreet boys', 'Pop', 'USA', 1993);