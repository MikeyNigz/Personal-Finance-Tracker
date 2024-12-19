<?php
require_once 'backend/check_session.php';
// Now only logged-in users can access this page
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="">
    <link rel="stylesheet" href="Financia CSS/Financia_Dashboard_Overview_Css.css">
    <title>Financia - Dashboard</title>
    <style>
        @media screen and (max-width: 1920px) and (max-height: 1080px) {
            body {
                background-image: url(Financia_Dashboard_Overview_Images/Dashboard\ Overview\ Background.png), url(Financia_Dashboard_Overview_Images/Dashboard\ Overview\ Background\ 2.png);
                background-color: rgb(199, 163, 245);
                background-repeat: no-repeat;
                background-position-y: top, center;
                background-size: 1920px 800px, 1920px 1040px;
                width: 95;
            }
        }

        @font-face

        /*This will be served as font style for our website*/
            {
            font-family: Roboto1;
            src: url(Financia_Fonts/roboto/Roboto-Light.ttf);
        }

        @font-face

        /*This will be served as font style for our website*/
            {
            font-family: Roboto2;
            src: url(Financia_Fonts/roboto/Roboto-Bold.ttf);
        }

        @font-face

        /*This will be served as font style for our website*/
            {
            font-family: Roboto3;
            src: url(Financia_Fonts/roboto/Roboto-Black.ttf);
        }

        @font-face {
            font-family: Coolvetica1;
            src: url(Financia_Fonts/coolvetica/coolvetica\ condensed\ rg.otf);
        }

        @font-face {
            font-family: Coolvetica2;
            src: url(Financia_Fonts/coolvetica/coolvetica\ rg.otf);
        }
    </style>
</head>

