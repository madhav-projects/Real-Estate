<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RealEstate-Admin</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" href="images/logo md.png" type="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        #message {
            display: none;
            padding: 8px;
            border-radius: 18px;
            margin-bottom: 20px;
            text-align:center;
        }
    </style>
</head>
<body>
    <div class="hero_area">
        <!-- header section starts -->
        @include('agents.header')
        <!-- header section ends -->
        <div class="container">
            @include('admin.sidebar')
            <div class="form-container">
                <div id="message"></div>
                <form action="{{url('/add_property')}}" method="post" id="property_type" enctype="multipart/form-data">
                    @csrf
                    <div class="form-section">
                        <div class="form-group">
                            <label for="property-type">Property Type</label>
                            <select id="property-type" name="property_type" required>
                                <option value="">Select Type</option>
                                <option value="Houses">Houses</option>
                                <option value="Plots">Plots</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="selling-type">Selling Type</label>
                            <select id="selling-type" name="selling_type" required>
                                <option value="">Select Type</option>
                                <option value="Sale">Sale</option>
                                <option value="Rent">Rent</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="bhk">BHK</label>
                            <select id="bhk" name="bhk" required>
                                <option value="">Select</option>
                                <option value="1 BHK">1 BHK</option>
                                <option value="2 BHK">2 BHK</option>
                                <option value="3 BHK">3 BHK</option>
                                <option value="4 BHK">4 BHK</option>
                                <option value="5 BHK">5 BHK</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="bedroom">Bedroom</label>
                            <input type="number" id="bedroom" name="bedroom" min="1" max="10" required>
                        </div>

                        <div class="form-group">
                            <label for="bathroom">Bathroom</label>
                            <input type="number" id="bathroom" name="bathroom" min="1" max="10" required>
                        </div>

                        <div class="form-group">
                            <label for="kitchen">Kitchen</label>
                            <input type="number" id="kitchen" name="kitchen" min="1" max="10" required>
                        </div>

                        <div class="form-group">
                            <label for="balcony">Balcony</label>
                            <input type="number" id="balcony" name="balcony" min="1" max="10" required>
                        </div>

                        <div class="form-group">
                            <label for="hall">Hall</label>
                            <input type="number" id="hall" name="hall" min="1" max="10" required>
                        </div>
                    </div>

                    <div class="form-section">
                        <div class="form-group">
                            <label for="floor">Floor</label>
                            <select id="floor" name="floor" required>
                                <option value="Ground Floor">Ground Floor</option>
                                <option value="1st Floor">1st Floor</option>
                                <option value="2nd Floor">2nd Floor</option>
                                <option value="3rd Floor">3rd Floor</option>
                                <option value="4th Floor">4th Floor</option>
                                <option value="5th Floor">5th Floor</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="total-floor">Total Floor</label>
                            <select id="total-floor" name="total_floor" required>
                                <option value="5 Floors">5 Floors</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" id="price" name="price" required>
                        </div>

                        <div class="form-group">
                            <label for="area-size">Area Size (in sqft)</label>
                            <input type="text" id="area-size" name="area_size" required>
                        </div>

                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" id="city" name="city" required>
                        </div>

                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" id="state" name="state" required>
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" required>
                        </div>
                    </div>

                    <div class="form-section">
                        <h2>Image & Status</h2>

                        <div class="form-group">
                            <label for="image1">Image 1</label>
                            <input type="file" id="image1" name="image1" required>
                        </div>

                        <div class="form-group">
                            <label for="image2">Image 2</label>
                            <input type="file" id="image2" name="image2" required>
                        </div>

                        <div class="form-group">
                            <label for="image3">Image 3</label>
                            <input type="file" id="image3" name="image3" required>
                        </div>

                        <div class="form-group">
                            <label for="image4">Image 4</label>
                            <input type="file" id="image4" name="image4" required>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status" required>
                                <option value="">Select Status</option>
                                <option value="Available">Available</option>
                                <option value="Sold Out">Sold Out</option>
                            </select>
                        </div>
                    <div class="form-section button-section">
                        <button type="submit">Submit Property</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
    $(function() {
        // Set CSRF token for AJAX requests if using Laravel or similar frameworks
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Submit form using AJAX
        $('#property_type').submit(function(event) {
            event.preventDefault();  // Prevent the default form submission

            let formData = new FormData($('#property_type')[0]);  // Create a FormData object from the form

            // Log form data for debugging
            for (let pair of formData.entries()) {
                console.log(pair[0] + ': ' + pair[1]); 
            }

            $.ajax({
                type: "POST",  // HTTP method to use
                url: "/add_property",  // URL to send the request to
                data: formData,  // Form data to send
                processData: false,  // Prevent jQuery from processing the data
                contentType: false,  // Prevent jQuery from setting the content type
                success: function(response) {
                    console.log('Success:', response); // Log success response for debugging
                    $('#message').text('Property added successfully')
                        .css({'color': 'green', 'display': 'block', 'background-color': '#d4edda', 'border': '1px solid #c3e6cb'}); // Show the success message
                    $('#property_type')[0].reset(); // Clear the form fields
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error); // Log error for debugging
                    $('#message').text('Error: Something went wrong')
                        .css({'color': 'red', 'display': 'block', 'background-color': '#f8d7da', 'border': '1px solid #f5c6cb'}); // Show the error message
                }
            });
        });
    });
    </script>
