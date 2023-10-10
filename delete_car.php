<!DOCTYPE html>
<html>
<head>
    <title>Delete Car</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
    <div class="container">
        <h1>Delete Car</h1>

        <?php
        // Connect to the database
        $connection = mysqli_connect("localhost", "root", "", "car_rental");

        // Check if the connection was successful
        if (!$connection) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Check if a car ID is provided via the URL
        if (isset($_GET['id'])) {
            $car_id = $_GET['id'];

            // Delete the car from the database
            $delete_query = "DELETE FROM cars WHERE id = $car_id";

            if (mysqli_query($connection, $delete_query)) {
                echo '<div class="confirmation-message">Car deleted successfully.</div>';
            } else {
                echo '<div class="confirmation-message error">Error deleting car: ' . mysqli_error($connection) . '</div>';
            }
        } else {
            echo '<div class="confirmation-message error">Car ID not provided.</div>';
        }

        // Close the database connection
        mysqli_close($connection);
        ?>
        
        <br>
        <a href="manage_cars.php" class="back-link">Back to Car List</a>
    </div>
</body>
</html>
