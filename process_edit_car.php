<!DOCTYPE html>
<html>
<head>
    <title>Edit Car</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
    <div class="container">
        <?php
        // Connect to the database
        $connection = mysqli_connect("localhost", "root", "", "car_rental");

        // Check if the connection was successful
        if (!$connection) {
            die("Connection failed: " . mysqli_connect_error());
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Check if the necessary POST data is set
            if (
                isset($_POST['car_id']) &&
                isset($_POST['car_name']) &&
                isset($_POST['car_description']) &&
                isset($_POST['daily_rate']) &&
                isset($_POST['availability'])
            ) {
                $car_id = $_POST['car_id'];
                $car_name = mysqli_real_escape_string($connection, $_POST['car_name']);
                $car_description = mysqli_real_escape_string($connection, $_POST['car_description']);
                $daily_rate = floatval($_POST['daily_rate']);
                $availability = ($_POST['availability'] == 1) ? 1 : 0;

                // Update car information in the database
                $update_query = "UPDATE cars SET
                    car_name = '$car_name',
                    car_description = '$car_description',
                    daily_rate = $daily_rate,
                    availability = $availability
                    WHERE id = $car_id";

                if (mysqli_query($connection, $update_query)) {
                    // Car information updated successfully
                    header("Location: manage_cars.php"); // Redirect to car management page
                    exit();
                } else {
                    echo '<div class="error-message">Error updating car information: ' . mysqli_error($connection) . '</div>';
                }
            } else {
                echo '<div class="error-message">Missing POST data.</div>';
            }
        } else {
            echo '<div class="error-message">Invalid request method.</div>';
        }

        // Close the database connection
        mysqli_close($connection);
        ?>

        <br>
        <a href="manage_cars.php" class="back-link">Back to Car List</a>
    </div>
</body>
</html>
