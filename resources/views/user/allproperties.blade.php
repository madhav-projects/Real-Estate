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

        .carousel-inner img {
            height: 400px;
            object-fit: cover;
            border-radius: 8px;
        }

        .card {
            background: #ffffffdd;
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-top: 20px;
            border-radius: 12px;
            overflow: hidden;
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
            background-color: #007bff;
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
            color: #007bff;
        }

        .property-details p {
            margin-bottom: 8px;
            font-size: 1.1rem;
        }

        @media (max-width: 768px) {
            h1.text-center.font-weight-bold {
                font-size: 2rem;
            }
            .carousel-inner img {
                height: 250px;
            }
        }
    </style>
</head>
<body>
    @include('user.userheader')

    <div class="container py-5">
        <h1 class="text-center font-weight-bold">Property Details</h1>
        
        @if($property)
            <!-- Carousel Section -->
            <div id="propertyCarousel" class="carousel slide mb-4" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset($property->image1) }}" class="d-block w-100" alt="Property Image 1">
                    </div>
                    @if($property->image2)
                        <div class="carousel-item">
                            <img src="{{ asset($property->image2) }}" class="d-block w-100" alt="Property Image 2">
                        </div>
                    @endif
                    @if($property->image3)
                        <div class="carousel-item">
                            <img src="{{ asset($property->image3) }}" class="d-block w-100" alt="Property Image 3">
                        </div>
                    @endif
                </div>
                <a class="carousel-control-prev" href="#propertyCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon btn-carousel-control" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#propertyCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon btn-carousel-control" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <!-- Property Details Card -->
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        {{ $property->agent_name }} - {{ $property->property_type }}
                        
                        <a href="{{ route('user_contact') }}" class="contact-btn">Contact Agent</a>

                    </div>
                    <div class="property-details row">
                        <!-- Column 1 -->
                        <div class="col-md-6">
                            <p><i class="fas fa-home icon"></i><strong>Property Type:</strong> {{ $property->property_type }}</p>
                            <p><i class="fas fa-tags icon"></i><strong>Selling Type:</strong> {{ $property->selling_type }}</p>
                            <p><i class="fas fa-bed icon"></i><strong>BHK:</strong> {{ $property->bhk }}</p>
                            <p><i class="fas fa-bed icon"></i><strong>Bedroom:</strong> {{ $property->bedroom }}</p>
                            <p><i class="fas fa-bath icon"></i><strong>Bathroom:</strong> {{ $property->bathroom }}</p>
                            <p><i class="fas fa-utensils icon"></i><strong>Kitchen:</strong> {{ $property->kitchen }}</p>
                            <p><i class="fas fa-wind icon"></i><strong>Balcony:</strong> {{ $property->balcony }}</p>
                        </div>
                        <!-- Column 2 -->
                        <div class="col-md-6">
                            <p><i class="fas fa-couch icon"></i><strong>Hall:</strong> {{ $property->hall }}</p>
                            <p><i class="fas fa-layer-group icon"></i><strong>Floor:</strong> {{ $property->floor }}</p>
                            <p><i class="fas fa-building icon"></i><strong>Total Floor:</strong> {{ $property->total_floor }}</p>
                            <p><i class="fas fa-expand icon"></i><strong>Area Size:</strong> {{ $property->area_size }} sq ft</p>
                            <p><i class="fas fa-city icon"></i><strong>City:</strong> {{ $property->city }}</p>
                            <p><i class="fas fa-map-marker-alt icon"></i><strong>State:</strong> {{ $property->state }}</p>
                            <p><i class="fas fa-map-pin icon"></i><strong>Address:</strong> {{ $property->address }}</p>
                            <p><i class="fas fa-info-circle icon"></i><strong>Status:</strong> {{ $property->status }}</p>
                            <p><i class="fas fa-dollar-sign icon"></i><strong>Price:</strong> ${{ $property->price ?? 'Not available' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-danger text-center mt-5">{{ $message ?? 'No property details available.' }}</div>
        @endif
    </div>
</body>
</html>
