<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insurance Details - Banking Management System</title>
    <style>
        /* Global Styles */
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
        form {
            margin-top: 20px;
        }
        form input, form select {
            margin-bottom: 10px;
            padding: 8px;
            width: 100%;
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

        /* Specific Styles for Insurance Section */
        section.insurance {
            background-color: #f0f0f0; /* Light gray background color */
        }
    </style>
</head>
<body>
    <header>
        <h1>Insurance Details</h1>
    </header>

    <nav>
        <a href="index.html">Home</a>
        <a href="add_customer.html">Add Customer</a>
        <a href="accounts.html">Accounts</a>
        <a href="transactions.html">Transactions</a>
        <a href="loan.html">Loan</a>
        <a href="insurance.html">Insurance</a>
        <a href="government.html">Government Services</a>
    </nav>

    <section class="insurance">
        <h2>Customer Insurance Details</h2>
        <table>
            <thead>
                <tr>
                    <th>Insurance ID</th>
                    <th>Customer ID</th>
                    <th>Insurance Type</th>
                    <th>Policy Number</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Premium Amount</th>
                    <th>Coverage Details</th>
                </tr>
            </thead>
            <tbody id="insuranceTableBody">
                <!-- Insurance data will be populated dynamically -->
            </tbody>
        </table>

        <h2>Add New Insurance</h2>
        <form id="addInsuranceForm">
            <input type="text" id="insuranceType" placeholder="Insurance Type" required>
            <input type="text" id="policyNumber" placeholder="Policy Number" required>
            <input type="date" id="startDate" placeholder="Start Date" required>
            <input type="date" id="endDate" placeholder="End Date" required>
            <input type="number" id="premiumAmount" placeholder="Premium Amount" required>
            <input type="text" id="coverageDetails" placeholder="Coverage Details" required>
            <button type="submit">Add Insurance</button>
        </form>
    </section>

    <footer>
        <p>&copy; 2024 INDIAN BANK. All rights reserved.</p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const insuranceTableBody = document.getElementById('insuranceTableBody');
            const addInsuranceForm = document.getElementById('addInsuranceForm');

            // Sample insurance data (replace with actual dynamic data fetching)
            const insurance = [
                { insurance_id: 20901, customer_id: 1234567890, insurance_type: 'life insurance', policy_number: 'PLI1234JK45', start_date: '2007-08-12', end_date: '2027-08-11', premium_amount: 50000, coverage_details: 'Death Benefit' },
                { insurance_id: 11564, customer_id: 1256844553, insurance_type: 'health insurance', policy_number: 'PLI674LT20', start_date: '2013-12-25', end_date: '2028-12-24', premium_amount: 70000, coverage_details: 'hospital bills' },
                // Add more insurance records here
            ];

            // Function to populate insurance table
            const populateInsuranceTable = () => {
                insuranceTableBody.innerHTML = '';

                insurance.forEach(insuranceItem => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${insuranceItem.insurance_id}</td>
                        <td>${insuranceItem.customer_id}</td>
                        <td>${insuranceItem.insurance_type}</td>
                        <td>${insuranceItem.policy_number}</td>
                        <td>${insuranceItem.start_date}</td>
                        <td>${insuranceItem.end_date}</td>
                        <td>${insuranceItem.premium_amount}</td>
                        <td>${insuranceItem.coverage_details}</td>
                    `;
                    insuranceTableBody.appendChild(row);
                });
            };

            // Populate insurance table on page load
            populateInsuranceTable();

            // Handle form submission to add new insurance
            addInsuranceForm.addEventListener('submit', event => {
                event.preventDefault();

                const insuranceType = document.getElementById('insuranceType').value;
                const policyNumber = document.getElementById('policyNumber').value;
                const startDate = document.getElementById('startDate').value;
                const endDate = document.getElementById('endDate').value;
                const premiumAmount = parseInt(document.getElementById('premiumAmount').value);
                const coverageDetails = document.getElementById('coverageDetails').value;

                // Create new insurance object
                const newInsurance = {
                    insurance_id: Math.floor(Math.random() * 100000), // Generate random insurance ID (for demo)
                    customer_id: Math.floor(Math.random() * 10000000000), // Generate random customer ID (for demo)
                    insurance_type: insuranceType,
                    policy_number: policyNumber,
                    start_date: startDate,
                    end_date: endDate,
                    premium_amount: premiumAmount,
                    coverage_details: coverageDetails
                };

                // Add new insurance to insurance array
                insurance.push(newInsurance);

                // Repopulate insurance table with updated data
                populateInsuranceTable();

                // Reset form
                addInsuranceForm.reset();
            });
        });
    </script>
</body>
</html>
