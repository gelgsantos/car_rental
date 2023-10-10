<!DOCTYPE html>
<html>
<head>
    <title>Edit Car</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
    <div class="container">
        <h1>Edit Car</h1>

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

            // Fetch car information based on the provided ID
            $query = "SELECT * FROM cars WHERE id = $car_id";
            $result = mysqli_query($connection, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);

                // Display the car edit form
                echo '<form action="process_edit_car.php" method="post">';
                echo '<input type="hidden" name="car_id" value="' . $row['id'] . '">';
                echo '<div class="form-group">';
                echo 'Car Name: <input type="text" name="car_name" value="' . $row['car_name'] . '" required>';
                echo '</div>';
                echo '<div class="form-group">';
                echo 'Car Description: <textarea name="car_description" rows="4" required>' . $row['car_description'] . '</textarea>';
                echo '</div>';
                echo '<div class="form-group">';
                echo 'Daily Rate: <input type="number" name="daily_rate" value="' . $row['daily_rate'] . '" step="0.01" required>';
                echo '</div>';
                echo '<div class="form-group">';
                echo 'Availability: <select name="availability" required>';
                echo '<option value="1" ' . ($row['availability'] == 1 ? 'selected' : '') . '>Available</option>';
                echo '<option value="0" ' . ($row['availability'] == 0 ? 'selected' : '') . '>Rented</option>';
                echo '</select>';
                echo '</div>';
                echo '<div class="form-group">';
                echo '<input type="submit" value="Save Changes" class="submit-button">';
                echo '</div>';
                echo '</form>';
            } else {
                echo "Car not found.";
            }
        } else {
            echo "Car ID not provided.";
        }

        // Close the database connection
        mysqli_close($connection);
        ?>

        <br>
        <a href="manage_cars.php" class="back-link">Back to Car List</a>
    </div>
</body>
</html>
