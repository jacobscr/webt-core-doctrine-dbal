CREATE DATABASE IF NOT EXISTS RockPaperScissors;

USE RockPaperScissors;

DROP TABLE IF EXISTS GameRound;

CREATE TABLE IF NOT EXISTS GameRound (
                                         id INTEGER PRIMARY KEY AUTO_INCREMENT,
                                         roundNumber INTEGER NOT NULL,
                                         player1Pick TEXT NOT NULL,
                                         player2Pick TEXT NOT NULL,
                                         roundDate TIMESTAMP NOT NULL
);

INSERT INTO GameRound (roundNumber, player1Pick, player2Pick, roundDate) VALUES (1, 'Rock', 'Scissors', NOW());
INSERT INTO GameRound (roundNumber, player1Pick, player2Pick, roundDate) VALUES (2, 'Paper', 'Rock', NOW());
INSERT INTO GameRound (roundNumber, player1Pick, player2Pick, roundDate) VALUES (3, 'Scissors', 'Scissors', NOW());
INSERT INTO GameRound (roundNumber, player1Pick, player2Pick, roundDate) VALUES (4, 'Rock', 'Paper', NOW());
INSERT INTO GameRound (roundNumber, player1Pick, player2Pick, roundDate) VALUES (5, 'Paper', 'Scissors', NOW());

SELECT * FROM GameRound;