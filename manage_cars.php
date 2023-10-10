<!DOCTYPE html>
<html>
<head>
    <title>Manage Cars</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
    <div class="container">
        <h1>Manage Cars</h1>

        <?php
        // Connect to the database
        $connection = mysqli_connect("localhost", "root", "", "car_rental");

        // Check if the connection was successful
        if (!$connection) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Retrieve and display a list of cars from the database
        $query = "SELECT * FROM cars";
        $result = mysqli_query($connection, $query);

        if (mysqli_num_rows($result) > 0) {
            echo '<table class="car-listing">';
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th>Car Name</th>';
            echo '<th>Car Description</th>';
            echo '<th>Daily Rate</th>';
            echo '<th>Availability</th>';
            echo '<th>Actions</th>';
            echo '</tr>';
            
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['car_name'] . '</td>';
                echo '<td>' . $row['car_description'] . '</td>';
                echo '<td>' . $row['daily_rate'] . '</td>';
                echo '<td>' . ($row['availability'] ? 'Available' : 'Rented') . '</td>';
                echo '<td>';
                echo '<a href="edit_car.php?id=' . $row['id'] . '">Edit</a> | ';
                echo '<a href="delete_car.php?id=' . $row['id'] . '">Delete</a>';
                echo '</td>';
                echo '</tr>';
            }
            
            echo '</table>';
        } else {
            echo "No cars found.";
        }

        // Close the database connection
        mysqli_close($connection);
        ?>

        <br>
        <a href="add_car.php" class="back-link">Add New Car</a>
    </div>
</body>
</html>
