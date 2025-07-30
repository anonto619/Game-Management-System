<?php
// DB credentials
$servername = "localhost";
$username = "root";  // Change if needed
$password = "";      // Change if needed
$dbname = "game_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect POST data
$title = $_POST['title'] ?? '';
$genre = $_POST['genre'] ?? '';
$platform = $_POST['platform'] ?? '';
$release_year = $_POST['release_year'] ?? NULL;

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO games (title, genre, platform, release_year) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssi", $title, $genre, $platform, $release_year);

// Execute and check
if ($stmt->execute()) {
    echo "New game added successfully! <br>";
    echo '<a href="add_game.html">Add another game</a><br>';
    echo '<a href="view_games.php">View all games</a>';
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
