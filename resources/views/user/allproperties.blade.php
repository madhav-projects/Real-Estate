<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <style>
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

    .navbar-nav {
        display: flex;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .nav-item {
        margin: 0 15px;
        position: relative;
    }

    .nav-link {
        text-decoration: none;
        color: #333;
        font-size: 16px;
        font-weight: bold;
        padding: 10px 15px;
        border-radius: 25px;
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
    }

    .nav-link:hover {
        color: white;
        background-color: #d4a253;
        box-shadow: 0px 4px 10px rgba(212, 162, 83, 0.5);
        transform: translateY(-3px);
        transition: 0.3s ease-out;
    }

    .animated-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: #d4a253;
        transition: all 0.4s ease;
        z-index: -1;
    }

    .animated-button:hover::before {
        left: 0;
    }

    .animated-button:active {
        transform: scale(0.95);
    }

    .active .nav-link {
        background-color: #d4a253;
        color: white;
        box-shadow: 0px 4px 10px rgba(212, 162, 83, 0.7);
    }

    .luxe-text {
        position: absolute;
        top: 21px;
        left: 150px;
        z-index: 1000;
        font-weight: bold;
        font-size: 30px;
        color: black;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .navbar-toggler {
        border: none;
        outline: none;
    }

    .navbar-toggler span {
        display: inline-block;
        width: 30px;
        height: 3px;
        background-color: #333;
        margin-top: 5px;
        transition: 0.3s;
    }

    .navbar-toggler:hover span {
        background-color: #d4a253;
        
    }
    .search_section {
            background: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
            margin: auto;
    }
        body {
            margin: 0;
            padding-top: 60px;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #f8f9fa;
        }

        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-image: url('{{ asset("images/bguser.png") }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            filter: blur(12px);
            z-index: -1;
        }

        h1.text-center.font-weight-bold {
            font-size: 2.5rem;
            color: #343a40;
            text-shadow: 1px 1px 6px rgba(0, 0, 0, 0.3);
            margin-bottom: 30px;
        }

        .card {
            background: #ffffffdd;
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-top: 20px;
            border-radius: 12px;
            overflow: hidden;
            max-width: 1000px;
            margin: 0 auto;
        }

        .card-body {
            padding: 20px;
            color: #343a40;
        }

        .card-title {
            font-size: 1.75rem;
            color: #495057;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .contact-btn {
            font-size: 0.9rem;
            padding: 8px 16px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }

        .contact-btn:hover {
            background-color: #0056b3;
            color: #fff;
        }

        .icon {
            margin-right: 8px;
            color: #000;
        }

        .icon:hover {
            color: #333;
            transition: color 0.2s ease-in-out;
        }

        .property-details {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            gap: 20px;
        }

        .property-details p {
            margin-bottom: 8px;
            font-size: 1.1rem;
            min-height: 32px;
        }

        /* Selected image styling */
        .selected-image img {
            width: 100%;
            height: 524px;
            object-fit: cover;
            border-radius: 12px;
        }

        /* Carousel thumbnails */
        .carousel-thumbnails {
        display: flex;
        justify-content: center; /* Center-align images */
        overflow-x: auto;
        margin-top: 10px;
        gap: 10px;
        padding-bottom: 10px;
    }
        .carousel-thumbnails img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
            cursor: pointer;
            transition: transform 0.3s ease-in-out;
        }

        .carousel-thumbnails img:hover {
            transform: scale(1.1);
        }

        @media (max-width: 768px) {
            h1.text-center.font-weight-bold {
                font-size: 2rem;
            }

            .selected-image img {
                height: 250px;
            }

            .property-details {
                grid-template-columns: 1fr 1fr 1fr;
            }
        }

        @media (max-width: 576px) {
            .property-details {
                grid-template-columns: 1fr 1fr;
            }
        }
    </style>
</head>
<body>
<header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container w-100">
        <img width="120" src="../images/logo md.png" alt="Logo" />
        <div class="luxe-text">LuxeDwell</div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""></span>
        </button>
        <div class="collapse navbar-collapse justify-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
               
            <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
                    <a class="nav-link animated-button" href="{{url('/home')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link animated-button" href="">Properties</a>
                </li> -->
                <li class="nav-item {{ Request::is('fetch_agent_property') ? 'active' : '' }}">
                    <a class="nav-link animated-button" href="{{url('/fetch_agent_property')}}">Buy</a>
                </li>
                <li class="nav-item {{ Request::is('view_seller') ? 'active' : '' }}">
                    <a class="nav-link animated-button" href="{{url('view_seller')}}">Sale</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link animated-button" href="#">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link animated-button" href="{{url('/seller')}}">Contact</a>
                </li> -->
                <x-app-layout></x-app-layout>
            </ul>
        </div>
    </nav>
