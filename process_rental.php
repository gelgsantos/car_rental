<?php
// Connect to the database
$connection = mysqli_connect("localhost", "root", "", "car_rental");

// Check if the connection was successful
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get input values
$car_id = $_POST['car_id'];
$rental_days = $_POST['rental_days'];

// Fetch the selected car's daily rate
$query = "SELECT daily_rate FROM cars WHERE id = $car_id";
$result = mysqli_query($connection, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $daily_rate = $row['daily_rate'];

    // Calculate the total cost
    $total_cost = $daily_rate * $rental_days;

    // Mark the car as rented
    $update_query = "UPDATE cars SET availability = 0 WHERE id = $car_id";
    mysqli_query($connection, $update_query);

    // Close the database connection
    mysqli_close($connection);

    // Display the confirmation message with some styling
    echo '<div style="text-align: center; background-color: #4CAF50; color: #fff; padding: 10px; border-radius: 5px;">';
    echo "Car rented successfully!<br>";
    echo "Total Cost: $" . $total_cost;
    echo '</div>';
} else {
    echo "Error: " . mysqli_error($connection);
}
?>
