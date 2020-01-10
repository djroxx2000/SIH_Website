<?php require_once("includes/header.php"); ?>

    <!--Vertical Left in-page Nav Bar-->
    <div>
        <ul>
            <li class="navbar" title="Home" onclick="location.href = '#home' ">
                <i class="fab fa-jira fa-2x" id="home-btn"></i>
            </li>
            <li class="navbar" title="Login/Signup" onclick="location.href = '#login' ">
                <i class="fab fa-jira fa-2x" id="login-btn"></i>
            </li>
            <li class="navbar" title="FAQ" onclick="location.href = '#faq' ">
                <i class="fab fa-jira fa-2x" id="faq-btn"></i>
            </li>
            <li class="navbar" title="Contact" onclick="location.href = '#contact' ">
                <i class="fab fa-jira fa-2x" id="contact-btn"></i>
            </li>
        </ul>
    </div>
    <!-- left nav ends-->

    <div id="home">
        <div class="title-bar">
            <div id="item1">
                <i class="fas fa-gavel fa-3x"></i>
                <h1>Court Case Information System</h1>
            </div>
            <div id="item2">
                <button class="sm" id="home-login-btn" onclick="location.href='#login'">Login</button>
                <button class="sm" id="home-login-btn" onclick="location.href='#'">Signup</button>
            </div>
        </div>
        <div class="index">
            <div class="left">
                <p class="quote">"No one is above the law and no one is below the law. Justice has got to be blind. The
                    more powerful shall not pick on the less powerful."
                    <br><br>
                    <span id="quote1">
                        ~ Josh Earnest
                    </span>
                </p>
            </div>

            <div class="right">
                <img src="public/images/statue.jpg" alt="statue" class="justice">
            </div>
        </div>
    </div>
    <!-- home section ends -->

    <div id="login">
        <div class="carousel-wrapper">
            <div class="carousel">

                <img class="carousel__photo initial" src="public/images/quote1.jpg">
                <button class="sm" id="client-btn" onclick="window.location.href='client.php?q=login'">Log in as Client</button>
                <div id="client-div"></div>
                <img class="carousel__photo" src="public/images/quote2.jpg">
                <button class="sm" id="lawyer-btn" onclick="window.location.href='lawyer.php?q=login'"> Log in as Lawyer</button>
                <div id="lawyer-div"></div>

                <button class="sm btn-main" id="admin-btn" onclick="window.location.href='admin.php?q=login'">Admin</button>
                <div id="admin-div"></div>

                <div class="carousel__button--next"></div>
                <div class="carousel__button--prev"></div>

            </div>
        </div>
    </div>
    <!-- login carousel ends -->

    <div id="faq">
        <div class="faq-content">
            <h3>Frequently asked Questions</h3>

            <button class="accordion">Question 1 ?</button>
            <div class="panel">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
            </div>

            <button class="accordion">Question 2 ?</button>
            <div class="panel">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
            </div>

            <button class="accordion">Question 3 ?</button>
            <div class="panel">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
            </div>

            <button class="accordion">Question 4 ?</button>
            <div class="panel">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
            </div>

            <button class="accordion">Question 5 ?</button>
            <div class="panel">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
            </div>

            <button class="accordion">Question 6 ?</button>
            <div class="panel">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
            </div>

            <button class="accordion">Question 7 ?</button>
            <div class="panel">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
            </div>
        </div>
    </div>
    <!-- faq section ends -->

<?php require_once("includes/footer.php"); ?>
