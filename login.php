<?php
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Connect to the database
    $mysqli = new mysqli('localhost', 'root', '', 'event_handler','3307');

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Prepare and bind
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $_POST['username'], $_POST['password']);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();
    if ($result->num_rows >  0) {
        // User found, start session and redirect
        session_start();
        $_SESSION['user'] = $result->fetch_assoc();
        header("Location: index.php");
    } else {
        echo "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-6 border p-3">
            <h2 class="text-center">Login</h2>
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
