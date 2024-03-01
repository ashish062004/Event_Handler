<?php
// Connect to the database (same as before)
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "event_handler";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
// Get the event ID from the query string
$eventID = isset($_GET['id']) ? $_GET['id'] : null;

if ($eventID) {
    $sql = "SELECT * FROM events WHERE EventID = :eventID";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':eventID', $eventID, PDO::PARAM_INT);
    $stmt->execute();

    $event = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($event) {
        // Display the event details
        echo "<h1>" . htmlspecialchars($event['Title']) . "</h1>";
        echo "<p>" . htmlspecialchars($event['Description']) . "</p>";
        // Add more details as needed
    } else {
        echo "Event not found.";
    }
} else {
    echo "No event ID provided.";
}

// Close the database connection
$conn = null;
?>
