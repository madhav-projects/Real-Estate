<!DOCTYPE html>
<html>
<head>
   <!-- Basic -->
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <!-- Mobile Metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <!-- Site Metas -->
   <meta name="keywords" content="" />
   <meta name="description" content="" />
   <meta name="author" content="" />
   <link rel="shortcut icon" href="images/logo_md.png" type="image/x-icon">
   
   <title>RealEstate</title>
   <link rel="stylesheet" href="{{ asset('css/admins.css') }}">
   <!-- bootstrap core css -->
   <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
   <!-- font awesome style -->
   <link href="css/font-awesome.min.css" rel="stylesheet" />
   <!-- Custom styles for this template -->
   <link href="css/style.css" rel="stylesheet" />
   <!-- responsive style -->
   <link href="css/responsive.css" rel="stylesheet" />
   <style>
      .hero_area {
         position: relative;
         height: 100vh;
         background: url('images/house1.jpg') no-repeat center center;
         background-size: cover;
      }
      .carousel-caption {
         position: absolute;
         left: 50%;
         transform: translate(-50%, -50%);
         color: white;
         text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
         background: rgba(0, 0, 0, 0.7); /* Black background with opacity */
         padding: 10px; /* Reduced padding */
         border-radius: 5px; /* Smaller border radius */
         font-size: 1.5em; /* Adjusted font size */
         opacity: 0; /* Start hidden */
      }
      .carousel-caption:nth-of-type(1) {
         animation: slideText 9s infinite, slideIn 1.5s ease-in-out forwards;
      }
      .carousel-caption:nth-of-type(2) {
         animation: slideText 9s infinite, fadeIn 1.5s ease-in-out 3s forwards;
      }
      .carousel-caption:nth-of-type(3) {
         animation: slideText 9s infinite, rotateIn 1.5s ease-in-out 6s forwards;
      }
      @keyframes slideText {
         0%, 22% { opacity: 1; }
         23%, 44% { opacity: 0; }
         45%, 67% { opacity: 1; }
         68%, 89% { opacity: 0; }
         90%, 100% { opacity: 1; }
      }
      @keyframes slideIn {
         0% {
            transform: translate(-50%, -60%);
            opacity: 0;
         }
         100% {
            transform: translate(-50%, -50%);
            opacity: 1;
         }
      }
      @keyframes fadeIn {
         0% {
            opacity: 0;
         }
         100% {
            opacity: 1;
         }
      }
      @keyframes rotateIn {
         0% {
            transform: translate(-50%, -50%) rotate(-360deg);
            opacity: 0;
         }
         100% {
            transform: translate(-50%, -50%) rotate(0deg);
            opacity: 1;
         }
      }
      .logo {
         position: absolute;
         top: 10px;
         left: 38px;
         height: 60px;
         width: 110px;
         z-index: 1000;
      }
      .luxe-text {
         position: absolute;
         top: 21px;
         left: 150px;
         z-index: 1000;
         font-weight: bold;
         font-size: 30px;
         font-size: 1.5em;
         color: black;
         text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
      }
      .login-signup {
         position: absolute;
         top: 20px;
         right: 50px; /* Adjusted from 20px to 50px */
         z-index: 1000;
      }
      .login-signup a {
         display: inline-block;
         margin: 3px;
         padding: 5px 20px;
         background: #f8b739;
         color: white;
         text-decoration: none;
         border-radius: 5px;
      }
      /* Dropdown menu styles */
      .dropdown-menu {
         display: none;
         position: absolute;
         background: white;
         box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
         z-index: 1000; /* Ensure dropdown is above other elements */
         top: 30px;
         left: -50px;
         padding: 0;
      }
      .dropdown:hover .dropdown-menu {
         display: block;
      }

      .dropdown-menu a {
         color: black;
         padding: 12px 16px;
         text-decoration: none;
         display: block;
         margin: 0;
         border-radius: 0;
         background: #fff;
      }

      .dropdown-menu a:hover {
         background-color: #f8b739;
         color: #fff;
      }
      .fixed-top {
         width: 100%;
         position: fixed;
         top: 0;
         left: 0;
         transition: background-color 0.3s ease;
         height: 85px;
      }
      .fixed-top.scrolled {
         background-color: rgba(255,255,255,0.9);
      }
      .product_section .box {
         width: auto;
      }
      @media (max-width:767px){
         .carousel-caption {
            width: 100%;
         }
         .login-signup {
            right: 0;
         }
      }
      .primeplex-caption {
         position: absolute;
         left: 26%;
         top: 25%;
         transform: translate(-50%, -50%);
         color: black;
         text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
         background: rgb(255 255 255 / 70%); /* Black background with opacity */
         padding: 10px;
         border-radius: 5px;
         font-size: 3em; /* Adjust font size as needed */
         opacity: 0; /* Start hidden */
         animation: fadeInUp 2s forwards; /* Apply animation */
      }
      @keyframes fadeInUp {
         0% {
            opacity: 0;
            transform: translateY(20px);
         }
         100% {
            opacity: 1;
            transform: translateY(0);
         }
      }
      .about-description {
         margin: 20px 0;
         padding: 10px;
         font-size: 1.2em;
         text-align: center;
         background-color: #f0f0f0;
         border-radius: 10px;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
         max-width: 600px;
      }
   </style>
