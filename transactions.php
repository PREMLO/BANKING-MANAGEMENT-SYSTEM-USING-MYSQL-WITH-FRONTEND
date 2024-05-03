<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions - Banking Management System</title>
    <style>
        /* Your CSS styles here */
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
        nav {
            background-color: #e9ecef;
            padding: 10px 0;
            text-align: center;
        }
        nav a {
            text-decoration: none;
            color: #333;
            margin: 0 15px;
            font-weight: bold;
            transition: color 0.3s ease;
        }
        nav a:hover {
            color: #007bff;
        }
        section {
            padding: 40px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border-radius: 8px;
            margin: 40px auto;
            max-width: 800px;
        }
        h1, h2 {
            color: #007bff;
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
        <h1>Transactions</h1>
    </header>

    <nav>
        <a href="index.php">Home</a>
        <a href="add_customer.php">Add Customer</a>
        <a href="accounts.php">Accounts</a>
        <a href="transactions.php">Transactions</a>
        <a href="loan.php">Loan</a>
        <a href="insurance.php">Insurance</a>
        <a href="government.html">Government Services</a>
    </nav>

    <section>
        <h2>Customer Transactions</h2>
        <table>
            <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Account Number</th>
                    <th>Transaction Type</th>
                    <th>Amount</th>
                    <th>Transaction Date</th>
                </tr>
            </thead>
            <tbody id="transactionTableBody">
                <?php
                // Database connection parameters
                $servername = "localhost";
                $username = "root";
                $password = "prem";
                $dbname = "project1";

                // Create connection using mysqli
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // SQL query to fetch transaction data
                $sql = "SELECT transaction_id, account, transaction_type, amount, transaction_dt FROM transactions";

                // Execute SQL query
                $result = $conn->query($sql);

                // Output transactions as table rows
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['transaction_id'] . "</td>";
                        echo "<td>" . $row['account'] . "</td>";
                        echo "<td>" . $row['transaction_type'] . "</td>";
                        echo "<td>" . $row['amount'] . "</td>";
                        echo "<td>" . $row['transaction_dt'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No transactions found</td></tr>";
                }

                // Close the database connection
                $conn->close();
                ?>
            </tbody>
        </table>
    </section>

    <footer>
        <p>&copy; 2024 INDIAN BANK. All rights reserved.</p>
    </footer>
</body>
</html>
