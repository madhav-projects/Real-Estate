<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script> <!-- Include Bootstrap JS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <style>
        body {
            padding-top: 60px;
            font-family: Arial, sans-serif;
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
            padding: 60px;
        }
        .alert {
            color: red;
            margin-top: 20px;
        }
        .thumbnail-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            cursor: pointer;
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
        
        <!-- Carousel Section -->
        <div id="propertyCarousel" class="carousel slide mb-5" data-ride="carousel" style="display: none;">
            <div class="carousel-inner" id="carouselImages">
                <!-- Carousel images will be populate
                 d by AJAX -->
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
            <!-- Property cards will be populated by AJAX -->
        </div>
    </div>

    <script>
        function fetchProperties() {
            $.ajax({
                url: '{{ url("/fetch_agent_property") }}',
                method: 'GET',
                success: function(response) {
                    const propertyCards = $('#propertyCards');
                    const alertMessage = $('#alertMessage');
                    const carouselImages = $('#carouselImages');
                    const propertyCarousel = $('#propertyCarousel');

                    propertyCards.empty();
                    carouselImages.empty();
                    alertMessage.hide();
                    let firstProperty = true;

                    if (response.properties && response.properties.length > 0) {
                        response.properties.forEach(function(property, index) {
                            const price = property.price ? `$${property.price}` : 'Price Not Available';
                            
                            // Append property card
                            const card = `
    <div class="col-md-4 property-card">
        <div class="card">
            <a href="${property.image1}" target="_blank" data-title="${property.agent_name} - ${property.property_type}">
                <img src="${property.image1}" alt="Image 1" class="card-img-top">
            </a>
            <div class="card-body">
                <h5 class="card-title">${property.agent_name} - ${property.property_type}</h5>
                <p class="card-text">
                    <strong>Selling Type:</strong> ${property.selling_type}<br>
                    <strong>Company Name:</strong> ${property.company_name}<br>
                    
                    <strong>Address:</strong> ${property.address}<br>
                    <strong>Price:</strong> ${property.price}

                    <a href="/show_allproperties/${property.id}">View Details</a>  
                </p>
            </div>
        </div>
    </div>
`;

                            propertyCards.append(card);

                            // Add images to carousel if it's the first property
                            if (firstProperty) {
                                propertyCarousel.show();  // Show carousel if there's at least one property
                                const carouselItem1 = `<div class="carousel-item active"><img src="${property.image1}" class="d-block w-100" alt="Property Image 1"></div>`;
                                const carouselItem2 = `<div class="carousel-item"><img src="${property.image2}" class="d-block w-100" alt="Property Image 2"></div>`;
                                const carouselItem3 = `<div class="carousel-item"><img src="${property.image3}" class="d-block w-100" alt="Property Image 3"></div>`;
                                carouselImages.append(carouselItem1 + carouselItem2 + carouselItem3);
                                firstProperty = false;
                            }
                        });
                    } else {
                        alertMessage.text('No properties found for this user.').show();
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching properties:', error);
                    $('#alertMessage').text('Error fetching properties. Please try again later.').show();
                }
            });
        }

        $(document).ready(function() {
            fetchProperties();
        });
    </script>
</body>
</html>
