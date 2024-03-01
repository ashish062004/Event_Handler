
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

<?php include 'header.php'; ?>
<div id="main-content">
  <div id="carouselExampleCaptions" class="carousel slide mt-10">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="./assests/3.jpg" class="d-block w-100" alt="..." height=350px width=90%>
      </div>
      <div class="carousel-item">
        <img src="./assests/1.jpg" class="d-block w-100" alt="..." height=350px width=90%>
      </div>
      <div class="carousel-item">
        <img src="./assests/2.jpg" class="d-block w-100" alt="..." height=350px width=90%>
      </div>
</div>
<?php
$servername = "localhost:3307"; // Your database host
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "event_handler"; // Your database name
$connection = new mysqli($servername, $username, $password, $dbname);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$sql = "SELECT EventID, Title, Description, StartDate, EndDate, Cost, LocationID FROM events ORDER BY StartDate ASC";
$statement = $connection->prepare($sql);
$statement->execute();
$result = $statement->get_result();
$events = $result->fetch_all(MYSQLI_ASSOC);

?>
<div class="container">
    <h2>Our Event List</h2>
<!-- <table class="table table-striped">
           <thead>
                <tr>
                    <th>Event No</th>
                    <th>Event Title</th>
                    <th>Event Description</th>
                    <th>Event Start Date</th>
                    <th>Event End Date</th>
                    <th>Event Cost</th>
                    <th>Event Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($events)): ?>
                    <tr>
                        <td colspan="8">No events found.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($events as $event): ?>
                        <tr>
                            <td><?= $event['EventID'] ?></td>
                            <td><?= $event['Title'] ?></td>
                            <td><?= $event['Description'] ?></td>
                            <td><?= $event['StartDate'] ?></td>
                            <td><?= $event['EndDate'] ?></td>
                            <td><?= $event['Cost'] ?></td>
                            <td>
                                <a href="viewLocation.php?id=<?= $event['LocationID'] ?>"><?= $event['LocationName'] ?></a>
                            </td>
                            <td>
                                <a href="viewEvent.php?id=<?= $event['EventID'] ?>">Show Event</a>
                                <a class="delete" href="deleteEvent.php?id=<?= $event['EventID'] ?>">Delete Event</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
</table> -->
<?php
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
$sql = "SELECT EventID, Title, Description, StartDate, EndDate, Cost, LocationID FROM events";
$stmt = $conn->prepare($sql);
$stmt->execute();

$events = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <div class="row">
        <?php foreach ($events as $event): ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($event['Title']); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($event['Description']); ?></p>
                        <p class="card-text"><strong>Start Date:</strong> <?php echo htmlspecialchars($event['StartDate']); ?></p>
                        <a href="event_details.php?id=<?php echo $event['EventID']; ?>" class="btn btn-primary">More Details</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

</div>
<
<?php include 'footer.php'; ?>