<body>
    <table class="table1">
        <tr>
            <td class="Financia_box"><a class="Financia" href="Financia.php">Financia</a></td>
            <td style="width: 50vw;"></td>
            <td class="e-pay_box">
                <img class="e-pay_button" id="epayBtn" src="Financia_Home_Page_Images/plus.png" alt="">
                <div class="dropdown-menu" id="dropdownMenuEpay">
                    <a href="Financia-E-Pay.php">E-Pay</a>
                </div>
            </td>

            <td class="notification_box"><img class="notification_button"
                    src="Financia_Home_Page_Images/Notification bell.png" alt=""></td>
            <td class="account_box">
                <img class="account" id="accountBtn" src="Financia_Home_Page_Images/Account profile.png" alt="">
                <div class="dropdown-menu" id="dropdownMenuAccount">
                    <a href="Financia_Sign_In.html">Sign In</a>
                    <a href="Financia_Sign_Up.php">Sign Up</a>
                    <a href="Financia_Account.php">Account</a>

                </div>
            </td>
            <td class="settings_box"><img class="settings_button" src="Financia_Home_Page_Images/Settings logo.png"
                    alt=""></td>
        </tr>
    </table>
    <table class="table2">
        <form action="">
            <tr>
                <td class="td_link">
                    <a class="nav_link" href="Financia_Dashboard_Overview.php">Overview</a>
                </td>
                <td class="td_link">
                    <a class="nav_link" href="Financia_Dashboard_Summary.html">Summary</a>
                </td>
                <td class="td_link">
                    <a class="nav_link" href="Financia_History.php">History</a>
                </td>
                <td class="td_link">
                    <a class="nav_link" href="Financia_Transactions.html">Transactions</a>
                </td>
                <td class="td_link">
                    <a class="nav_link" href="#">Reports</a>
                </td>
            </tr>
        </form>
    </table>

    <!-- Income & Expenses Section -->
    <section class="income-expenses">
        <h2>Income & Expenses</h2>
        <div class="expenses-container">
            <div class="chart">
                <p>Overall Income: ₱<span id="overallIncome">0</span><br>Overall Expenses: ₱<span id="overallExpenses">0</span><br>Overall Profit: ₱<span id="overallProfit">0</span></p>
            </div>
            <div class="expenses-table">
                <div class="date-range">
                    <input type="date" id="startDateExpenses" placeholder="Start Date">
                    <input type="date" id="endDateExpenses" placeholder="End Date">
                </div>
                <table>
                    <tr>
                        <th>Date</th>
                        <th>Income</th>
                        <th>Expenses</th>
                        <th>Profit</th>
                    </tr>
                    <tbody id="incomeExpensesTableBody">
                        <!-- Income and expenses rows will be populated dynamically -->
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Transaction History Section -->
    <section class="transaction-history">
        <h2>Transaction History</h2>
        <div class="history-container">
            <div class="date-range">
                <select id="transactionTypeFilter">
                    <option value="">Select Transaction Type</option>
                    <option value="Income">Income</option>
                    <option value="Expense">Expense</option>
                </select>
                <input type="date" id="startDate" placeholder="Start Date">
                <input type="date" id="endDate" placeholder="End Date">
            </div>
            <table>
                <tr>
                    <th>Transaction Description</th>
                    <th>Amount</th>
                    <th>Time</th>
                    <th>Date</th>
                </tr>
                <tbody id="transactionTableBody">
                    <!-- Transaction rows will be populated dynamically -->
                </tbody>
            </table>
        </div>
    </section>
    <div>
        <hr style="margin: 12vw 0 0 -1vw; border: 0.1vw solid black; width: 38vw;">
        <hr style="width: 9vw; border: 0.1vw solid black; margin: -0.2vw 0 0 40vw;">
        <hr style="width: 3vw; border: 0.1vw solid black; margin: -0.2vw 0 0 52vw;">
        <hr style="width: 39.2vw; border: 0.1vw solid black; margin: -0.2vw 0 0 58vw;">
    </div>
    <div class="div6">
        <img class="social_media_logo" src="Financia_Home_Page_Images/facebook.png" alt="">
        <img class="social_media_logo" src="Financia_Home_Page_Images/twitter.png" alt="">
        <img class="social_media_logo" src="Financia_Home_Page_Images/tiktok.png" alt="">
        <img class="social_media_logo" src="Financia_Home_Page_Images/instagram.png" alt="">
    </div>
    <table class="table5">
        <tr>
            <td class="footer_link_box"><a class="footer_links" href="Financia-AboutUs-html">About Us</a></td>
            <td class="footer_link_box"><a class="footer_links" href="">Terms & Conditions</a></td>
            <td class="footer_link_box"><a class="footer_links" href="">Privacy Policy</a></td>
            <td class="footer_link_box"><a class="footer_links" href="">Contact Us</a></td>
        </tr>
    </table>
    <br>
    <hr style="border: 0.1vw solid black; width: 99.2vw; margin: 0 -1vw 0 -1vw;">
    <p class="copyright">&copy; 2024 Financia. All Rights Reserved.</p>

    <script>
        // E-Pay Dropdown
        const epayBtn = document.getElementById('epayBtn');
        const dropdownMenuEpay = document.getElementById('dropdownMenuEpay');

        // Account Dropdown
        const accountBtn = document.getElementById('accountBtn');
        const dropdownMenuAccount = document.getElementById('dropdownMenuAccount');

        // Toggle visibility of E-Pay dropdown
        epayBtn.addEventListener('click', (event) => {
            event.stopPropagation(); // Prevent click from bubbling up
            dropdownMenuEpay.style.display =
                dropdownMenuEpay.style.display === 'block' ? 'none' : 'block';
            dropdownMenuAccount.style.display = 'none'; // Close other dropdown
        });

        // Toggle visibility of Account dropdown
        accountBtn.addEventListener('click', (event) => {
            event.stopPropagation(); // Prevent click from bubbling up
            dropdownMenuAccount.style.display =
                dropdownMenuAccount.style.display === 'block' ? 'none' : 'block';
            dropdownMenuEpay.style.display = 'none'; // Close other dropdown
        });

        // Close dropdowns when clicking outside
        window.addEventListener('click', () => {
            dropdownMenuEpay.style.display = 'none';
            dropdownMenuAccount.style.display = 'none';
        });

        document.addEventListener('DOMContentLoaded', () => {
            loadTransactions(); // Load all transactions by default
        });

        function loadTransactions() {
            const transactionType = document.getElementById('transactionTypeFilter').value;
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;

            fetch('backend/get_transactions.php')
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const tableBody = document.getElementById('transactionTableBody');
                        tableBody.innerHTML = ''; // Clear existing rows

                        const filteredTransactions = data.transactions.filter(transaction => {
                            const transactionDate = new Date(transaction.created_at);
                            const isWithinDateRange = (!startDate || transactionDate >= new Date(startDate)) &&
                                                      (!endDate || transactionDate <= new Date(endDate));

                            // Include all transactions if no type is selected
                            if (!transactionType) {
                                return isWithinDateRange; // Include all transactions within the date range
                            }

                            if (transactionType === 'Income' && transaction.transaction_type === 'Deposit' && isWithinDateRange) {
                                return true; // Include deposits for Income
                            }
                            if (transactionType === 'Expense' && transaction.transaction_type === 'Withdraw' && isWithinDateRange) {
                                return true; // Include withdrawals for Expense
                            }
                            return false; // Exclude all other transactions
                        });

                        filteredTransactions.forEach(transaction => {
                            const row = document.createElement('tr');
                            row.innerHTML = `
                                <td>${transaction.description || '-'}</td>
                                <td>₱ ${parseFloat(transaction.amount).toLocaleString('en-PH', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                })}</td>
                                <td>${new Date(transaction.created_at).toLocaleTimeString('en-PH', {
                                    hour: '2-digit',
                                    minute: '2-digit'
                                })}</td>
                                <td>${new Date(transaction.created_at).toLocaleDateString('en-PH')}</td>
                            `;
                            tableBody.appendChild(row);
                        });

                        // If no transactions are found, display a message
                        if (filteredTransactions.length === 0) {
                            tableBody.innerHTML = `
                                <tr>
                                    <td colspan="4" style="text-align: center;">No transactions found</td>
                                </tr>
                            `;
                        }
                    } else {
                        console.error('Failed to load transactions:', data.message);
                    }
                })
                .catch(error => {
                    console.error('Error fetching transactions:', error);
                });
        }

        // Load transactions on change of filters
        document.getElementById('transactionTypeFilter').addEventListener('change', loadTransactions);
        document.getElementById('startDate').addEventListener('change', loadTransactions);
        document.getElementById('endDate').addEventListener('change', loadTransactions);

        document.addEventListener('DOMContentLoaded', loadIncomeExpenses);

        function loadIncomeExpenses() {
            fetch('backend/get_transactions.php')
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const incomeExpensesTableBody = document.getElementById('incomeExpensesTableBody');
                        incomeExpensesTableBody.innerHTML = ''; // Clear existing rows

                        const incomeData = {};
                        const expenseData = {};

                        data.transactions.forEach(transaction => {
                            const transactionDate = new Date(transaction.created_at).toLocaleDateString('en-PH');
                            if (transaction.transaction_type === 'Deposit') {
                                incomeData[transactionDate] = (incomeData[transactionDate] || 0) + parseFloat(transaction.amount);
                            } else if (transaction.transaction_type === 'Withdraw') {
                                expenseData[transactionDate] = (expenseData[transactionDate] || 0) + parseFloat(transaction.amount);
                            }
                        });

                        const allDates = new Set([...Object.keys(incomeData), ...Object.keys(expenseData)]);
                        let overallIncome = 0;
                        let overallExpenses = 0;

                        allDates.forEach(date => {
                            const income = incomeData[date] || 0;
                            const expenses = expenseData[date] || 0;
                            const profit = income - expenses;

                            overallIncome += income;
                            overallExpenses += expenses;

                            const row = document.createElement('tr');
                            row.innerHTML = `
                                <td>${date}</td>
                                <td>₱ ${income.toLocaleString('en-PH', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td>
                                <td>₱ ${expenses.toLocaleString('en-PH', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td>
                                <td>₱ ${profit.toLocaleString('en-PH', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td>
                            `;
                            incomeExpensesTableBody.appendChild(row);
                        });

                        // Update overall totals
                        document.getElementById('overallIncome').textContent = overallIncome.toLocaleString('en-PH', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                        document.getElementById('overallExpenses').textContent = overallExpenses.toLocaleString('en-PH', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                        document.getElementById('overallProfit').textContent = (overallIncome - overallExpenses).toLocaleString('en-PH', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                    } else {
                        console.error('Failed to load transactions:', data.message);
                    }
                })
                .catch(error => {
                    console.error('Error fetching transactions:', error);
                });
        }

        // Load income and expenses on date change
        document.getElementById('startDateExpenses').addEventListener('change', loadIncomeExpenses);
        document.getElementById('endDateExpenses').addEventListener('change', loadIncomeExpenses);
    </script>

</body>

</html>