</head>
<body>
   <div class="hero_area">
      <div class="fixed-top" id="navbar">
         <!-- Logo -->
         <img src="images/logo md.png" alt="Logo" class="logo">
         <!-- LuxeDwell Text -->
         <div class="luxe-text">LuxeDwell</div>
         <!-- Login and Signup Buttons -->
         <div class="login-signup">
            <a href="{{ route('login') }}">Login</a>
            <div class="dropdown" style="display:inline;">
               <a href="#" id="navbarDropdown" role="button">
                  Signup
               </a>
               <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('register') }}">User</a>
                  <a class="dropdown-item" href="{{ url('realtronregister') }}">Company/Agent</a>
               </div>
            </div>
         </div>
      </div>

      <!-- PrimePlex Text -->
      <div class="primeplex-caption">
         Welcome To LuxeDwell
      </div>

      <!-- Scrolling Text -->
      <div class="carousel-caption">
         <h2>The best way to buy your House and plots</h2>
      </div>
      <div class="carousel-caption" style="display:none;">
         <h2>The best way to buy your House and plots</h2>
      </div>
      <div class="carousel-caption" style="display:none;">
         <h2>The best way to buy your House and plots</h2>
      </div>
   </div>

   <!-- About Us Section -->
   <section id="about">
      <h2>About Us</h2>
      <!-- Add your existing About Us content here -->
      <div class="about-description">
         <p>LuxeDwell is committed to providing the best real estate services to help you find your dream home.</p>
         <p>We offer a wide range of properties to suit every budget and preference.</p>
      </div>
   </section>
</body>
</html>


   <!-- product section -->
  <!-- product section -->
  <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h1>About us</h1>
               <h2>
                  Our <span>Properties</span>
               </h2>
            </div>
            <div class="row">
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Men's Shirt
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/p1.webp" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                        4 BHK Luxury Apartments for sale in Alwarpet
                        </h5>
                        <h6>
                           9.00Cr
                        </h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/pl1.jpeg" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                        The Emerging New Trend Of Best Villa Plots In Chennai
                        </h5>
                        <h6>
                           80L
                        </h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/p2.webp" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                        4 BHK Luxury Independent Villas for sale in ECR
                        </h5>
                        <h6>
                           5.8L
                        </h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/pl2.jpeg" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                        Residentail Plot
                        </h5>
                        <h6>
                           70L
                        </h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/p3.webp" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                        4 BHK Villa in ECR Chennai
                        </h5>
                        <h6>
                           2.5Cr
                        </h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/pl3.jpeg" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                        Residential Land for sale in Chennai
                        </h5>
                        <h6>
                           58L
                        </h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/p4.webp" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                        4 BHK Ultra Luxury House near Royapettah for sale
                        </h5>
                        <h6>
                          8.6Cr
                        </h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/pl4.jpeg" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                        Best Plots with your Convenient Price
                        </h5>
                        <h6>
                           28L
                        </h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/p5.webp" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                        3 BHK Gated Villa for Rent in ECR (Seaside)
                        </h5>
                        <h6>
                           6.5Cr
                        </h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/pl5.jpeg" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                        1200 Sqft Residential Plot for sale
                        </h5>
                        <h6>
                           28L
                        </h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/p6.webp" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                        4 BHK Luxury Apartments in Nungambakkam for sale
                        </h5>
                        <h6>
                           6.7Cr
                        </h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/pl6.jpeg" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                        Residential 2000 Sqft Plot for sale at Chengalpattu, Chennai
                        </h5>
                        <h6>
                           32L
                        </h6>
                     </div>
                  </div>
               </div>
            </div>
            <div class="btn-box">
               <a href="">
               View All Properties
               </a>
            </div>
         </div>
      </section>
      
   
   <!-- end product section -->
   <!-- footer section -->
   @include('home.footer')
   <!-- footer end -->
   <div class="cpy_">
      <p class="mx-auto">&copy; 2024 All Rights Reserved.</p>
   </div>
   <!-- jQuery -->
   <script src="js/jquery-3.4.1.min.js"></script>
   <!-- popper js -->
   <script src="js/popper.min.js"></script>
   <!-- bootstrap js -->
   <script src="js/bootstrap.js"></script>
   <!-- custom js -->
   <script src="js/custom.js"></script>
   <script>
        document.addEventListener('scroll', function() {
            var navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>
