<?php
session_start();
require_once __DIR__ . '/backend/check_session.php';
require __DIR__ . '/backend/db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Financia CSS/Financia_Goals_Css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Financia - Goals</title>
    <style>
        @media screen and (max-width: 1920px) and (max-height: 1080px) {
            body {
                background-image: url(Financia_Dashboard_Overview_Images/Dashboard\ Overview\ Background.png);
                background-color: rgb(199, 163, 245);
                background-repeat: no-repeat;
                background-position-y: top;
                background-size: 1920px 800px;
                width: 95vw;
            }
        }

        @font-face {
            font-family: Roboto1;
            src: url(Financia_Fonts/roboto/Roboto-Light.ttf);
        }

        @font-face {
            font-family: Roboto2;
            src: url(Financia_Fonts/roboto/Roboto-Bold.ttf);
        }

        @font-face {
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

        /* Additional CSS as needed */
    </style>
</head>

<body>
    <!-- Navigation and Header -->
    <table class="table1">
        <tr>
            <td class="Financia_box"><a class="Financia" href="Financia.html">Financia</a></td>
            <td style="width: 50vw;"></td>
            <td class="e-pay_box">
                <img class="e-pay_button" id="epayBtn" src="Financia_Home_Page_Images/plus.png" alt="">
                <div class="dropdown-menu" id="dropdownMenuEpay">
                    <button id="epayButton" class="epay-button">E-Pay</button>
                    <button id="goalsButton" class="goals-button">Goals</button>
                </div>
            </td>
            <td class="notification_box"><img class="notification_button" src="Financia_Home_Page_Images/Notification bell.png" alt=""></td>
            <td class="account_box">
                <img class="account" id="accountBtn" src="Financia_Home_Page_Images/Account profile.png" alt="">
                <div class="dropdown-menu" id="dropdownMenuAccount">
                    <a href="Financia_Sign_In.php">Sign In</a>
                    <a href="Financia_Sign_Up.php">Sign Up</a>
                    <a href="#">Account</a>
                </div>
            </td>
            <td class="settings_box"><img class="settings_button" src="Financia_Home_Page_Images/Settings logo.png" alt=""></td>
        </tr>
    </table>
    <!-- Navigation Links -->
    <table class="table2">
        <form action="">
            <tr>
                <td class="td_link">
                    <a class="nav_link" href="Financia_Dashboard_Overview.html">Overview</a>
                </td>
                <td class="td_link">
                    <a class="nav_link" href="Financia_Dashboard_Summary.html">Summary</a>
                </td>
                <td class="td_link">
                    <a class="nav_link" href="Financia_History.html">History</a>
                </td>
                <td class="td_link">
                    <a class="nav_link" href="Financia_Transactions.html">Transactions</a>
                </td>
                <td class="td_link">
                    <a class="nav_link" href="Financia_Reports.html">Reports</a>
                </td>
            </tr>
        </form>
    </table>

    <!-- Goals Section-->
    <div class="container">
        <div class="header">
            <button class="create-btn" id="createGoalBtn">Create a Goal</button>
            <button class="save-btn" id="saveAllBtn">Save All</button>
        </div>
        <table class="goal-table">
            <thead>
                <tr>
                    <th>Goal Name</th>
                    <th>Target Amount</th>
                    <th>Transaction Type</th>
                    <th>Deadline</th>
                    <th>Bank Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="goalTableBody">
                <!-- Existing goals will be populated here -->
            </tbody>
        </table>
    </div>

    <!-- Footer and Social Media Links -->
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
            <td class="footer_link_box"><a class="footer_links" href="">About Us</a></td>
            <td class="footer_link_box"><a class="footer_links" href="">Terms & Conditions</a></td>
            <td class="footer_link_box"><a class="footer_links" href="">Privacy Policy</a></td>
            <td class="footer_link_box"><a class="footer_links" href="">Contact Us</a></td>
        </tr>
    </table>
    <br>
    <hr style="border: 0.1vw solid black; width: 99.2vw; margin: 0 -1vw 0 -1vw;">
    <p class="copyright">&copy; 2024 Financia. All Rights Reserved.</p>

    <!-- JavaScript Section -->
    <script>
        let isLoggedIn = <?php echo json_encode(isset($_SESSION['logged_in']) && $_SESSION['logged_in']); ?>;

        document.addEventListener('DOMContentLoaded', function() {
            loadGoals(); // Load existing goals when the page is ready

            document.getElementById('createGoalBtn').addEventListener('click', function() {
                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td><input type="text" class="goalName" placeholder="Enter Goal Name"></td>
                    <td>
                        <div class="amount-group">
                            Min: ₱<input type="number" class="minTargetAmount" placeholder="Min Target" min="0">
                            Max: ₱<input type="number" class="maxTargetAmount" placeholder="Max Target" min="0">
                        </div>
                    </td>
                    <td>
                        <select class="transactionType">
                            <option>Transfer Money</option>
                            <option>Withdraw</option>
                            <option>Deposit</option>
                        </select>
                    </td>
                    <td><input type="date" class="deadline"></td>
                    <td>
                        <select class="bankType">
                            <option>GCash</option>
                            <option>BDO</option>
                        </select>
                    </td>
                    <td>
                        <button class="delete-btn" onclick="deleteGoalRow(this)">Delete</button>
                    </td>
                `;
                document.getElementById('goalTableBody').appendChild(newRow);
            });

            // Handle E-Pay and Goals button clicks
            document.getElementById('epayButton').addEventListener('click', () => {
                window.location.href = 'Financia-E-Pay.php'; // Redirect to E-Pay page
            });

            document.getElementById('goalsButton').addEventListener('click', () => {
                window.location.href = 'Financia_Goals.php'; // Redirect to Goals page
            });

            document.getElementById('saveAllBtn').addEventListener('click', function() {
                const goalRows = document.querySelectorAll('#goalTableBody tr');
                const goalsData = [];

                goalRows.forEach(row => {
                    console.log(row); // Log the row to see if it's being selected
                    const goalNameInput = row.querySelector('.goalName');
                    const minTargetAmountInput = row.querySelector('.minTargetAmount');
                    const maxTargetAmountInput = row.querySelector('.maxTargetAmount');
                    const transactionTypeInput = row.querySelector('.transactionType');
                    const deadlineInput = row.querySelector('.deadline');
                    const bankTypeInput = row.querySelector('.bankType');

                    console.log(goalNameInput, minTargetAmountInput, maxTargetAmountInput, transactionTypeInput, deadlineInput, bankTypeInput); // Log inputs

                    if (goalNameInput && minTargetAmountInput && maxTargetAmountInput && transactionTypeInput && deadlineInput && bankTypeInput) {
                        const goalName = goalNameInput.value;
                        const minTargetAmount = minTargetAmountInput.value;
                        const maxTargetAmount = maxTargetAmountInput.value;
                        const transactionType = transactionTypeInput.value;
                        const deadline = deadlineInput.value;
                        const bankType = bankTypeInput.value;

                        goalsData.push({
                            goal_name: goalName,
                            min_target_amount: minTargetAmount,
                            max_target_amount: maxTargetAmount,
                            transaction_type: transactionType,
                            deadline: deadline,
                            bank_type: bankType
                        });
                    } else {
                        alert('Please fill in all fields for each goal.');
                        return; // Exit if any field is empty
                    }
                });

                // Send the data to the backend
                fetch('backend/save_all_goals.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    credentials: 'same-origin', // Include cookies
                    body: JSON.stringify(goalsData)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(data.message);
                        loadGoals(); // Reload goals to reflect saved data
                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });

        function loadGoals() {
            fetch('backend/get_goals.php', {
                method: 'GET',
                credentials: 'same-origin' // Include cookies
            })
            .then(response => response.json())
            .then(data => {
                const goalTableBody = document.getElementById('goalTableBody');
                goalTableBody.innerHTML = ''; // Clear existing rows

                if (data.success && data.goals.length > 0) {
                    data.goals.forEach(goal => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${goal.goal_name}</td>
                            <td>₱${goal.min_target_amount} - ₱${goal.max_target_amount}</td>
                            <td>${goal.transaction_type}</td>
                            <td>${goal.deadline}</td>
                            <td>${goal.bank_type}</td>
                            <td>
                                <button class="delete-btn" onclick="deleteGoal(${goal.id})">Delete</button>
                            </td>
                        `;
                        goalTableBody.appendChild(row);
                    });
                } else {
                    goalTableBody.innerHTML = `
                        <tr>
                            <td colspan="6" style="text-align: center;">No goals found</td>
                        </tr>
                    `;
                }
            })
            .catch(error => console.error('Error loading goals:', error));
        }

        function deleteGoal(goalId) {
            if (confirm(`Are you sure you want to delete this goal?`)) {
                fetch('backend/delete_goal.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    credentials: 'same-origin', // Include cookies
                    body: new URLSearchParams({
                        goal_id: goalId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(data.message);
                        // Remove the row from the table
                        const row = document.querySelector(`button[onclick="deleteGoal(${goalId})"]`).closest('tr');
                        row.remove();
                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        }

        function saveNewGoal(button) {
            const row = button.closest('tr');
            const goalName = row.querySelector('.goalName').value;
            const minTargetAmount = row.querySelector('.minTargetAmount').value;
            const maxTargetAmount = row.querySelector('.maxTargetAmount').value;
            const transactionType = row.querySelector('.transactionType').value;
            const deadline = row.querySelector('.deadline').value;
            const bankType = row.querySelector('.bankType').value;

            // Validate inputs
            if (!goalName || !minTargetAmount || !maxTargetAmount || !transactionType || !deadline || !bankType) {
                alert('Please fill in all fields.');
                return;
            }

            fetch('backend/save_goal.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                credentials: 'same-origin', // Include cookies
                body: new URLSearchParams({
                    goal_name: goalName,
                    min_target_amount: minTargetAmount,
                    max_target_amount: maxTargetAmount,
                    transaction_type: transactionType,
                    deadline: deadline,
                    bank_type: bankType
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    appendGoalToTable(goalName, minTargetAmount, maxTargetAmount, transactionType, deadline, bankType, data.goal_id);
                    // Optionally, remove the input row
                    row.remove();
                } else {
                    alert(data.message);
                }
            })
            .catch(error => console.error('Error:', error));
        }

        function appendGoalToTable(goalName, minTargetAmount, maxTargetAmount, transactionType, deadline, bankType, goalId) {
            const goalTableBody = document.getElementById('goalTableBody');
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>${goalName}</td>
                <td>₱${minTargetAmount} - ₱${maxTargetAmount}</td>
                <td>${transactionType}</td>
                <td>${deadline}</td>
                <td>${bankType}</td>
                <td>
                    <button class="delete-btn" onclick="deleteGoal(${goalId})">Delete</button>
                </td>
            `;
            goalTableBody.appendChild(newRow);
        }

        function deleteGoalRow(button) {
            const row = button.closest('tr');
            row.remove(); // Remove the row from the table
        }
    </script>
</body>

</html>