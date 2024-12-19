<?php
session_start();
if (!isset($_SESSION['username_email'])) {
    header('Location: Financia_Sign_In.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Financia_E_Pay.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Financia - E - Pay</title>
    <style>
        @media screen and (max-width: 1920px) and (max-height: 1080px) {
            body {
                background-image: url(Financia_Dashboard_Overview_Images/Dashboard\ Overview\ Background.png), url(Financia_Dashboard_Overview_Images/Dashboard\ Overview\ Background\ 2.png);
                background-color: rgb(199, 163, 245);
                background-repeat: no-repeat;
                background-position-y: top, center;
                background-size: 1920px 800px, 1920px 1020px;
                width: 95vw;
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
            <td class="e-pay_box"><img class="e-pay_button" src="Financia_Home_Page_Images/plus.png" alt=""></td>
            <td class="notification_box"><img class="notification_button"
                    src="Financia_Home_Page_Images/Notification bell.png" alt=""></td>
            <td class="account_box">
                <img class="account" id="accountBtn" src="Financia_Home_Page_Images/Account profile.png" alt="">
                <div class="dropdown-menu" id="dropdownMenu">
                    <a href="Financia_Sign_Up.php">Sign Up</a>
                    <a href="Financia_Account.php">Account</a>
                    <a href="backend/logout.php">Logout</a>
                    <script>
                        const accountBtn = document.getElementById('accountBtn');
                        const dropdownMenu = document.getElementById('dropdownMenu');

                        // Toggle the dropdown menu visibility
                        accountBtn.addEventListener('click', () => {
                            dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
                        });

                        // Close the dropdown if clicked outside
                        window.addEventListener('click', (event) => {
                            if (event.target !== accountBtn && !dropdownMenu.contains(event.target)) {
                                dropdownMenu.style.display = 'none';
                            }
                        });
                    </script>

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
                    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
                        <a class="nav_link" href="Financia_Dashboard_Overview.php">Overview</a>
                    <?php else: ?>
                        <span class="nav_link disabled">Overview</span>
                    <?php endif; ?>
                </td>
                <td class="td_link">
                    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
                        <a class="nav_link" href="Financia_Dashboard_Summary.html">Summary</a>
                    <?php else: ?>
                        <span class="nav_link disabled">Summary</span>
                    <?php endif; ?>
                </td>
                <td class="td_link">
                    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
                        <a class="nav_link" href="Financia_History.php">History</a>
                    <?php else: ?>
                        <span class="nav_link disabled">History</span>
                    <?php endif; ?>
                </td>
                <td class="td_link">
                    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
                        <a class="nav_link" href="Financia_Transactions.html">Transactions</a>
                    <?php else: ?>
                        <span class="nav_link disabled">Transactions</span>
                    <?php endif; ?>
                </td>
                <td class="td_link">
                    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
                        <a class="nav_link" href="Financia_Reports.html">Reports</a>
                    <?php else: ?>
                        <span class="nav_link disabled">Reports</span>
                    <?php endif; ?>
                </td>
            </tr>
        </form>
    </table>


    <div class="balance-cards">
        <div class="balance-card">
            <div class="card-header bdo-header">
                <img src="bdo.png" alt="BDO Logo" style="height: 20px; vertical-align: middle;">
            </div>
            <div class="card-balance" id="bdo-balance">₱ 0.00</div>
            <div class="card-footer">Total Balance</div>
            <div class="card-details">
                <div class="detail-box">
                    <div class="detail-amount" id="bdo-deposits">₱ 0.00</div>
                    <div class="detail-label">Total Deposits</div>
                </div>
                <div class="detail-box">
                    <div class="detail-amount" id="bdo-withdrawals">₱ 0.00</div>
                    <div class="detail-label">Total Withdrawals</div>
                </div>
            </div>
        </div>
        <div class="balance-card">
            <div class="card-header gcash-header">
                <img src="gcash.png" alt="GCash Logo" style="height: 20px; vertical-align: middle;">
            </div>
            <div class="card-balance" id="gcash-balance">₱ 0.00</div>
            <div class="card-footer">Total Balance</div>
            <div class="card-details">
                <div class="detail-box">
                    <div class="detail-amount" id="gcash-deposits">₱ 0.00</div>
                    <div class="detail-label">Total Deposits</div>
                </div>
                <div class="detail-box">
                    <div class="detail-amount" id="gcash-withdrawals">₱ 0.00</div>
                    <div class="detail-label">Total Withdrawals</div>
                </div>
            </div>
        </div>
    </div>

    <div class="summary-title">
        <h1>E-Pay Overview</h1>
    </div>
    <div class="summary-container">
        <div class="filter-bar">
            <select class="month-select">
                <option>Starting Month & Year</option>
            </select>
            <select class="month-select">
                <option>End Month & Year</option>
            </select>
            <button class="filter-btn">✓</button>
            <button class="filter-btn">✖</button>
        </div>
        <div class="table-container">
            <table class="summary-table">
                <thead>
                    <tr>
                        <th>Transaction Name and Type</th>
                        <th>Amount Transferred</th>
                        <th>Payment Option</th>
                        <th>Description</th>
                        <th>Date and Time</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="transactionTableBody">
                    <!-- Transaction rows will be populated dynamically -->
                </tbody>
            </table>
        </div>
    </div>

    <div class="summary-title">
        <h1>E-pay</h1>
    </div>
    <div class="epay-container">
        <div class="epay-card">
            <div class="top-bar">
                <div style="display: flex; gap: 150px; align-items: center; width: 100%; justify-content: flex-start; padding: 0px 20px;">
                    <div style="position: relative; display: inline-block;">
                        <select id="transaction-type" onchange="handleTransactionTypeChange(this.value)" style="appearance: none; background: #8000ff; color: white; border: none; padding: 8px 15px; border-radius: 20px; width: 150px; outline: none; cursor: pointer; ">
                            <option value="" disabled selected hidden>Transaction Type</option>
                            <option>Transfer Money</option>
                            <option>Deposit</option>
                            <option>Withdraw</option>
                        </select>
                        <div style="position: absolute; right: 0; top: 0; bottom: 0; width: 30px; background: rgb(185, 35, 255); border-radius: 0 20px 20px 0; pointer-events: none; display: flex; align-items: center; justify-content: center;">
                            <span style="border-left: 5px solid transparent; border-right: 5px solid transparent; border-top: 5px solid white;"></span>
                        </div>
                    </div>
                    <button type="button" class="confirm-btn" onclick="handleTransactionSubmit()" style="border-radius: 20px; width: 150px; background-color: #8000ff;">
                        Confirm Payment
                    </button>
                </div>
            </div>

            <div class="field" style="background: #6A2BC2;">
                <label style="color: pink; background: #340062; border-radius: 0; width: 120%;">Transaction Name:</label>
                <div style="position: relative; width: 60%; margin: 8px 100px;">
                    <div class="transaction-input" style="padding: 6px 25px 6px 10px; width: 100%; box-sizing: border-box; height: 30px; border-radius: 20px; outline: none; background: white; color: black; display: flex; align-items: center; justify-content: center;">
                        <!-- Text will be populated here by JavaScript -->
                    </div>
                </div>
            </div>

            <div class="field" style="background: #6A2BC2;">
                <label style="color: pink; background: #340062; border-radius: 0; width: 120%;">Payment Options:</label>
                <div style="display: inline-flex; gap: 15px; width: 110%; justify-content: center;">
                    <button class="payment-button" id="bdo-button" data-bank="bdo" disabled style="display: flex; align-items: center; gap: 5px; padding: 6px 12px; border-radius: 20px; border: none; width: 80px;">
                        <img src="Financia_E-Pay_Image/bdo.png" alt="BDO" style="height: auto; width: 100%;">
                    </button>
                    <button class="payment-button" id="gcash-button" data-bank="gcash" disabled style="display: flex; align-items: center; gap: 5px; padding: 6px 10px; border-radius: 20px; border: none; width: 80px;">
                        <img src="Financia_E-Pay_Image/gcash.png" alt="GCash" style="height: auto; width: 100%;">
                    </button>
                </div>
            </div>

            <div class="field" style="background: #6A2BC2;">
                <label style="color: pink; background: #000000; border-radius: 0;">Account Balance:</label>
                <div class="balance" style="background: #000000; border-radius: 0; text-align: center; padding: 15px 10px 10px 40px; color: pink;"></div>
            </div>

            <div class="field recipient-row" style="background: #6A2BC2;">
                <label style="color: pink; background: #340062; width: 120%; border-radius: 0;">Recipient Name:</label>
                <div style="position: relative; width: 60%; margin: 8px 100px;">
                    <input type="text" class="recipient-input" style="padding: 6px 25px 6px 50px; width: 100%; box-sizing: border-box; height: 30px; border-radius: 20px; outline: none;">
                    <span style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #666; line-height: 1;">✖</span>
                </div>
            </div>

            <div class="field recipient-row" style="background: #6A2BC2;">
                <label style="color: pink; background: #340062; width: 120%; border-radius: 0;">Recipient Account Number:</label>
                <div style="position: relative; width: 60%; margin: 8px 100px;">
                    <span style="position: absolute; left: 0px; top: 50%; transform: translateY(-50%); color: #ffffff; line-height: 1; background: rgba(128, 0, 139, 0.993); padding: 8px; border-radius: 20px; border-top-right-radius: 0px; border-bottom-right-radius: 0px; border: 1px solid rgb(0, 0, 0);">+63</span>
                    <input type="text" class="recipient-input" style="padding: 6px 25px 6px 50px; width: 100%; box-sizing: border-box; height: 30px; border-radius: 20px; outline: none;">
                </div>
            </div>

            <div class="field recipient-row" style="background: #6A2BC2;">
                <label style="color: pink; background: #340062; width: 120%; border-radius: 0;">Recipient Email:</label>
                <div style="position: relative; width: 60%; margin: 10px 100px;">
                    <span style="position: absolute; left: 0px; top: 50%; transform: translateY(-50%); color: #ffffff; line-height: 1; background: rgba(128, 0, 139, 0.993); padding: 8px 14px; border-radius: 20px; border-top-right-radius: 0px; border-bottom-right-radius: 0px; border: 1px solid rgb(0, 0, 0);"><i class="fas fa-envelope"></i></span>
                    <input type="text" class="recipient-input" style="padding: 6px 25px 6px 50px; width: 100%; box-sizing: border-box; height: 30px; border-radius: 20px; outline: none;">
                </div>
            </div>

            <div class="field" style="background: #6A2BC2;">
                <label style="color: pink;background: #340062; width: 120%; border-radius: 0;">Amount:</label>
                <div style="position: relative; width: 60%; margin: 10px 100px;">
                    <span style="position: absolute; left: 0px; top: 50%; transform: translateY(-50%); color: #ffffff; line-height: 1; background: rgba(128, 0, 139, 0.993); padding: 8px 14px; border-radius: 20px; border-top-right-radius: 0px; border-bottom-right-radius: 0px; border: 1px solid rgb(0, 0, 0);">₱</span>
                    <input type="number" class="recipient-input" style="padding: 6px 25px 6px 50px; width: 100%; box-sizing: border-box; height: 30px; border-radius: 20px; outline: none;">
                    <span style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #666; line-height: 1;">✖</span>
                </div>
            </div>

            <div class="field description" style="background: #0D0114; border-bottom: 3px solid rgb(255, 97, 247);">
                <label style="color: pink; background: #0D0114; border-radius: 0; padding: 20px 0px 20px 45px; margin: 0; height: auto;">Description (optional)</label>
                <textarea style="width: 70%; margin-left: 30%; padding: 10px; border-radius: 10;"></textarea>
            </div>

            <div class="field-group">
                <label style="color: pink; text-align: center; margin-bottom: 10px;">Pin Code:</label>
                <input type="text" 
                       style="width: 200px; 
                              height: 30px; 
                              border-radius: 20px; 
                              text-align: center;
                              margin: 0 auto;
                              font-size: 14px;
                              outline: none;
                              border: none;">
            </div>
        </div>
    </div>

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
            <td class="footer_link_box"><a class="footer_links" href="">Market Insights</a></td>
        </tr>
        <tr>
            <td class="footer_link_box"><a class="footer_links" href="">User Support</a></td>
            <td class="footer_link_box"><a class="footer_links" href="">Privacy Policy</a></td>
            <td class="footer_link_box"><a class="footer_links" href="">Budget Planner</a></td>
        </tr>
        <tr>
            <td class="footer_link_box"><a class="footer_links" href="">Contact Us</a></td>
            <td class="footer_link_box"><a class="footer_links" href="">Security Information</a></td>
            <td class="footer_link_box"><a class="footer_links" href="">Savings Tracker</a></td>
        </tr>
    </table>
    <br>
    <hr style="border: 0.1vw solid black; width: 99.2vw; margin: 0 -1vw 0 -1vw;">
    <p class="copyright">&copy; 2024 Financia. All Rights Reserved.</p>
    </table>

    <script>
    function updateTransactionName(selectedValue) {
        const transactionDisplay = document.querySelector('.transaction-input');
        if (transactionDisplay) {
            transactionDisplay.textContent = selectedValue;
        }
    }

    function handleTransactionTypeChange(selectedValue) {
        // Update transaction name
        const transactionDisplay = document.querySelector('.transaction-input');
        if (transactionDisplay) {
            transactionDisplay.textContent = selectedValue;
        }
        
        // Enable payment buttons
        const bdoButton = document.getElementById('bdo-button');
        const gcashButton = document.getElementById('gcash-button');
        if (bdoButton) bdoButton.disabled = false;
        if (gcashButton) gcashButton.disabled = false;
        
        // Get recipient rows
        const recipientRows = document.querySelectorAll('.recipient-row');

        // Show or hide recipient rows based on transaction type
        if (selectedValue === 'Withdraw' || selectedValue === 'Deposit') {
            recipientRows.forEach(row => {
                row.style.display = 'none'; // Hide recipient rows
            });
        } else {
            recipientRows.forEach(row => {
                row.style.display = 'table-row'; // Show recipient rows for Transfer Money
            });
        }
    }

    function animateValue(element, newValue) {
        element.classList.add('value-change');
        element.textContent = newValue;
        setTimeout(() => element.classList.remove('value-change'), 500);
    }

    function updateBalanceCards() {
        fetch('backend/get_balance_stats.php')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update BDO card with animation
                    const bdoBalance = `₱ ${parseFloat(data.bdo.balance).toLocaleString('en-PH', {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    })}`;
                    animateValue(document.getElementById('bdo-balance'), bdoBalance);
                    
                    const bdoDeposits = `₱ ${parseFloat(data.bdo.total_deposits).toLocaleString('en-PH', {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    })}`;
                    animateValue(document.getElementById('bdo-deposits'), bdoDeposits);
                    
                    const bdoWithdrawals = `₱ ${parseFloat(data.bdo.total_withdrawals).toLocaleString('en-PH', {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    })}`;
                    animateValue(document.getElementById('bdo-withdrawals'), bdoWithdrawals);

                    // Update GCash card with animation
                    const gcashBalance = `₱ ${parseFloat(data.gcash.balance).toLocaleString('en-PH', {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    })}`;
                    animateValue(document.getElementById('gcash-balance'), gcashBalance);
                    
                    const gcashDeposits = `₱ ${parseFloat(data.gcash.total_deposits).toLocaleString('en-PH', {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    })}`;
                    animateValue(document.getElementById('gcash-deposits'), gcashDeposits);
                    
                    const gcashWithdrawals = `₱ ${parseFloat(data.gcash.total_withdrawals).toLocaleString('en-PH', {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    })}`;
                    animateValue(document.getElementById('gcash-withdrawals'), gcashWithdrawals);
                }
            })
            .catch(error => console.error('Error updating balance cards:', error));
    }

    // Add auto-refresh every 30 seconds
    setInterval(updateBalanceCards, 30000);

    function checkLoginStatus() {
        fetch('backend/check_login.php')
            .then(response => response.json())
            .then(data => {
                if (!data.loggedIn) {
                    window.location.href = 'Financia_Sign_In.php';
                }
            })
            .catch(error => {
                console.error('Error checking login status:', error);
                window.location.href = 'Financia_Sign_In.php';
            });
    }

    // Check login status every minute
    setInterval(checkLoginStatus, 60000);

    function updateAccountBalance(selectedBank) {
        const balanceDiv = document.querySelector('.balance');
        if (!selectedBank) {
            balanceDiv.textContent = '₱ 0.00';
            return;
        }

        fetch('backend/check_balance.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ bank: selectedBank })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                balanceDiv.textContent = `₱ ${parseFloat(data.balance).toLocaleString('en-PH', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                })}`;
            } else {
                throw new Error(data.message || 'Failed to fetch balance');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            balanceDiv.textContent = '₱ 0.00';
            alert('Failed to fetch account balance: ' + error.message);
        });
    }

    // Ensure this function is called when a payment button is clicked
    document.addEventListener('DOMContentLoaded', function() {
        const bdoButton = document.getElementById('bdo-button');
        const gcashButton = document.getElementById('gcash-button');
        const pinCodeInput = document.querySelector('input[type="text"][placeholder="Pin Code:"]');

        // Populate the pin code input with the OTP if it exists in session storage
        const storedOtp = sessionStorage.getItem('otp');
        if (storedOtp) {
            pinCodeInput.value = storedOtp; // Set the value of the pin code input
            sessionStorage.removeItem('otp'); // Clear OTP from session storage after using it
        }

        [bdoButton, gcashButton].forEach(button => {
            button.addEventListener('click', function() {
                bdoButton.classList.remove('selected');
                gcashButton.classList.remove('selected');
                this.classList.add('selected');
                updateAccountBalance(this.id.replace('-button', '')); // Call the function with the selected bank
            });
        });
    });

    function handleTransactionSubmit() {
        const transactionType = document.getElementById('transaction-type').value;
        const selectedPayment = document.querySelector('.payment-button.selected');
        const amountInput = document.querySelector('input[type="number"].recipient-input');
        
        if (!transactionType || !selectedPayment || !amountInput?.value) {
            alert('Please fill in all required fields');
            return;
        }

        const transactionData = {
            transactionType: transactionType,
            paymentMethod: selectedPayment.id.replace('-button', ''),
            amount: parseFloat(amountInput.value),
            description: document.querySelector('.description textarea')?.value || ''
        };

        fetch('backend/save_epay.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(transactionData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Transaction successful');
                updateAccountBalance(transactionData.paymentMethod);
                updateBalanceCards();
                loadTransactions();
                clearForm();
            } else {
                throw new Error(data.message || 'Transaction failed');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert(error.message || 'An error occurred while processing your transaction');
        });
    }

    function clearForm() {
        document.getElementById('transaction-type').selectedIndex = 0;
        document.querySelectorAll('.recipient-input').forEach(input => input.value = '');
        document.querySelector('.description textarea').value = '';
        document.querySelectorAll('.payment-button').forEach(btn => {
            btn.classList.remove('selected');
            btn.disabled = true;
        });
    }

    function loadTransactions() {
        const tableBody = document.getElementById('transactionTableBody');
        
        fetch('backend/get_transactions.php')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    tableBody.innerHTML = ''; // Clear existing rows
                    
                    if (data.transactions.length === 0) {
                        tableBody.innerHTML = `
                            <tr>
                                <td colspan="6" style="text-align: center;">No transactions found</td>
                            </tr>
                        `;
                        return;
                    }
                    
                    data.transactions.forEach(transaction => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${transaction.transaction_type}</td>
                            <td>₱ ${parseFloat(transaction.amount).toLocaleString('en-PH', {
                                minimumFractionDigits: 2,
                                maximumFractionDigits: 2
                            })}</td>
                            <td>${transaction.payment_method === 'bdo' ? 'Online Bank' : 'GCash'}</td>
                            <td>${transaction.description || '-'}</td>
                            <td>${new Date(transaction.created_at).toLocaleDateString('en-PH')}<br>
                                ${new Date(transaction.created_at).toLocaleTimeString('en-PH', {
                                    hour: '2-digit',
                                    minute: '2-digit'
                                })}
                            </td>
                            <td><i class="fa fa-trash" title="Delete" onclick="deleteTransaction(${transaction.id})"></i></td>
                        `;
                        tableBody.appendChild(row);
                    });
                } else {
                    throw new Error(data.message || 'Failed to load transactions');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                tableBody.innerHTML = `
                    <tr>
                        <td colspan="6" style="text-align: center;">Error: ${error.message}</td>
                    </tr>
                `;
            });
    }

    // Call loadTransactions when page loads and after successful transaction
    document.addEventListener('DOMContentLoaded', loadTransactions);

    document.querySelector('.table2').addEventListener('click', function() {
        console.log('Table2 clicked!');
    });

    function updateTransactionOverview() {
        fetch('backend/get_transactions.php')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const tableBody = document.getElementById('transactionTableBody');
                    tableBody.innerHTML = ''; // Clear existing rows

                    if (data.transactions.length === 0) {
                        tableBody.innerHTML = `
                            <tr>
                                <td colspan="6" style="text-align: center;">No transactions found</td>
                            </tr>
                        `;
                        return;
                    }

                    data.transactions.forEach(transaction => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${transaction.transaction_type}</td>
                            <td>₱ ${parseFloat(transaction.amount).toLocaleString('en-PH', {
                                minimumFractionDigits: 2,
                                maximumFractionDigits: 2
                            })}</td>
                            <td>${transaction.payment_method === 'bdo' ? 'Online Bank' : 'GCash'}</td>
                            <td>${transaction.description || '-'}</td>
                            <td>${new Date(transaction.created_at).toLocaleDateString('en-PH')}<br>
                                ${new Date(transaction.created_at).toLocaleTimeString('en-PH', {
                                    hour: '2-digit',
                                    minute: '2-digit'
                                })}
                            </td>
                            <td><i class="fa fa-trash" title="Delete" onclick="deleteTransaction(${transaction.id})"></i></td>
                        `;
                        tableBody.appendChild(row);
                    });
                } else {
                    console.error('Failed to load transactions:', data.message);
                }
            })
            .catch(error => {
                console.error('Error fetching transactions:', error);
            });
    }

    // Call updateTransactionOverview every 30 seconds
    setInterval(updateTransactionOverview, 30000);

    // Call it immediately to load the latest data on page load
    updateTransactionOverview();
    </script>

</body>

</html>