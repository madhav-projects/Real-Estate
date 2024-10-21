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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        #message {
            display: none;
            /* margin-top: -153px; */
            padding: 8px;
            border-radius: 18px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body class="overflow-x-hidden">
    <div class="hero_area">
        <!-- header section starts -->
        @include('agents.header')
        <!-- header section ends -->
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9" style="width: 80%;">
                
                <div class="row">
                    <h2  class="fs-5 fw-bold mt-4">Property Details</h2>
                    <div class="table-responsive">
                        <table class="table table-section w-100">
                            <thead>
                                <tr>
                                    <th>property_type</th>
                                    <th>selling_type</th>
                                    <th>bhk</th>
                                    <th>bedroom</th>
                                    <th>bathroom</th>
                                    <th>kitchen</th>
                                    <th>balcony</th>
                                    <th>hall</th>
                                    <th>floor</th>
                                    <th>total_floor</th>
                                    <th>area_size</th>
                                    <th>state</th>
                                    <th>city</th>
                                    <th>address</th>
                                    <th>status</th>
                                    <th>image1</th>
                                    <th>image2</th>
                                    <th>image3</th>
                                    <th>image4</th>
                                  
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody id="Propertydetails">
                               
                            </tbody>
                        </table>
                    </div>
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

           

            // Function to fetch categories via AJAX
            function fetchCategories() {
                $.ajax({
                    url: '{{ url('show_properties') }}', // Replace with your endpoint to fetch categories
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
                                  
                                    '<td><button class="btn btn-danger deleteBtn" data-id="' + property.id + '">Delete</button></td>' +
                                    '<button class="btn btn-primary editBtn" data-id="' + property.id + '">Edit</button>' +
                                    '</tr>';
                                tableBody.append(row);
                            });
                        }

                        // Bind delete action to newly created delete buttons
                        $('.deleteBtn').click(function() {
                            var categoryId = $(this).data('id');
                            deleteCategory(categoryId);
                        });
                        // Bind edit action to newly created edit buttons
                        $('.editBtn').click(function() {
                            var propertyId = $(this).data('id');
                            window.location.href = '/edit_property?id=' + propertyId;
                              });

                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }
            //end  fetch category

            // Function to delete category via AJAX
            function deleteCategory(categoryId) {
                // Ask for confirmation before deleting
                var confirmation = confirm("Do you really want to delete this category?");

                if(confirmation){
                    $.ajax({
                        url:'delete_category/' + categoryId,
                        method:'DELETE',
                        success:function(response){
                            console.log(response);
                            $('button[data-id="' + categoryId +'"]').closest('tr').remove();

                        },
                        error:function(xhr, status, error){
                            console.error(xhr.responseText);
                        }
                    });
                }
               
            }

            // Call fetchCategories after document is ready (optional)
            fetchCategories();
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
    /* padding: 10px 0; */
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

.header_section .navbar-nav {
    list-style: none;
    display: flex;
    align-items: center;
    margin: 0;
    padding: 0;
    flex-grow: 1;
    justify-content: center;
    flex-direction: row;
}

.header_section .navbar-nav .nav-item {
    margin: 0 15px;
}

.header_section .navbar-nav .nav-item a {
    color: white;
    text-decoration: none;
    padding: 10px 12px;
    font-weight: bold;
}

.header_section .navbar-nav .nav-item a:hover,
.header_section .navbar-nav .nav-item.active a {
    color: #c0392b;
}

.header_section .navbar-nav .dropdown-menu {
    display: none;
    position: absolute;
    background-color: white;
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
    margin-top: 10px;
    padding: 0;
    list-style: none;
}

.header_section .navbar-nav .dropdown-menu li {
    padding: 10px;
}

.header_section .navbar-nav .dropdown-menu li a {
    color: black;
    text-decoration: none;
    display: block;
}

.header_section .navbar-nav .dropdown:hover .dropdown-menu {
    display: block;
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


.dashboard {
    flex: 1;
    padding: 20px;
}

.dashboard header {
    margin-bottom: 20px;
}

.cards {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.card {
    flex: 1 1 calc(33.333% - 20px);
    background-color: #ecf0f1;
    padding: 20px;
    border-radius: 5px;
    text-align: center;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.card-content h2 {
    margin: 0;
    font-size: 2em;
}

.card-content p {
    margin: 5px 0 0;
    font-size: 1.2em;
    color: #7f8c8d;
}

.table-section {
    margin-top: 20px;
}

.table-section form {
    display: flex;
    gap: 10px;
    margin-bottom: 20px;
}

.table-section form input {
    padding: 10px;
    font-size: 1em;
    border: 1px solid #ccc;
    border-radius: 5px;
}
.table-container {
    overflow-x: auto;
    /* Center the c overflow-x: auto; */
    margin: 1px -244px;
    
    max-width: 1300px; /* Adjust max-width as needed */
}


.table-section form button {
    padding: 10px 20px;
    font-size: 1em;
    background-color: #3498db;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.table-section form button:hover {
    background-color: #2980b9;
}

.table-section table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.table-section th, .table-section td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: left;
}

.table-section th {
    background-color: #f2f2f2;
}

.table-section tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

.table-section tbody tr:hover {
    background-color: #f1f1f1;
}

.table-section button {
    padding: 5px 10px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

.table-section .accept {
    background-color: #2ecc71;
    color: white;
}

.table-section .reject {
    background-color: #e74c3c;
    color: white;
}

.table-section .delete {
    background-color: #e67e22;
    color: white;
}

.table-section button:hover {
    opacity: 0.8;
}

.center {
    margin: auto;
    width: 50%;
    text-align: center;
    margin-top: 10px;
    border: 3px solid #fff;
    padding: 20px; /* Add padding for better spacing */
}

.input_color {
    color: black;
    padding: 10px; /* Add padding for better spacing */
    margin-bottom: 10px; /* Add margin to separate elements */
    width: 35%; /* Adjust width for better alignment */
    border: 1px solid #ccc; /* Add border */
    border-radius: 5px; /* Add border radius for rounded corners */
}

input[type="submit"] {
    background-color: #3498db; /* Button color */
    color: white; /* Button text color */
    padding: 10px 20px; /* Add padding for better spacing */
    border: none; /* Remove border */
    border-radius: 5px; /* Add border radius for rounded corners */
    cursor: pointer; /* Add pointer cursor on hover */
}

input[type="submit"]:hover {
    background-color: #2980b9; /* Button hover color */
}
</style>