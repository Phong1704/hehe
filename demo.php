<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Management System</title>
    <!-- Add your stylesheets and scripts here -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header>
        <h1>Room Management System</h1>
        <!-- Add navigation links if needed -->
    </header>

    <main>
        <section id="room-list">
            <h2>Available Rooms</h2>
            <?php
            // Connect to your database (replace with your actual database details)
            $conn = mysqli_connect("localhost", "username", "password", "your_database");

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Fetch available rooms from the database
            $sql = "SELECT * FROM rooms";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<ul>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<li>{$row['room_name']}</li>";
                }
                echo "</ul>";
            } else {
                echo "No rooms available.";
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
        </section>

        <section id="booking-form">
            <h2>Book a Room</h2>
            <!-- Add a form to book a room -->
            <form action="book-room.php" method="post">
                <label for="room">Select Room:</label>
                <select name="room" id="room">
                    <?php
                    // Populate the dropdown with available rooms
                    $conn = mysqli_connect("localhost", "username", "password", "your_database");

                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    $sql = "SELECT * FROM rooms";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value=\"{$row['room_id']}\">{$row['room_name']}</option>";
                    }

                    mysqli_close($conn);
                    ?>
                </select>
                <label for="date">Select Date:</label>
                <input type="date" name="date" id="date" required>
                <button type="submit">Book Room</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Room Management System</p>
    </footer>

    <!-- Add your scripts here -->
    <script src="scripts.js"></script>

</body>
</html>
