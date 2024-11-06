<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
            width: 98vw;
            height: 100vh;
            overflow-x: hidden;
            position: relative;
            z-index: 1;
        }

        /* Fullscreen blurred background */
        body::before {
            content: "";
            position: fixed; /* Fixed to cover the entire viewport */
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-image: url('images/bguser.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed; /* Keeps the image fixed during scroll */
            filter: blur(8px);
            z-index: -1; /* Behind content */
        }

        .property-card {
            margin-bottom: 20px;
        }

        .property-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            cursor: pointer;
        }

        h1.text-center.font-weight-bold {
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
            font-size: 24px;
            padding: 14px;
            color: white;
        }

        .alert {
            color: red;
            margin-top: 20px;
        }

        .carousel-inner img {
            height: 400px;
            object-fit: cover;
        }

    </style>
</head>
<body>
    @include('user.userheader')

    <div class="container py-5">
        <h1 class="text-center font-weight-bold">Properties for Sale</h1>
        <div id="alertMessage" class="alert" style="display: none;"></div>
        
        <!-- Carousel Section (if needed) -->
        <div id="propertyCarousel" class="carousel slide mb-5" data-ride="carousel" style="display: none;">
            <div class="carousel-inner" id="carouselImages">
                <!-- Carousel images will be populated by JavaScript -->
            </div>
            <a class="carousel-control-prev" href="#propertyCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#propertyCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div id="propertyCards" class="row">
            <!-- Property cards will be populated by JavaScript -->
        </div>
    </div>

    <script>
        function fetchPropertyDetails(id) {
            $.ajax({
                url: `/show_allproperties/${id}`,
                method: 'GET',
                success: function(response) {
                    const property = response.property; // The response is assumed to have a 'property' object
                    const propertyDetails = $('#propertyCards');
                    propertyDetails.empty(); // Clear any existing content

                    if (property) {
                        // Handle image paths properly, using either a default image or the actual one
                        const image1 = property.image1 ? `/images/${property.image1}` : '/images/default.jpg'; // Correct asset path handling

                        // Construct the property card HTML dynamically
                        const propertyHTML = `
                            <div class="col-md-6 mb-4">
                                <div class="card">
                                    <img src="${image1}" class="card-img-top" alt="Property Image">
                                    <div class="card-body">
                                        <h5 class="card-title">${property.property_type}</h5>
                                        <p class="card-text">
                                            <strong>Agent Name:</strong> ${property.agent_name || 'N/A'}<br>
                                            <strong>Selling Type:</strong> ${property.selling_type || 'N/A'}<br>
                                            <strong>Company Name:</strong> ${property.company_name || 'N/A'}<br>
                                            <strong>Address:</strong> ${property.address || 'N/A'}<br>
                                            <strong>Price:</strong> ${property.price ? '$' + property.price : 'Not available'}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        `;

                        propertyDetails.append(propertyHTML); // Add the property HTML to the page
                    } else {
                        propertyDetails.html('<p class="alert alert-warning">No property details found for this ID.</p>');
                    }
                },
                error: function() {
                    $('#propertyCards').html('<p class="alert alert-danger">Error fetching property details. Please try again later.</p>');
                }
            });
        }

        // Example: Call the function with a specific property ID (you can replace '1' with a dynamic ID)
        fetchPropertyDetails(1);
    </script>
</body>
</html>
