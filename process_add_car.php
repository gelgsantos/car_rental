<!DOCTYPE html>
<html>
<head>
    <title>Car Rental System</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
    <div class="container">
        <?php
        // Check if the form data has been submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
            $car_name = $_POST["car_name"];
            $car_description = $_POST["car_description"];
            $daily_rate = $_POST["daily_rate"];
            $availability = $_POST["availability"];

            // Validate form data (you can add more validation as needed)
            if (empty($car_name) || empty($car_description) || empty($daily_rate) || !is_numeric($daily_rate) || !is_numeric($availability)) {
                echo '<div class="error-message">Please fill out all fields with valid data.</div>';
            } else {
                // Connect to the database
                $connection = mysqli_connect("localhost", "root", "", "car_rental");

                // Check if the connection was successful
                if (!$connection) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Prepare the SQL query to insert a new car
                $insert_query = "INSERT INTO cars (car_name, car_description, daily_rate, availability) VALUES ('$car_name', '$car_description', $daily_rate, $availability)";

                // Execute the query
                if (mysqli_query($connection, $insert_query)) {
                    echo '<div class="confirmation-message">Car added successfully!</div>';
                } else {
                    echo '<div class="error-message">Error adding car: ' . mysqli_error($connection) . '</div>';
                }

                // Close the database connection
                mysqli_close($connection);
            }
        } else {
            echo '<div class="error-message">Invalid request.</div>';
        }
        ?>

        <br>
        <a href="manage_cars.php" class="back-link">Back to Car List</a>
    </div>
</body>
</html>
