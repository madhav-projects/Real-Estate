<!-- Add this modal to the body of your HTML -->
<div id="editPropertyModal" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Property</h5>
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
                        <label for="editBhk" class="form-label">BHK</label>
                        <input type="text" class="form-control" id="editBhk" required>
                    </div>
                    <div class="mb-3">
                        <label for="editBedroom" class="form-label">Bedroom</label>
                        <input type="text" class="form-control" id="editBedroom" required>
                    </div>
                    <div class="mb-3">
                        <label for="editBathroom" class="form-label">Bathroom</label>
                        <input type="text" class="form-control" id="editBathroom" required>
                    </div>
                    <div class="mb-3">
                        <label for="editKitchen" class="form-label">Kitchen</label>
                        <input type="text" class="form-control" id="editKitchen" required>
                    </div>
                    <div class="mb-3">
                        <label for="editBalcony" class="form-label">Balcony</label>
                        <input type="text" class="form-control" id="editBalcony" required>
                    </div>
                    <div class="mb-3">
                        <label for="editHall" class="form-label">Hall</label>
                        <input type="text" class="form-control" id="editHall" required>
                    </div>
                    <div class="mb-3">
                        <label for="editFloor" class="form-label">Floor</label>
                        <input type="text" class="form-control" id="editFloor" required>
                    </div>
                    <div class="mb-3">
                        <label for="editTotalFloor" class="form-label">Total Floor</label>
                        <input type="text" class="form-control" id="editTotalFloor" required>
                    </div>
                    <div class="mb-3">
                        <label for="editAreaSize" class="form-label">Area Size</label>
                        <input type="text" class="form-control" id="editAreaSize" required>
                    </div>
                    <div class="mb-3">
                        <label for="editState" class="form-label">State</label>
                        <input type="text" class="form-control" id="editState" required>
                    </div>
                    <div class="mb-3">
                        <label for="editCity" class="form-label">City</label>
                        <input type="text" class="form-control" id="editCity" required>
                    </div>
                    <div class="mb-3">
                        <label for="editAddress" class="form-label">Address</label>
                        <input type="text" class="form-control" id="editAddress" required>
                    </div>
                    <div class="mb-3">
                        <label for="editStatus" class="form-label">Status</label>
                        <input type="text" class="form-control" id="editStatus" required>
                    </div>
                    <div class="mb-3">
                        <label for="editImage1" class="form-label">Image 1 URL</label>
                        <input type="text" class="form-control" id="editImage1">
                    </div>
                    <div class="mb-3">
                        <label for="editImage2" class="form-label">Image 2 URL</label>
                        <input type="text" class="form-control" id="editImage2">
                    </div>
                    <div class="mb-3">
                        <label for="editImage3" class="form-label">Image 3 URL</label>
                        <input type="text" class="form-control" id="editImage3">
                    </div>
                    <div class="mb-3">
                        <label for="editImage4" class="form-label">Image 4 URL</label>
                        <input type="text" class="form-control" id="editImage4">
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        // Set CSRF token for AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Function to fetch properties via AJAX
        function fetchProperties() {
            $.ajax({
                url: '{{ url('show_properties') }}', // Replace with your endpoint to fetch properties
                method: 'GET',
                success: function(response) {
                    // console.log(response); // Log the response to inspect the data structure
                    $('tbody').html("");
                    var tableBody = $('#Propertydetails');
                    tableBody.empty(); // Clear existing rows before appending

                    // Iterate through the properties and append to the table
                    if (response.property) {
                        response.property.forEach(function(property) {
                            var row = '<tr>' +
                                '<td>' + property.property_type + '</td>' +
                                '<td>' + property.selling_type + '</td>' +
                                '<td>' + property.bhk + '</td>' +
                                '<td>' + property.bedroom + '</td>' +
                                '<td>' + property.bathroom + '</td>' +
                                '<td>' + property.kitchen + '</td>' +
                                '<td>' + property.balcony + '</td>' +
                                '<td>' + property.hall + '</td>' +
                                '<td>' + property.floor+ '</td>' +
                                '<td>' + property.total_floor + '</td>' +
                                '<td>' + property.area_size + '</td>' +
                                '<td>' + property.state + '</td>' +
                                '<td>' + property.city + '</td>' +
                                '<td>' + property.address + '</td>' +
                                '<td>' + property.status + '</td>' +
                                '<td><img src="' + property.image1 + '" width="50px" height="50px"></td>' +
                                '<td><img src="' + property.image2 + '" width="50px"></td>' +
                                '<td><img src="' + property.image3 + '" width="50px"></td>' +
                                '<td><img src="' + property.image4 + '" width="50px"></td>' +
                                '<td>' +
                                '<button class="btn btn-danger deleteBtn" data-id="' + property.id + '">Delete</button> ' +
                                '<button class="btn btn-primary editBtn" data-id="' + property.id + '">Edit</button>' +
                                '</td>' +
                                '</tr>';
                            tableBody.append(row);
                        });
                    }

                    // Bind delete action to newly created delete buttons
                    $('.deleteBtn').click(function() {
                        var propertyId = $(this).data('id');
                        deleteProperty(propertyId);
                    });

                    // Bind edit action to newly created edit buttons
                    $('.editBtn').click(function() {
                        var propertyId = $(this).data('id');
                        fetchPropertyDetails(propertyId);
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        }

        // Function to fetch property details via AJAX
        function fetchPropertyDetails(propertyId) {
            $.ajax({
                url: '{{ url('get_property') }}/' + propertyId, // Replace with your endpoint to fetch property details
                method: 'GET',
                success: function(response) {
                    // Populate the edit form with the fetched property details
                    $('#editPropertyId').val(response.property.id);
                    $('#editPropertyType').val(response.property.property_type);
                    $('#editSellingType').val(response.property.selling_type);
                    $('#editBhk').val(response.property.bhk);
                    $('#editBedroom').val(response.property.bedroom);
                    $('#editBathroom').val(response.property.bathroom);
                    $('#editKitchen').val(response.property.kitchen);
                    $('#editBalcony').val(response.property.balcony);
                    $('#editHall').val(response.property.hall);
                    $('#editFloor').val(response.property.floor);
                    $('#editTotalFloor').val(response.property.total_floor);
                    $('#editAreaSize').val(response.property.area_size);
                    $('#editState').val(response.property.state);
                    $('#editCity').val(response.property.city);
                    $('#editAddress').val(response.property.address);
                    $('#editStatus').val(response.property.status);
                    $('#editImage1').val(response.property.image1);
                    $('#editImage2').val(response.property.image2);
                    $('#editImage3').val(response.property.image3);
                    $('#editImage4').val(response.property.image4);

                    // Show the modal
                    $('#editPropertyModal').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        }

        // Function to delete property via AJAX
        function deleteProperty(propertyId) {
            // Ask for confirmation before deleting
            var confirmation = confirm("Do you really want to delete this property?");
            if (confirmation) {
                $.ajax({
                    url: '{{ url('delete_property') }}/' + propertyId, // Replace with your endpoint to delete property
                    method: 'DELETE',
                    success: function(response) {
                        console.log(response);
                        $('button[data-id="' + propertyId + '"]').closest('tr').remove();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        }

        // Handle edit form submission
        $('#editPropertyForm').submit(function(e) {
            e.preventDefault();
            var propertyId = $('#editPropertyId').val();
            var propertyData = {
                property_type: $('#editPropertyType').val(),
                selling_type: $('#editSellingType').val(),
                bhk: $('#editBhk').val(),
                bedroom: $('#editBedroom').val(),
                bathroom: $('#editBathroom').val(),
                kitchen: $('#editKitchen').val(),
                balcony: $('#editBalcony').val(),
                hall: $('#editHall').val(),
                floor: $('#editFloor').val(),
                total_floor: $('#editTotalFloor').val(),
                area_size: $('#editAreaSize').val(),
                state: $('#editState').val(),
                city: $('#editCity').val(),
                address: $('#editAddress').val(),
                status: $('#editStatus').val(),
                image1: $('#editImage1').val(),
                image2: $('#editImage2').val(),
                image3: $('#editImage3').val(),
                image4: $('#editImage4').val()
            };

            $.ajax({
                url: '{{ url('update_property') }}/' + propertyId, // Replace with your endpoint to update property
                method: 'PUT',
                data: propertyData,
                success: function(response) {
                    $('#editPropertyModal').modal('hide');
                    fetchProperties(); // Refresh the property list
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });

        // Initial fetch of properties after document is ready
        fetchProperties();
    });
</script>
