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
            font-family: Arial, sans-serif;
            padding-top: 60px;
            background-color: #f0f2f5;
            color: #333;
        }

        .property-card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-bottom: 20px;
            overflow: hidden;
            transition: transform 0.3s;
        }

        .property-card:hover {
            transform: scale(1.02);
        }

        .property-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .property-details {
            display: none;
            padding: 15px;
            background-color: #fff;
            border-top: 2px solid #ddd;
            border-radius: 0 0 8px 8px;
        }

        .property-info {
            color: #555;
            font-size: 0.9em;
        }

        .property-info p {
            margin: 5px 0;
        }

        .property-info strong {
            color: #333;
        }

        .property-title {
            font-size: 1.2em;
            font-weight: bold;
            color: #333;
        }

        .view-details-btn {
            background-color: #007bff;
            color: #fff;
        }

        .view-details-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <h1 class="text-center mb-4">Properties for Sale</h1>
        <div id="propertyCards" class="row">
            <!-- Property cards will be populated by JavaScript -->
        </div>
    </div>

    <script>
        // Fetch properties on page load
        function fetchProperties() {
            $.ajax({
                url: '{{ url("/fetch_agent_property") }}',
                method: 'GET',
                success: function(response) {
                    const propertyCards = $('#propertyCards');
                    propertyCards.empty();

                    if (response.properties && response.properties.length > 0) {
                        response.properties.forEach(function(property) {
                            const card = `
                                <div class="col-md-4">
                                    <div class="property-card">
                                        <img src="${property.image1}" alt="Property Image">
                                        <div class="p-3">
                                            <h5 class="property-title">${property.agent_name} - ${property.property_type}</h5>
                                            <p><strong>Address:</strong> ${property.address}</p>
                                            <p><strong>Price:</strong> ${property.price || 'Not available'}</p>
                                            <button onclick="viewDetails(${property.id}, '${property.image1}')"
                                                class="btn view-details-btn mt-2">View Details</button>
                                        </div>
                                        <div class="property-details" id="propertyDetails-${property.id}">
                                            <!-- Details will be populated dynamically -->
                                        </div>
                                    </div>
                                </div>
                            `;
                            propertyCards.append(card);
                        });
                    } else {
                        propertyCards.append('<p class="text-center text-danger">No properties found.</p>');
                    }
                },
                error: function() {
                    alert('Error fetching properties. Please try again later.');
                }
            });
        }

        // Display details for a specific property
        function viewDetails(id, image) {
            const detailsContainer = $(`#propertyDetails-${id}`);

            // Hide any other open details
            $('.property-details').not(detailsContainer).slideUp();

            // Toggle visibility for the clicked property details
            if (detailsContainer.is(':visible')) {
                detailsContainer.slideUp();
                return;
            }

            if (!detailsContainer.html().trim()) {
                $.ajax({
                    url: `/show_allproperties/${id}`,
                    method: 'GET',
                    success: function(response) {
                        if (response.property) {
                            const property = response.property;
                            const propertyDetails = `
                                <div class="property-info">
                                    <img src="${image}" alt="Property Image" class="mb-3">
                                    <p><strong>Agent Name:</strong> ${property.agent_name}</p>
                                    <p><strong>Property Type:</strong> ${property.property_type}</p>
                                    <p><strong>Selling Type:</strong> ${property.selling_type}</p>
                                    <p><strong>Company Name:</strong> ${property.company_name}</p>
                                    <p><strong>Address:</strong> ${property.address}</p>
                                    <p><strong>City:</strong> ${property.city}, ${property.state}</p>
                                    <p><strong>Floor:</strong> ${property.floor} of ${property.total_floor}</p>
                                    <p><strong>Bedrooms:</strong> ${property.bedroom}</p>
                                    <p><strong>Bathrooms:</strong> ${property.bathroom}</p>
                                    <p><strong>Balconies:</strong> ${property.balcony}</p>
                                    <p><strong>Area Size:</strong> ${property.area_size} sq ft</p>
                                    <p><strong>Status:</strong> ${property.status}</p>
                                    <p><strong>Price:</strong> ${property.price || 'Not available'}</p>
                                </div>
                            `;
                            detailsContainer.html(propertyDetails).slideDown();
                        } else {
                            alert('Property details not found.');
                        }
                    },
                    error: function() {
                        alert('Error fetching property details. Please try again later.');
                    }
                });
            } else {
                detailsContainer.slideDown();
            }
        }

        $(document).ready(function() {
            fetchProperties();
        });
    </script>
</body>
</html>
