<?php
require_once './vendor/autoload.php';

use Doctrine\DBAL\DriverManager;

$connectionParams = [
    'dbname' => 'rockpaperscissors',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
];
$conn = DriverManager::getConnection($connectionParams);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $player1Name = $_POST['player1Name'];
    $player1Pick = $_POST['player1Pick'];
    $player2Name = $_POST['player2Name'];
    $player2Pick = $_POST['player2Pick'];
    $roundDate = $_POST['roundDate'];  // Assumes datetime-local input provides a valid MySQL datetime format

    $queryBuilder = $conn->createQueryBuilder();

    $queryBuilder
        ->insert('GameRound')
        ->setValue('player1', ':player1Name')
        ->setValue('player1Pick', ':player1Pick')
        ->setValue('player2', ':player2Name')
        ->setValue('player2Pick', ':player2Pick')
        ->setValue('roundDate', ':roundDate')
        ->setParameters([
            'player1Name' => $player1Name,
            'player1Pick' => $player1Pick,
            'player2Name' => $player2Name,
            'player2Pick' => $player2Pick,
            'roundDate' => $roundDate,
        ])
        ->executeStatement();

    // Redirect or send a success message
    header('Location: index.php'); // Redirect back to the main page
    exit();
}
