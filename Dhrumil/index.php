<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Court DBMS</title>
    <link rel="stylesheet" href="public/css/carousel.css">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
    crossorigin="anonymous">
    <link rel = "icon"
    href = "public/images/statue.jpg"
    type = "image/x-icon">

</head>

<body>

<header>
    <div class="container-fluid p-0">
      <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">
        Court Case  System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
          aria-label="Toggle navigation">
          <i class="fas fa-align-right text-light"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <div class="mr-auto"></div>
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">HOME
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <!--<li class="nav-item">
              <a class="nav-link" href="#">BLOG</a>
            </li> -->  
            <li class="nav-item">
              <a class="nav-link" href="Contact.html">CONTACT</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="about.html">ABOUT</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    
    <div class="container text-center">
      <div class="row">
        <div class="col-md-7 col-sm-12  text-white">
          <!--<h6>CUSTOM CLOTHES,GUARANTEED FIT</h6>-->
         <h1>Famous law quote</h1>
          <p>
          "No one is above the law and no one is below the law. Justice has got to be blind. The
                    more powerful shall not pick on the less powerful."
          </p>
          <button class="btn btn-light px-5 py-2 primary-btn">
           Explore
          </button>
        
        </div>
        <div class="col-md-5 col-sm-12  h-25">
          <img src="public/images/tshirt.png" alt="girl" / class="img">
        </div>
      </div>
    </div>
  </header>
  
    <!-- home section ends -->
   <br>
   <br>
   <br>
   <br>
    <!--public/images/quote2.jpg
    onclick="'
    onclick="window.location.href='lawyer_login.php'
    onclick="window.location.href='admin_login.php'-->
    <div id="login">
        <div class="carousel-wrapper">
            <div class="carousel__button carousel__button--prev hide">
                <i class="fas fa-chevron-left fa-4x"></i>
            </div>
            <div class="carousel__track-container">
                <ul class="carousel__track">
                    <li class="carousel__slide current-slide">
                        <img class="carousel__image" src="public/images/quote1.jpg" alt="">
                        <button class="sm" id="client-btn" onclick="window.location.href='client_login.php'">
                            Log in as Client
                        </button>
                    </li>
                    <li class="carousel__slide">
                        <img class="carousel__image" src="public/images/quote2.jpg" alt="">
                        <button class="sm" id="lawyer-btn" onclick="window.location.href='lawyer_login.php'">
                            Log in as Lawyer
                        </button>
                    </li>
                    <li class="carousel__slide">
                        <img class="carousel__image" src="public/images/quote3.jpg" alt="">
                        <button class="sm" id="admin-btn" onclick="window.location.href='admin_login.php'">
                            Log in as Admin
                        </button>
                    </li>
                </ul>
            </div>
            <div class="carousel__button carousel__button--next">
                <i class="fas fa-chevron-right fa-4x"></i>
            </div>
        </div>
        <div class="carousel__nav">
            <button class="carousel__indicator current-slide"></button>
            <button class="carousel__indicator"></button>
            <button class="carousel__indicator"></button>
        </div>
    </div>
    <!-- login carousel ends -->
    <section class="section-1">
      <div class="container text-center">
        <div class="row">
          <div class="col-md-6 col-12">
            <div class="pray">
              <img src="public/images/fabrics.jpg" class="" />
            </div>
          </div>
          <div class="col-md-6 col-12">
            <div class="panel text-left">
              <h2>Fabric</h2>
              <p class="pt-4">
			  
              Our fabrics are sourced from only a handful of mills across the world. We work closely with our partner mills, to refine and innovate our fabric offerings.Learn about the fabric mills we work with here.We offer fabrics in a variety of weaves and counts. To learn more about different types of fabrics, click here.The life of your shirt depends on how you treat the shirt and the inherent fabric. Follow our simple wash care instructions to understand how to best care for your shirt, click here.
              </p>
			  
              <p>
              We do not hold any shirt inventory with us – we start working on your shirts once an order is received.All our shirts are made to measure. This is different from Bespoke. Learn about the difference here.
              Our proprietary software FitSmart, takes away the nervousness of providing your custom measurements online. 
                          
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
	
    <div id="faq">
        <div class="faq-content">
            <h3>Frequently asked Questions</h3>

            <button class="accordion">Is this website, a legit government website ?</button>
            <div class="panel">
                <p>Yes, this website is in control of the  Indian government and is a legit one.</p>
            </div>

            <button class="accordion">Is this website secure and safe?</button>
            <div class="panel">
                <p>This website take the users data and keeps it safe and secure. We assure you that your private data will only be used for necessary transaction purposes. </p>
            </div>

            <button class="accordion">What payment methods are accepted here?</button>
            <div class="panel">
                <p>You can pay for transaction using Credit , Debit Cards also the service of E- Challan or Net - Banking is made available for the users</p>
            </div>

            <button class="accordion">How to find the best suited lawyer for our case?</button>
            <div class="panel">
                <p>There are filters in the website that sorts various lawyers as per their field of specialization,ratings, win-ratio and cost,So that you can find the best suited lawyer for your case</p>
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
   
  
  
 
    <footer>
    <div class="container-fluid p-0">
      <div class="row text-left">
        <div class="col-md-5 col-sm-5">
          <h4 class="text-light">About us</h4>
          <p class="text-muted">Launched in 2019, Levyne aims to power fashion through technology. Backed up by highly experienced and talented fashion designers, we aim to produce the customisation you deserve.


</p>
          <p class="pt-4 text-muted">Copyright ©2019 All rights reserved | 
            <span> Levyne</span>
          </p>
        </div>
        <div class="col-md-5 col-sm-12">
          <h4 class="text-light">CONTACT US</h4>
          <p class="text-muted">Stay Updated</p>
          <form class="form-inline">
            <div class="col pl-0">
              <div class="input-group pr-5">
                <input type="text" class="form-control bg-dark text-white" id="inlineFormInputGroupUsername2" placeholder="Email">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-arrow-right"></i>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-2 col-sm-12">
          <h4 class="text-light">Follow Us</h4>
          <p class="text-muted">Let us be social</p>
          <div class="column text-light">
            <a href="http://www.facebook.com"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
            <a href="http://twitter.com/"><i class="fab fa-twitter"></i></a>
            <a href="http://linkedin.com/"><i class="fab fa-linkedin"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>


  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

     

    <script src="public/js/app.js"> </script>
</body>
</html>





<?php
//if logged in, will redirected to dashobard
if(isset($_SESSION['user'])){
    echo '<script>window.location.replace("clientdashboard.php");</script>';
}
//Logout Script
if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION);
    echo '<script>window.location.replace("index.php");</script>';
}

?>
