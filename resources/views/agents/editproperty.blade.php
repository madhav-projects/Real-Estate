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
    $(document).ready(function() {
    // Function to open the modal and fetch property details
    function openEditPropertyModal(propertyId) {
        // AJAX request to fetch property details
        $.ajax({
            url: 'editproperty' + propertyId, // Change this to your actual API endpoint
            method: 'GET',
            success: function(data) {
                // Assuming 'data' contains the property details
                $('#editPropertyId').val(data.id);
                $('#editPropertyType').val(data.propertyType);
                $('#editSellingType').val(data.sellingType);
                $('#editBhk').val(data.bhk);
                $('#editBedroom').val(data.bedroom);
                $('#editBathroom').val(data.bathroom);
                $('#editKitchen').val(data.kitchen);
                $('#editBalcony').val(data.balcony);
                $('#editHall').val(data.hall);
                $('#editFloor').val(data.floor);
                $('#editTotalFloor').val(data.totalFloor);
                $('#editAreaSize').val(data.areaSize);
                $('#editState').val(data.state);
                $('#editCity').val(data.city);
                $('#editAddress').val(data.address);
                $('#editStatus').val(data.status);
                $('#editImage1').val(data.image1);
                $('#editImage2').val(data.image2);
                $('#editImage3').val(data.image3);
                $('#editImage4').val(data.image4);
                
                // Show the modal
                $('#editPropertyModal').modal('show');
            },
            error: function(xhr, status, error) {
                console.error('Error fetching property details:', error);
                // You might want to handle the error here, e.g., display a message to the user
            }
        });
    }

    // Example of binding the function to a button click event
    $('.edit-property-button').on('click', function() {
        var propertyId = $(this).data('id'); // Get property ID from the button's data attribute
        openEditPropertyModal(propertyId);
    });
});

</script>
