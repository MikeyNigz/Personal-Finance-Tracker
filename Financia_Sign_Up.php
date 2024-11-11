<?php
session_start();

if ($_SERVER["REQUEST METHOD"] == "POST") {
    $username = $_POST['username'];
    $birthdate = $_POST['birthdate'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confrimPassword'];
    $country = $_POST['country'];

    if ($password !== $confrimPassword) {
        echo "<p stlyle='color: red;'>Passwords do not match.</p>";
        exit;
    }
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$_SESSION['user'] = [
    'username' => $username,
    'birthdate' => $birthdate,
    'password' => $password,
    'country' => $country
];

echo "<p style='color: green;'>Registration succesful! Welcome, $username.</p>";
echo "<a href='login.php'>Go to Login Page</a>";

?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Financia_Sign_Up_Images/financia logo.png">
    <link rel="stylesheet" href="Financia CSS/Financia_Sign_Up_Css.css">
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
                    <a href="Financia_Sign_In.html">Sign In</a>
                    <a href="Financia_Sign_Up.html">Sign Up</a>
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
                <td class="td_select"><select class="select_nav" name="Dashboard" id="Dashboard_category">
                        <option value="Dashboard">Dashboard</option>
                        <option value="Overview">Overview</option>
                        <option value="Summary">Summary</option>
                    </select></td>
                <td class="td_select"><select class="select_nav" name="History" id="History_category">
                        <option value="History">History</option>
                        <option value="Activity Log">Activity Log</option>
                        <option value="Transactions">Transactions</option>
                        <option value="Previous Reports">Previous Reports</option>
                    </select></td>
                <td class="td_select"><select class="select_nav" name="Progress" id="Progress_category">
                        <option value="Progress">Progress</option>
                        <option value="Goals">Goals</option>
                        <option value="Achievements">Achievements</option>
                        <option value="Milestone">Milestone</option>
                    </select></td>
                <td class="td_select"><select class="select_nav" name="Insights" id="Insights_category">
                        <option value="Insights">Insights</option>
                        <option value="Data Analysis">Data Analysis</option>
                        <option value="Recommendations">Recommendations</option>
                        <option value="Reports">Reports</option>
                    </select></td>
                <td class="td_select"><select class="select_nav" name="News" id="News_category">
                        <option value="News">News</option>
                        <option value="Latest Updates">Latest Updates</option>
                        <option value="Announcements">Announcements</option>
                    </select></td>
            </tr>
        </form>
    </table>

    <div class="login-container">
        <div class="login-box">
            <form action="signup.php" method="post">
                <table>
                    <tr class="input-group">
                        <td><label for="email">Email / Username</label></td>
                        <td><label for="birthdate">Birthdate</label></td>
                    </tr>
                    <tr class="input-group">
                        <td>
                            <div class="input-container">
                                <i class="fa-regular fa-user icon"></i>
                                <input type="text" id="username" name="username" placeholder="Email / Username"
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
                    <tr class="input-group">
                        <td><label for="password">Password</label></td>
                        <td><label for="country">Country</label></td>
                    </tr>
                    <tr class="input-group">
                        <td>
                            <div class="input-container">
                                <i class="fa fa-lock icon"></i>
                                <input type="password" id="password" name="password" placeholder="Password" required>
                                <i class="fa fa-eye toggle-icon"></i>
                            </div>
                        </td>
                        <td>
                            <div class="input-container">
                                <i class="fa-regular fa-globe icon"></i>
                                <select id="country" name="country" required>
                                    <option value="">Select Country</option>
                                    <option value="AU">Australia</option>
                                    <option value="AT">Austria</option>
                                    <option value="BH">Bahrain</option>
                                    <option value="BD">Bangladesh</option>
                                    <option value="BE">Belgium</option>
                                    <option value="BJ">Berlin</option>
                                    <option value="BO">Bolivia</option>
                                    <option value="BR">Brazil</option>
                                    <option value="PH">Phillipines</option>
                                    <option value="US">United States</option>
                                    <option value="UK">United Kingdom</option>
                                </select>
                            </div>

                            </select>
        </div>
        </td>
        </tr>
        </table>

        <tr class="input-group">
            <td><label for="confirm-password">Confirm Password</label></td>
        </tr>
        <tr class="input-group">
            <td>

                <div class="input-container">
                    <i class="fa fa-lock icon"></i>
                    <input type="password" id="confirm-password" name="confirmPassword" placeholder="Password" required>
                    <i class="fa fa-eye toggle-icon"></i>
                </div>
            </td>
        </tr>
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
            <div class="vertical-line"></div>
            <button type="button" class="google-btn">Sign Up with Google</button>
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

</body>

</html>