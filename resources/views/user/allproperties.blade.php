<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $property->agent_name }} - {{ $property->property_type }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container py-5">
        <h1>{{ $property->agent_name }} - {{ $property->property_type }}</h1>
        <p><strong>Company Name:</strong> {{ $property->company_name }}</p>
        <p><strong>Address:</strong> {{ $property->address }}</p>
        <p><strong>Price:</strong> ${{ $property->price }}</p>

        <!-- Image Carousel -->
        <div id="propertyImagesCarousel" class="carousel slide mb-5" data-ride="carousel" style="display: none;">
            <div class="carousel-inner" id="carouselInner">
                <!-- Images will be added dynamically via AJAX -->
            </div>
            <a class="carousel-control-prev" href="#propertyImagesCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#propertyImagesCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <p id="noImagesMessage">No images available for this property.</p>

        <a href="javascript:history.back()" class="btn btn-primary">Go Back</a>
    </div>

    <script>
        $(document).ready(function() {
            // Fetch property images via AJAX
            $.ajax({
                url: '{{ url("get-property-images") }}/{{ $property->id }}',
                method: 'GET',
                success: function(response) {
                    const carouselInner = $('#carouselInner');
                    const propertyImagesCarousel = $('#propertyImagesCarousel');
                    const noImagesMessage = $('#noImagesMessage');

                    // Hide default no images message
                    noImagesMessage.hide();

                    // Check if there are images
                    if (response.images && response.images.length > 0) {
                        response.images.forEach((image, index) => {
                            const isActive = index === 0 ? 'active' : '';
                            const carouselItem = `
                                <div class="carousel-item ${isActive}">
                                    <img src="${image}" class="d-block w-100" alt="Property Image ${index + 1}" style="height: 400px; object-fit: cover;">
                                </div>
                            `;
                            carouselInner.append(carouselItem);
                        });

                        // Show the carousel
                        propertyImagesCarousel.show();
                    } else {
                        // Show no images message if no images are available
                        noImagesMessage.show();
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching images:', error);
                    $('#noImagesMessage').text('Error fetching images. Please try again later.').show();
                }
            });
        });
    </script>
</body>
</html>
