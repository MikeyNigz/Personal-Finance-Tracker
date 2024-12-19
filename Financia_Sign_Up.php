<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Financia_Sign_Up_Images/financia logo.png">
    <link rel="stylesheet" href="Financia_Sign_Up_Css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>Financia - Sign Up</title>
    <style>
        @media screen and (max-width: 1920px) and (max-height: 1080px) {
            body {
                background: url(Financia_Sign_Up_Images/sign\ in\ background.png) no-repeat scroll;
                background-color: rgb(199, 163, 245);
                background-size: 1920px 890px;
                width: 90vw;
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
            <td class="Financia_box"><a class="Financia" href="Financia.html">Financia</a></td>
            <td style="width: 50vw;"></td>
            <td class="e-pay_box"><img class="e-pay_button" src="Financia_Home_Page_Images/plus.png" alt=""></td>
            <td class="notification_box"><img class="notification_button"
                    src="Financia_Home_Page_Images/Notification bell.png" alt=""></td>
            <td class="account_box">
                <img class="account" id="accountBtn" src="Financia_Home_Page_Images/Account profile.png" alt="">
                <div class="dropdown-menu" id="dropdownMenu">
                    <a href="Financia.php">Home</a>
                    <a href="Financia_Sign_In.php">Sign In</a>
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
        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
            <form action="">
                <tr>
                    <td class="td_select">
                        <button class="select_nav" onclick="window.location.href='Financia_Dashboard_Overview.html'">Overview</button>
                    </td>
                    <td class="td_select">
                        <button class="select_nav" onclick="window.location.href='#'">Summary</button>
                    </td>
                    <td class="td_select">
                        <button class="select_nav" onclick="window.location.href='#'">History</button>
                    </td>
                    <td class="td_select">
                        <button class="select_nav" onclick="window.location.href='#'">Transactions</button>
                    </td>
                    <td class="td_select">
                        <button class="select_nav" onclick="window.location.href='#'">Reports</button>
                    </td>
                </tr>
            </form>
        <?php else: ?>
            <tr>
                <td class="td_select">
                    <button class="select_nav" disabled style="opacity: 0.5;">Overview</button>
                </td>
                <td class="td_select">
                    <button class="select_nav" disabled style="opacity: 0.5;">Summary</button>
                </td>
                <td class="td_select">
                    <button class="select_nav" disabled style="opacity: 0.5;">History</button>
                </td>
                <td class="td_select">
                    <button class="select_nav" disabled style="opacity: 0.5;">Transactions</button>
                </td>
                <td class="td_select">
                    <button class="select_nav" disabled style="opacity: 0.5;">Reports</button>
                </td>
            </tr>
        <?php endif; ?>
    </table>

    <div class="login-container">
        <div class="login-box">
            <?php
            if (isset($_SESSION['signup_errors'])) {
                foreach ($_SESSION['signup_errors'] as $error) {
                    echo "<p style='color: red;'>$error</p>";
                }
                unset($_SESSION['signup_errors']);
            }
            ?>
            <form action="backend/process_signup.php" method="POST">
                <table>
                    <!-- First row of inputs -->
                    <tr class="input-group">
                        <td><label for="email">Email / Username</label></td>
                        <td><label for="birthdate">Birthdate</label></td>
                    </tr>
                    <tr class="input-group">
                        <td>
                            <div class="input-container">
                                <i class="fa-regular fa-user icon"></i>
                                <input type="text" 
                                       id="username" 
                                       name="username" 
                                       placeholder="Enter email or username" 
                                       required>
                                <i class="fa fa-times-circle clear-icon"></i>
                            </div>
                        </td>
                        <td>
                            <div class="input-container">
                                <i class="fa-regular fa-calendar-days icon"></i>
                                <input type="date" id="birthdate" name="birthdate" required>
                            </div>
                        </td>
                    </tr>

                    <!-- Password and City row -->
                    <tr class="input-group">
                        <td><label for="password">Password</label></td>
                        <td><label for="city">City</label></td>
                    </tr>
                    <tr class="input-group">
                        <td>
                            <div class="input-container">
                                <i class="fa fa-lock icon"></i>
                                <input type="password" id="password" name="password"
                                    placeholder="Password"
                                    minlength="6"
                                    title="Password must be at least 6 characters long"
                                    required>
                                <i class="fa fa-eye toggle-icon"></i>
                            </div>
                        </td>
                        <td>
                            <div class="input-container">
                                <i class="fa-solid fa-location-dot icon"></i>
                                <select id="city" name="city" required>
                                    <option value="">Select City</option>
                                    <option value="Manila">Manila</option>
                                    <option value="Quezon City">Quezon City</option>
                                    <option value="Makati">Makati</option>
                                    <option value="Taguig">Taguig</option>
                                    <option value="Pasig">Pasig</option>
                                    <option value="Pasay">Pasay</option>
                                    <option value="Mandaluyong">Mandaluyong</option>
                                    <option value="Marikina">Marikina</option>
                                    <option value="Caloocan">Caloocan</option>
                                    <option value="Valenzuela">Valenzuela</option>
                                    <option value="Parañaque">Parañaque</option>
                                    <option value="Muntinlupa">Muntinlupa</option>
                                </select>
                            </div>
                        </td>
                    </tr>

                    <!-- Confirm Password and Mobile Number row -->
                    <tr class="input-group">
                        <td><label for="confirm-password">Confirm Password</label></td>
                        <td><label for="mobile">Mobile Number</label></td>
                    </tr>
                    <tr class="input-group">
                        <td>
                            <div class="input-container">
                                <i class="fa fa-lock icon"></i>
                                <input type="password" id="confirm-password" name="confirmPassword"
                                    placeholder="Password"
                                    minlength="6"
                                    title="Password must be at least 6 characters long"
                                    required>
                                <i class="fa fa-eye toggle-icon"></i>
                            </div>
                        </td>
                        <td>
                            <div class="mobile-container">
                                <div class="prefix-box">+63</div>
                                <input type="text" id="mobile" name="mobile"

                                    maxlength="11"
                                    class="mobile-input"
                                    required>
                            </div>
                        </td>
                    </tr>

                    <!-- OTP Input -->
                    <tr class="input-group">
                        <td colspan="2" style="text-align: center;">
                            <label for="otp" style="display: inline-block;">Enter One Time Pin Code</Code></label>
                        </td>
                    </tr>
                    <tr class="input-group">
                        <td colspan="2">
                            <div class="input-container">
                                <i class="fa-solid fa-key icon"></i>
                                <input type="text" id="otp" name="otp" placeholder="Enter 6-digit OTP"
                                    maxlength="6" pattern="\d{6}" required>
                                <button type="button" class="send-otp" id="sendOtpBtn">Send OTP</button>
                            </div>
                            <div id="otpMessage" style="color: green; margin-top: 5px; display: none;"></div>
                        </td>
                    </tr>
                    <!-- Terms checkbox -->
                    <tr class="input-group">
                        <td colspan="2">
                            <input type="checkbox" id="terms" name="terms" required>
                            <label for="terms">I have read and agree to Financia.com's Terms of Service and Privacy Policy</label>
                        </td>
                    </tr>
                </table>

                <hr class="divider">

                <div class="button-container">
                    <button type="submit" class="login-btn">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
    <div>
        <hr style="margin: 11vw 0 0 -1vw; border: 0.1vw solid black; width: 39vw;">
        <hr style="width: 10vw; border: 0.1vw solid black; margin: -0.2vw 0 0 40vw;">
        <hr style="width: 3vw; border: 0.1vw solid black; margin: -0.2vw 0 0 53.5vw;">
        <hr style="width: 38.2vw; border: 0.1vw solid black; margin: -0.2vw 0 0 60vw;">
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sendOtpBtn = document.getElementById('sendOtpBtn');
            const otpMessage = document.getElementById('otpMessage');
            const emailInput = document.getElementById('username');

            sendOtpBtn.addEventListener('click', function() {
                const email = emailInput.value;
                if (!email) {
                    alert('Please enter your email first');
                    return;
                }

                // Disable the button
                sendOtpBtn.disabled = true;

                // Fetch OTP from PHP
                fetch('/Personal-Finance-Tracker/backend/send_otp.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ email: email })
                })
                .then(response => response.json())
                .then(data => {
                    otpMessage.style.display = 'block';
                    otpMessage.style.textAlign = 'center';
                    otpMessage.textContent = `OTP Code: ${data.otp}`;
                    
                    // Store OTP in session storage
                    sessionStorage.setItem('otp', data.otp);
                    
                    // Handle button cooldown
                    let timeLeft = 30;
                    sendOtpBtn.textContent = `Resend in ${timeLeft}s`;
                    
                    const timer = setInterval(() => {
                        timeLeft--;
                        sendOtpBtn.textContent = `Resend in ${timeLeft}s`;
                        if (timeLeft <= 0) {
                            clearInterval(timer);
                            sendOtpBtn.disabled = false;
                            sendOtpBtn.textContent = 'Send OTP';
                        }
                    }, 1000);
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Failed to send OTP. Please try again.');
                    sendOtpBtn.disabled = false;
                });
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            // Handle password visibility toggle
            const toggleIcons = document.querySelectorAll('.toggle-icon');
            toggleIcons.forEach(icon => {
                icon.addEventListener('click', function() {
                    const input = this.previousElementSibling;
                    if (input.type === 'password') {
                        input.type = 'text';
                        this.classList.remove('fa-eye');
                        this.classList.add('fa-eye-slash');
                    } else {
                        input.type = 'password';
                        this.classList.remove('fa-eye-slash');
                        this.classList.add('fa-eye');
                    }
                });
            });

            // Handle clear icon functionality
            const clearIcons = document.querySelectorAll('.clear-icon');
            const inputs = document.querySelectorAll('input[type="text"]:not([id="otp"])');

            // Show/hide clear icon based on input content
            inputs.forEach(input => {
                const clearIcon = input.nextElementSibling;

                // Initial state
                clearIcon.style.display = input.value ? 'block' : 'none';

                // Input event listener
                input.addEventListener('input', function() {
                    clearIcon.style.display = this.value ? 'block' : 'none';
                });

                // Clear icon click handler
                clearIcon.addEventListener('click', function() {
                    input.value = '';
                    this.style.display = 'none';
                    input.focus();
                });
            });
        });

        function formatPhoneNumber(input) {
            // Remove any non-digit characters
            let value = input.value.replace(/\D/g, '');

            // If the number starts with '9', add '0' prefix
            if (value.startsWith('9')) {
                value = '0' + value;
            }

            // Ensure the number starts with '09'
            if (value.length > 0 && !value.startsWith('09')) {
                value = value.substring(0, 0);
            }

            // Limit to 11 digits (including '09')
            if (value.length > 11) {
                value = value.substring(0, 11);
            }

            input.value = value;
        }
    </script>
</body>

</html>