</header>

    <div class="container py-5">
        <h1 class="text-center font-weight-bold">Property Details</h1>
        
        @if($property)
            <div class="selected-image mb-4">
                <img id="mainImage" src="{{ asset($property->image1) }}" alt="Selected Property Image">
            </div>

            <!-- Image Thumbnails Carousel -->
            <div class="carousel-thumbnails">
                <img src="{{ asset($property->image1) }}" alt="Property Image 1" onclick="displayImage('{{ asset($property->image1) }}')">
                @if($property->image2)
                    <img src="{{ asset($property->image2) }}" alt="Property Image 2" onclick="displayImage('{{ asset($property->image2) }}')">
                @endif
                @if($property->image3)
                    <img src="{{ asset($property->image3) }}" alt="Property Image 3" onclick="displayImage('{{ asset($property->image3) }}')">
                @endif
                @if($property->image4)
                    <img src="{{ asset($property->image4) }}" alt="Property Image 4" onclick="displayImage('{{ asset($property->image4) }}')">
                @endif
            </div>

            <!-- Property Details Card -->
            <div class="card mt-4">
                <div class="card-body">
                    <div class="card-title">
                        {{ $property->agent_name }} - {{ $property->property_type }}
                        <a href="{{ route('user_contact', ['id' => $property->agent_id]) }}" class="contact-btn">Contact Agent</a>
                    </div>
                    <div class="property-details">
                        <p><i class="fas fa-home icon"></i><strong>Property Type:</strong> {{ $property->property_type }}</p>
                        <p><i class="fas fa-tags icon"></i><strong>Selling Type:</strong> {{ $property->selling_type }}</p>
                        <p><i class="fas fa-bed icon"></i><strong>BHK:</strong> {{ $property->bhk }}</p>
                        <p><i class="fas fa-bed icon"></i><strong>Bedroom:</strong> {{ $property->bedroom }}</p>
                        <p><i class="fas fa-bath icon"></i><strong>Bathroom:</strong> {{ $property->bathroom }}</p>
                        <p><i class="fas fa-utensils icon"></i><strong>Kitchen:</strong> {{ $property->kitchen }}</p>
                        <p><i class="fas fa-wind icon"></i><strong>Balcony:</strong> {{ $property->balcony }}</p>
                        <p><i class="fas fa-couch icon"></i><strong>Hall:</strong> {{ $property->hall }}</p>
                        <p><i class="fas fa-layer-group icon"></i><strong>Floor:</strong> {{ $property->floor }}</p>
                        <p><i class="fas fa-building icon"></i><strong>Total Floor:</strong> {{ $property->total_floor }}</p>
                        <p><i class="fas fa-expand icon"></i><strong>Area Size:</strong> {{ $property->area_size }} sq ft</p>
                        <p><i class="fas fa-city icon"></i><strong>City:</strong> {{ $property->city }}</p>
                        <p><i class="fas fa-map-marker-alt icon"></i><strong>State:</strong> {{ $property->state }}</p>
                        <p><i class="fas fa-map-pin icon"></i><strong>Address:</strong> {{ $property->address }}</p>
                        <p><i class="fas fa-info-circle icon"></i><strong>Status:</strong> {{ $property->status }}</p>
                        <p><i class="fas fa-dollar-sign icon"></i><strong>Price:</strong> ${{ $property->price }}</p>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-danger text-center mt-5">{{ $message ?? 'No property details available.' }}</div>
        @endif
    </div>
    <div class="mt-4 text-center">
    <p style="font-size: 1.2rem; color: white;">
        LuxeDwell offers premium real estate solutions, helping you find your dream property with ease.
        Our platform features a curated selection of homes and a seamless experience for both buyers and sellers.
        Discover LuxeDwell for a luxurious and effortless property journey.
    </p>
</div>

    <script>
        function displayImage(imagePath) {
            document.getElementById('mainImage').src = imagePath;
        }
    </script>


</body>
</html>
