<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "prem";
$dbname = "project1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $user_id = $_POST['user_id'];
    $account = $_POST['account'];

    // Prepare and execute SQL statement to insert data into 'add_customer' table
    $stmt = $conn->prepare("INSERT INTO add_customer (name, phone, email, dob, address, user_id, account) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sisssss", $name, $phone, $email, $dob, $address, $user_id, $account);

    if ($stmt->execute()) {
        echo "<p>New customer added successfully!</p>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close prepared statement
    $stmt->close();
}

// Close database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer - Banking Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333;
        }
        header {
            background-color: #007bff;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
        /* Modify the color of h1 to white */
        header h1 {
            color: #fff;
        }
        form {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }
        form button {
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <h1>Add New Customer</h1>
    </header>

    <form action="add_customer.php" method="post">
        <input type="text" name="name" placeholder="Name" required>
        <input type="number" name="phone" placeholder="Phone Number" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="date" name="dob" placeholder="Date of Birth" required>
        <input type="text" name="address" placeholder="Address" required>
        <input type="text" name="user_id" placeholder="User ID" required>
	<input type="text" name="account" placeholder="Account_no" required>
        <button type="submit" name="submit">Add Customer</button>
    </form>

    <footer>
        <p>&copy; 2024 INDIAN BANK. All rights reserved.</p>
    </footer>
</body>
</html>
