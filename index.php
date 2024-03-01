<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Handler</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>   
    <?php include 'header.php'; ?>
    <div id="content-container"></div>
    <?php include 'footer.php'; ?>

    <!-- <script>
$(document).ready(function() {
    // Add event listener for navigation links
    $('nav a').on('click', function(e) {
        e.preventDefault(); // Prevent default link action
        var page = $(this).attr('href'); // Get the href attribute of the clicked link
        loadPage(page); // Load the page using AJAX
    });

    // Function to load a page using AJAX
    function loadPage(page) {
        $.ajax({
            url: page,
            type: 'GET',
            success: function(data) {
                $('#content-container').html(data); // Load the content into the container
            },
            error: function(xhr, status, error) {
                console.error('Error loading page:', error);
            }
        });
    }

    // Load the default page on page load
    loadPage('home.php');
});
</script> -->

</body>
</html>
