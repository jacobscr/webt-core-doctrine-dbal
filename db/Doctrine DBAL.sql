CREATE DATABASE IF NOT EXISTS RockPaperScissors;

USE RockPaperScissors;

DROP TABLE IF EXISTS GameRound;

CREATE TABLE IF NOT EXISTS GameRound (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    roundNumber INTEGER NOT NULL,
    player1 TEXT NOT NULL,
    player1Pick TEXT NOT NULL,
    player2 TEXT NOT NULL,
    player2Pick TEXT NOT NULL,
    roundDate TIMESTAMP NOT NULL
);

INSERT INTO GameRound (roundNumber, player1, player1Pick, player2, player2Pick, roundDate) VALUES (1, 'Player 1', 'Rock', 'Player 2', 'Scissors', '2021-01-01 12:00:00');
INSERT INTO GameRound (roundNumber, player1, player1Pick, player2, player2Pick, roundDate) VALUES (2, 'Player 1', 'Paper', 'Player 2', 'Rock', '2021-01-01 12:01:00');
INSERT INTO GameRound (roundNumber, player1, player1Pick, player2, player2Pick, roundDate) VALUES (3, 'Player 1', 'Scissors', 'Player 2', 'Paper', '2021-01-01 12:02:00');
INSERT INTO GameRound (roundNumber, player1, player1Pick, player2, player2Pick, roundDate) VALUES (3, 'Player 1', 'Scissors', 'Player 2', 'Paper', '2021-01-01 12:02:00');
INSERT INTO GameRound (roundNumber, player1, player1Pick, player2, player2Pick, roundDate) VALUES (3, 'Player 1', 'Scissors', 'Player 2', 'Paper', '2021-01-01 12:02:00');

SELECT * FROM GameRound;