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
    <link rel="shortcut icon" href="images/logo md.png" type="">
    <title>RealEstate</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <!-- Font Awesome Style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- Responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .hero_area {
            position: relative;
            background-image: url('images/seller bg.jpg'); /* Update with actual path to the image */
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: white;
            text-align: center;
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
        .header_section {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 10;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar-brand img {
            height: 40px;
        }
        .navbar-nav {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .nav-item {
            margin: 0 15px;
        }
        .nav-link {
            text-decoration: none;
            color: #333;
            font-size: 16px;
        }
        .nav-link:hover {
            color: #d4a253;
        }
        .search_section {
            background: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
            margin: auto;
        }
        .search_section h1 {
            font-size: 3rem;
            margin-bottom: 10px;
        }
        .search_section p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }
        .search_form .form-control {
            min-width: 150px;
            margin-right: 10px;
        }
        .search_form .btn-success {
            background-color: #d4a253;
            border-color: #d4a253;
        }
        .search_form .btn-success:hover {
            background-color: #c49248;
            border-color: #c49248;
        }
        .detail-box h6 {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .contact-us {
            margin-top: 10px;
            display: block;
            text-align: center;
        }
        .box {
            background-color: #f8f9fa; /* Light grey background */
            border-radius: 5px;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .btn-contact {
            display: block;
            width: 100%;
            text-align: center;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }
        .btn-contact:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="hero_area">
        <div class="container">
            <!-- header section starts -->
            @include('user.userheader')
            <!-- end header section -->
            <!-- search section -->
            <div class="search_section">
                <h1>Choose The Company</h1>
                <i>It’s better to hang out with people better than you</i>
                <div class="search_form">
                    <form action="properties.html" method="get" class="form-inline justify-content-center">
                    </form>
                </div>
                <a href="#c1" class="btn btn-primary">View</a>
            </div>
        </div>
    </div>

    <!-- product section -->
    <section class="product_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2 id="c1">
                    <span>Company Details</span>
                </h2>
            </div>
            <div class="row">
                @foreach($realtron as $companydetails)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box">
                        <div class="img-box">
                            <img src="{{ asset($companydetails->profile) }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                {{$companydetails->realtron_company}}
                            </h5>
                            <h6>
                                <span>{{$companydetails->phone}}</span> 
                                <span>{{$companydetails->email}}</span>
                                <span>{{$companydetails->address}}, {{$companydetails->city}}, {{$companydetails->area}}, {{$companydetails->pincode}}</span>
                                <span>{{$companydetails->age_of_company}}</span>
                                <span>{{$companydetails->bussiness_phone}}</span>
                            </h6>
                            <a href="{{url('seller_contact/'.$companydetails->id)}}" class="btn-contact">Contact Us</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- end product section -->

    <!-- Scripts -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>