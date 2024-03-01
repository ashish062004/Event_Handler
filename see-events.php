<?php
// Connect to the database
$mysqli = new mysqli('localhost', 'root', '', 'event_handler','3307');

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Fetch upcoming events
$result = $mysqli->query("SELECT * FROM events WHERE date > NOW() ORDER BY date ASC");
$upcomingEvents = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>See Events</title>
</head>
<body>
    <h2>Upcoming Events</h2>
    <ul>
        <?php foreach ($upcomingEvents as $event): ?>
            <li><?php echo htmlspecialchars($event['title']); ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
