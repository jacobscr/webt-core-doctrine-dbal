CREATE DATABASE IF NOT EXISTS RockPaperScissors;

USE RockPaperScissors;

CREATE TABLE IF NOT EXISTS GameRound (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    roundNumber INTEGER NOT NULL,
    player1Pick TEXT NOT NULL,
    player2Pick TEXT NOT NULL,
    roundDate TIMESTAMP NOT NULL
);

INSERT INTO GameRound (roundNumber, player1Pick, player2Pick, roundDate) VALUES (1, 'rock', 'scissors', NOW());

SELECT * FROM GameRound;