</body>
</html>
<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
    display: flex;
    flex-direction: column;
}

.hero_area {
    display: flex;
    flex-direction: column;
    width: 100%;
}

.header_section {
    background-color: #5e3806;
    padding: 10px 0;
    border-bottom: 1px solid #ddd;
    font-family: 'Poppins', sans-serif;
}

.header_section .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.header_section .navbar {
    display: flex;
    align-items: center;
    width: 100%;
    justify-content: space-between;
}

.header_section .navbar-brand img {
    max-width: 120px;
    transition: transform 0.3s ease;
}

.header_section .navbar-brand img:hover {
    transform: scale(1.1);
}

.header_section .navbar-nav {
    list-style: none;
    display: flex;
    align-items: center;
    margin: 0;
    padding: 0;
    flex-grow: 1;
    justify-content: center;
}

.header_section .navbar-nav .nav-item {
    margin: 0 15px;
}

.header_section .navbar-nav .nav-item a {
    color: white;
    text-decoration: none;
    padding: 10px 15px;
    font-weight: bold;
    transition: color 0.3s ease, background-color 0.3s ease;
}

.header_section .navbar-nav .nav-item a:hover,
.header_section .navbar-nav .nav-item.active a {
    color: #ff7e5f;
    background-color: #463305;
    border-radius: 5px;
}

.header_section .navbar-nav .dropdown-menu {
    display: none;
    position: absolute;
    background-color: #463305;
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
    margin-top: 10px;
    padding: 0;
    list-style: none;
    border-radius: 5px;
    overflow: hidden;
}

.header_section .navbar-nav .dropdown-menu li {
    padding: 0;
}

.header_section .navbar-nav .dropdown-menu li a {
    color: white;
    text-decoration: none;
    display: block;
    padding: 10px 15px;
    transition: background-color 0.3s ease;
}

.header_section .navbar-nav .dropdown-menu li a:hover {
    background-color: #ff7e5f;
    color: white;
}

.header_section .navbar-nav .dropdown:hover .dropdown-menu {
    display: block;
}

.header_section .navbar-nav .dropdown-toggle::after {
    content: " \25BC";
    font-size: 0.7em;
    margin-left: 5px;
}

.container {
    display: flex;
    width: 100%;
}

.sidebar {
    width: 200px;
    background-color: #5e3806;
    color: white;
    min-height: 100vh;
    font-family: Arial, sans-serif;
}

.sidebar nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.sidebar nav ul li {
    padding: 15px;
    position: relative;
    transition: background-color 0.3s ease;
}

.sidebar nav ul li a {
    color: white;
    text-decoration: none;
    display: block;
    transition: color 0.3s ease;
}

.sidebar nav ul li a:hover,
.sidebar nav ul li a.active {
    background-color: #463305;
    color: #ffd700; /* Gold color for active link */
}

.sidebar nav ul ul {
    display: none;
    position: absolute;
    left: 200px;
    top: 0;
    background-color: #4a3306;
    padding: 0;
    margin: 0;
    min-width: 200px;
    z-index: 1000;
}

.sidebar nav ul li:hover ul {
    display: block;
}

.sidebar nav ul ul li {
    padding: 10px;
}

.sidebar nav ul ul li a:hover {
    background-color: #362504;
}

.sidebar nav ul li a::after {
    content: ' ▼';
    float: right;
    transition: transform 0.3s ease;
}

.sidebar nav ul li:hover > a::after {
    transform: rotate(180deg);
}

.sidebar nav ul ul li a::after {
    content: '';
}

.sidebar nav ul li a.active::after {
    transform: rotate(180deg);
}

.sidebar nav ul ul li a {
    padding-left: 30px;
}


.form-container {
    flex: 1;
    padding: 20px;
    background-color: #f4f4f4;
}

.form-section {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.form-group {
    flex: 1;
    min-width: 200px;
}

.form-group label {
    width: 100%;
    font-weight: bold;
    margin-bottom: 5px;
}

.form-group select,
.form-group input {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.form-section h2 {
    width: 100%;
}

.button-section {
    display: flex;
    justify-content: center; /* Center the button horizontally */
    width: 100%;
}

button[type="submit"] {
    padding: 10px 20px;
    background-color: #cd991b;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #5e3806;
}
</style>