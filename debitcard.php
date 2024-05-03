<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Debit Card Transactions</title>
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
        section {
            padding: 40px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border-radius: 8px;
            margin: 40px auto;
            max-width: 800px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>
    <header>
        <h1>Debit Card Transactions</h1>
    </header>

    <section>
        <table>
            <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>Card Number</th>
                    <th>Expiration Date</th>
                    <th>Card Holder Name</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody id="debitCardTableBody">
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

                // SQL query to fetch debit card data from DebitCard table
                $sql = "SELECT custumer_id, cardnumber, expidate, cardholdername, amount FROM DebitCard";

                // Execute SQL query
                $result = $conn->query($sql);

                // Check if there are rows in the result set
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["custumer_id"] . "</td>";
                        echo "<td>" . $row["cardnumber"] . "</td>";
                        echo "<td>" . $row["expidate"] . "</td>";
                        echo "<td>" . $row["cardholdername"] . "</td>";
                        echo "<td>" . $row["amount"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No debit card transactions found</td></tr>";
                }

                // Close the database connection
                $conn->close();
                ?>
            </tbody>
        </table>
    </section>
</body>
</html>
