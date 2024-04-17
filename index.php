<?php
require_once './vendor/autoload.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rockpaperscissors";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM GameRound";
$result = $conn->query($sql);

$rows = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
}
$conn->close();

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);
echo $twig->render('index.twig', ['results' => $rows]);
