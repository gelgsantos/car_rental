<!DOCTYPE html>
<html>
<head>
    <title>Car Rental System</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Car Rental System</h1>

        <!-- Car rental form -->
        <form action="process_rental.php" method="post">
            <label for="car_id">Select a Car:</label>
            <select name="car_id" id="car_id">
                <?php
                // Connect to the database
                $connection = mysqli_connect("localhost", "root", "", "car_rental");

                // Check if the connection was successful
                if (!$connection) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Select available cars
                $query = "SELECT * FROM cars WHERE availability = 1";
                $result = mysqli_query($connection, $query);

                // Fetch and display available cars in the dropdown
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row['id'] . '">' . $row['car_name'] . '</option>';
                }

                // Close the database connection
                mysqli_close($connection);
                ?>
            </select>
            <label for="rental_days">Rental Days:</label>
            <input type="number" name="rental_days" id="rental_days">
            <input type="submit" value="Rent">
        </form>

        <!-- Add a button to open the CRUD interface -->
        <a href="manage_cars.php" class="manage-button">Manage Cars</a>
    </div>
</body>
</html>
