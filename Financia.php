<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href=""><!--Financia logo not yet available-->
    <link rel="stylesheet" href="Financia CSS/Financia_Home_Page_Css.css">
    <title>Financia - Home Page</title>
    <style>
        @media screen and (max-width: 1920px) and (max-height: 1080px) {
            body {
                background-image: url(Financia_Home_Page_Images/Financia\ Home\ Page\ Background\ 1.png), url(Financia_Home_Page_Images/Financia\ Home\ Page\ Background\ 2.png), url(Financia_Home_Page_Images/Financia\ Home\ Page\ Background\ 3.mdp);
                background-color: rgb(199, 163, 245);
                background-repeat: no-repeat, no-repeat, no-repeat;
                background-position-y: top, center, bottom;
                background-size: 1800px 1600px, 1800px 1900px, 1800px 2340px;
                width: 95vw;
            }
        }

        @font-face {
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

        .nav_link.disabled {
            color: #999;
            cursor: not-allowed;
            text-decoration: none;
            pointer-events: none;
            opacity: 0.6;
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
                    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
                        <a href="Financia-E-Pay.php">E-Pay</a>
                        <a href="Financia_Goals.php">Goals</a>
                    <?php else: ?>
                        <a href="Financia_Sign_In.php">E-Pay</a>
                        <a href="Financia_Sign_In.php">Goals</a>
                    <?php endif; ?>
                </div>
            </td>

            <td class="notification_box"><img class="notification_button"
                    src="Financia_Home_Page_Images/Notification bell.png" alt=""></td>
            <td class="account_box">
                <img class="account" id="accountBtn" src="Financia_Home_Page_Images/Account profile.png" alt="">
                <div class="dropdown-menu" id="dropdownMenuAccount">
                    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
                        <a href="Financia_Sign_Up.php">Sign Up</a>
                        <a href="Financia_Account.php">Account</a>
                        <a href="backend/logout.php">Logout</a>
                    <?php else: ?>
                        <a href="Financia_Sign_In.php">Sign In</a>
                        <a href="Financia_Sign_Up.php">Sign Up</a>
                        <a href="Financia_Account.php">Account</a>
                    <?php endif; ?>
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

    <div style="display:inline-flex;">
        <table class="table3">
            <tr>
                <td class="table3_1">Building Financial Freedom Step by Step</td>
            </tr>
            <tr>
                <td class="table3_2">Explore proven strategies and expert guidance to <br> grow and protect your wealth.
                </td>
            </tr>
            <tr>
                <form action="Financia-Learn-More.html" style="cursor: pointer;">
                    <td class="table3_3"><input type="submit" id="Learn_more" value="Learn More"></td>
                </form>
            </tr>
        </table>
        <img class="image1" src="Financia_Home_Page_Images/Financia Home Page Image 1.png" alt="">
    </div>
    <br>
    <picture class="circles">
        <img class="purple_circle1" src="Financia_Home_Page_Images/Purple_circle image.png" alt="">
        <img class="white_circle1" src="Financia_Home_Page_Images/White_circle image.png" alt="">
        <img class="black_circle1" src="Financia_Home_Page_Images/Black_circle image.png" alt="">
    </picture>
    <br>
    <div style="display:inline-flex;">
        <picture class="circles2">
            <img class="image2" src="Financia_Home_Page_Images/Financia Home Page Image2.png" alt="">
            <img class="image3" src="Financia_Home_Page_Images/Financia Home Page Image3.png" alt="">
            <img class="image4" src="Financia_Home_Page_Images/Financia Home Page Image4.png" alt="">
        </picture>
        <table class="table4">
            <tr>
                <td class="table4_1">Your Money, Your Way: Advanced Finance Tracking Made Simple</td>
            </tr>
            <tr>
                <td class="table4_2">Get real-time reports, saving forecasts, and powerful budget tools. Explore premium
                    for deeper insights <br> and custom options</td>
            </tr>
            <tr>
                <form action="Financia-Premium.html" style="cursor: pointer;">
                    <td class="table4_3box"><input type="submit" id="premium_button"
                            value="Upgrade to Premium"></td>
                </form>
            </tr>
        </table>
    </div>

    <div class="div1">
        <div class="div2">
            <img class="div2_image" src="Financia_Home_Page_Images/cyber-security.png" alt="">
            <p class="secure">Secure</p>
            <div class="div1_link_box">
                <a class="div1_links" href=""><br>Learn More About Security</a>
            </div>
        </div>
        <div class="div3">
            <img class="div2_image" src="Financia_Home_Page_Images/easy.png" alt="">
            <p class="simple">Simple</p>
            <div class="div1_link_box">
                <a class="div1_links" href=""><br>Discover how it works</a>
            </div>
        </div>
        <div class="div4">
            <img class="div2_image" src="Financia_Home_Page_Images/target.png" alt="">
            <p class="goal_oriented">Goal Oriented</p>
            <div class="div1_link_box">
                <a class="div1_links" href=""><br>Start setting goals</a>
            </div>
        </div>
        <div class="div5">
            <img class="div2_image" src="Financia_Home_Page_Images/insight.png" alt="">
            <p class="insightful">Insightful</p>
            <div class="div1_link_box">
                <a class="div1_links" href=""><br>Read the latest news</a>
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

        function checkLoginStatus() {
            fetch('check_login.php')
                .then(response => response.json())
                .then(data => {
                    const loggedInMenu = document.getElementById('loggedInMenu');
                    const loggedOutMenu = document.getElementById('loggedOutMenu');

                    if (data.logged_in) {
                        loggedInMenu.style.display = 'block';
                        loggedOutMenu.style.display = 'none';
                    } else {
                        loggedInMenu.style.display = 'none';
                        loggedOutMenu.style.display = 'block';
                    }
                });
        }

        // Call this when page loads
        document.addEventListener('DOMContentLoaded', checkLoginStatus);
    </script>

</body>

</html>