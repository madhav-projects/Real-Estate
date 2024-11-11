<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Property</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0-alpha1/css/bootstrap.min.css">
    <style>
        .modal-header {
            background-color: #007bff;
            color: white;
        }
        .modal-title {
            font-weight: bold;
        }
        .modal-body {
            padding: 20px;
            background-color: #f8f9fa;
        }
        .form-label {
            font-weight: 600;
        }
        .form-control {
            border-radius: 5px;
            border: 1px solid #ced4da;
            padding: 10px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            font-weight: 600;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .edit-property-button {
            margin: 20px;
            font-size: 16px;
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    <!-- Edit Property Modal -->
    <div class="modal fade" id="editPropertyModal" tabindex="-1" aria-labelledby="editPropertyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPropertyModalLabel">Edit Property</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editPropertyForm">
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
                        <!-- Add additional fields as needed -->
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Trigger Button Example -->
    <button class="btn btn-info edit-property-button" data-id="23">Edit Property</button>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            function openEditPropertyModal(propertyId) {
                $.ajax({
                    url: '/property/' + propertyId, // Update this URL to match your API route
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data) {
                            const property = response.data;

                            // Populate each field using forEach to loop over keys
                            Object.keys(property).forEach(function(key) {
                                const field = $('#edit' + capitalizeFirstLetter(key));
                                if (field.length) {
                                    field.val(property[key]);
                                }
                            });

                            const editModal = new bootstrap.Modal(document.getElementById('editPropertyModal'));
                            editModal.show();
                        } else {
                            console.error("Unexpected response format:", response);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching property details:', error);
                        alert('Failed to fetch property details. Please try again.');
                    }
                });
            }

            // Function to capitalize the first letter of each key for matching form field IDs
            function capitalizeFirstLetter(string) {
                return string.charAt(0).toUpperCase() + string.slice(1);
            }

            $('.edit-property-button').on('click', function() {
                const propertyId = $(this).data('id');
                openEditPropertyModal(propertyId);
            });
        });
    </script>
</body>
</html>
