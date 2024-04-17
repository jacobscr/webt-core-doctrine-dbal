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
    $id = $_POST['id'];

    $queryBuilder = $conn->createQueryBuilder();

    $queryBuilder
        ->delete('GameRound')
        ->where('id = :id')
        ->setParameter('id', $id)
        ->executeStatement();

    header('Location: index.php');
    exit();
}
