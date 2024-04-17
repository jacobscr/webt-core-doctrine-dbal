<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rockpaperscissors";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM GameRound";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rock Paper Scissors Prototype</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1 class="mt-3">Rock Paper Scissors Tournament</h1>
    <p>Date: March 20, 2024</p>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-light">
            <tr>
                <th>Round</th>
                <th>Player 1</th>
                <th>Player 2</th>
                <th>Date & Time</th>
            </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["roundNumber"] . "</td>";
                        echo "<td>" . $row["player1Pick"] . "</td>";
                        echo "<td>" . $row["player2Pick"] . "</td>";
                        echo "<td>" . $row["roundDate"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        // Loop through each row except the header
        $('table tbody tr').each(function() {
            let player1 = $(this).find('td:eq(1)').text().toLowerCase(); // Get text of player 1's choice
            let player2 = $(this).find('td:eq(2)').text().toLowerCase(); // Get text of player 2's choice
            let winner = determineWinner(player1, player2); // Determine the winner
            if (winner === 1) {
                $(this).find('td:eq(1)').addClass('font-weight-bold'); // Highlight player 1's choice
            } else if (winner === 2) {
                $(this).find('td:eq(2)').addClass('font-weight-bold'); // Highlight player 2's choice
            }
        });

        // Function to determine the winner based on the choices
        function determineWinner(choice1, choice2) {
            if (choice1 === choice2) {
                return 0; // Draw
            } else if (
                (choice1 === 'rock' && choice2 === 'scissors') ||
                (choice1 === 'paper' && choice2 === 'rock') ||
                (choice1 === 'scissors' && choice2 === 'paper')
            ) {
                return 1; // Player 1 wins
            } else {
                return 2; // Player 2 wins
            }
        }
    });
</script>

</body>
</html>
