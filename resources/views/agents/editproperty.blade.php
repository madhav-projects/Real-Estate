<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Property</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f7f9fc;
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .card-header {
            background-color: #007bff;
            color: white;
            font-size: 1.25rem;
            text-align: center;
            padding: 15px;
        }

        .form-label {
            font-weight: 600;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #ced4da;
            padding: 12px;
            font-size: 1rem;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 12px 20px;
            font-weight: 600;
            border-radius: 5px;
            width: 100%;
            font-size: 1.1rem;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .mb-3 {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Modal for Editing Property -->
        <div class="modal fade" id="editPropertyModal" tabindex="-1" role="dialog" aria-labelledby="editPropertyModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editPropertyModalLabel">Edit Property Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Edit Property Form -->
                        <form id="propertyForm">
                            <input type="hidden" id="editPropertyId">
                            <div class="mb-3">
                                <label for="editPropertyType" class="form-label">Property Type</label>
                                <input type="text" class="form-control" id="editPropertyType" required>
                            </div>
                            <div class="mb-3">
                                <label for="editSellingType" class="form-label">Selling Type</label>
                                <input type="text" class="form-control" id="editSellingType" required>
                            </div>
                            <div class="mb-3">
                                <label for="editAddress" class="form-label">Address</label>
                                <input type="text" class="form-control" id="editAddress" required>
                            </div>
                            <div class="mb-3">
                                <label for="editBhk" class="form-label">BHK</label>
                                <input type="text" class="form-control" id="editBhk" required>
                            </div>
                            <div class="mb-3">
                                <label for="editCity" class="form-label">City</label>
                                <input type="text" class="form-control" id="editCity" required>
                            </div>
                            <div class="mb-3">
                                <label for="editPrice" class="form-label">Price</label>
                                <input type="text" class="form-control" id="editPrice">
                            </div>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            // Automatically trigger the modal on page load
            $('#editPropertyModal').modal('show');

            // Function to fetch property details and populate the form
            function loadPropertyDetails(propertyId) {
                $.ajax({
                    url: '/edit_property/' + propertyId,  // Ensure this URL matches your route
                    method: 'GET',
                    success: function (response) {
                        if (response.success && response.data) {
                            // Loop over the properties (in case there are multiple)
                            const properties = Array.isArray(response.data) ? response.data : [response.data]; // Handle single or multiple properties
                            properties.forEach(function (property) {
                                $('#editPropertyId').val(property.id);
                                $('#editPropertyType').val(property.property_type);
                                $('#editSellingType').val(property.selling_type);
                                $('#editAddress').val(property.address);
                                $('#editBhk').val(property.bhk);
                                $('#editCity').val(property.city);
                                $('#editPrice').val(property.price || ''); // Handle null/empty values
                            });
                        } else {
                            console.error("Unexpected response format:", response);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('Error fetching property details:', error);
                        alert('Failed to fetch property details. Please try again.');
                    }
                });
            }

            // Trigger the loadPropertyDetails function (use actual property ID here)
            loadPropertyDetails(24);  // Replace `24` with the actual property ID you want to load

            // Form submission handler
            $('#propertyForm').on('submit', function (e) {
                e.preventDefault();  // Prevent the default form submission

                const propertyId = $('#editPropertyId').val(); // Get the property ID from the hidden input field
                const updatedProperty = {
                    property_type: $('#editPropertyType').val(),
                    selling_type: $('#editSellingType').val(),
                    address: $('#editAddress').val(),
                    bhk: $('#editBhk').val(),
                    city: $('#editCity').val(),
                    price: $('#editPrice').val(),
                };

                $.ajax({
                    url: '/property/' + propertyId,  // Ensure this URL is the correct route for updating the property
                    method: 'PUT',  // Use PUT for updating the resource
                    data: updatedProperty,
                    success: function (response) {
                        if (response.success) {
                            alert('Property updated successfully!');
                            window.location.href = '/properties';  // Update this URL to your "Show Properties" page URL
                        } else {
                            alert('Failed to save property details. Please try again.');
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('Error saving property details:', error);
                        alert('Failed to save property details. Please try again.');
                    }
                });
            });
        });
    </script>
</body>

</html>
