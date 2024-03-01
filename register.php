<!-- register.html -->
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-6 border p-3">
            <h2 class="text-center">Register</h2>
            <form action="register.php" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" id="role" name="role">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                        <option value="place_provider">Place Provider</option>
                        <option value="public_speaker">Public Speaker</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
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
    $stmt = $mysqli->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $_POST['username'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['role']);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Registration successful. You can now log in.";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
