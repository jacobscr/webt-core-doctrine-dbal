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

$queryBuilder = $conn->createQueryBuilder();

$queryBuilder
    ->select('*')
    ->from('GameRound');

$result = $queryBuilder->fetchAllAssociative();

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);

$page = $_GET['page'] ?? 'table'; // Default page is 'table'

echo $twig->render('index.twig', ['results' => $result, 'page' => $page]);
