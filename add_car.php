<!DOCTYPE html>
<html>
<head>
    <title>Add New Car</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
    <div class="container">
        <h1>Add New Car</h1>

        <form action="process_add_car.php" method="post">
            <div class="form-group">
                <label for="car_name">Car Name:</label>
                <input type="text" name="car_name" id="car_name" required>
            </div>

            <div class="form-group">
                <label for="car_description">Car Description:</label>
                <textarea name="car_description" id="car_description" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="daily_rate">Daily Rate:</label>
                <input type="number" name="daily_rate" id="daily_rate" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="availability">Availability:</label>
                <select name="availability" id="availability" required>
                    <option value="1">Available</option>
                    <option value="0">Rented</option>
                </select>
            </div>

            <div class="form-group">
                <input type="submit" value="Add Car" class="submit-button">
            </div>
        </form>

        <br>
        <a href="manage_cars.php" class="back-link">Back to Car List</a>
    </div>
</body>
</html>
