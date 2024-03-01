<?php
// Get event ID from URL
$eventId = $_GET['id'];

// Connect to the database
$mysqli = new mysqli('localhost', 'root', '', 'event_handler','3307');

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Fetch event details
$stmt = $mysqli->prepare("SELECT * FROM events WHERE id = ?");
$stmt->bind_param("i", $eventId);
$stmt->execute();
$result = $stmt->get_result();
$event = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Event Details</title>
</head>
<body>
    <h2><?php echo htmlspecialchars($event['title']); ?></h2>
    <p><?php echo htmlspecialchars($event['description']); ?></p>
    <p>Date: <?php echo htmlspecialchars($event['date']); ?></p>
</body>
</html>
