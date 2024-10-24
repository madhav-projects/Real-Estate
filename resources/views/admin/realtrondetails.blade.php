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
            padding: 8px;
            border-radius: 18px;
            margin-bottom: 20px;
        }
        

        .table-section {
    margin-top: 20px;
    overflow-x: auto; /* Enables horizontal scrolling */
}

.table-section table {
    width: 100%;
    max-width: 100%; /* Ensures table doesn't exceed the container's width */
    border-collapse: collapse;
    margin-top: 20px;
    margin-left: auto; /* Centers the table horizontally */
    margin-right: auto; /* Centers the table horizontally */
}

.table-section th, .table-section td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
    white-space: nowrap; /* Prevents wrapping of table content */
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


        .container-fluid {
            padding-left: 0;
            padding-right: 0;
        }
        .search-container {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 10px;
        }

        .search-input {
            width: 300px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .hero_area {
            width: 100%;
        }
    </style>
</head>
<body class="overflow-x-hidden">
    <div class="hero_area">
        <!-- header section starts -->
        @include('admin.header')
        <!-- header section ends -->
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-12" style="width: 100%;">
                <div class="row">
                    <h2 class="fs-5 fw-bold mt-4">Realtron Details</h2>
                    <div class="search-container">
                    <input type="text" id="searchInput" class="search-input" placeholder="Search agents...">
                </div>
                    <div class="table-responsive">
                        <table class="table table-section w-100">
                            <thead>
                                <tr>
                                    <th>username</th>
                                    <th>Realtroncompany</th>
                                    
                                    <th>phone</th>
                                    <th>email</th>
                                    <th>password</th>
                                    <th>address</th>
                                    <th>city</th>
                                    <th>area</th>
                                    <th>role</th>
                                    <th>status</th>
                                    <th>Manage</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody id="realtrondetails">
                                <!-- Data will be populated here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
       $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function fetchCategories() {
                $.ajax({
                    url: '{{ url('Realtrondetail') }}',
                    method: 'GET',
                    success: function(response) {
                        $('tbody').html("");
                        var tableBody = $('#realtrondetails');
                        tableBody.empty();

                        if (response.realtron) {
                            response.realtron.forEach(function(realtron) {
                                if (realtron.role === 'realtron') {
                                    var row = '<tr>' +
                                        '<td>' + realtron.username + '</td>' +
                                        '<td>' + realtron.realtron_company + '</td>' +
                                        
                                        '<td>' + realtron.phone + '</td>' +
                                        '<td>' + realtron.email + '</td>' +
                                        '<td>' + realtron.password + '</td>' +
                                        '<td>' + realtron.address + '</td>' +
                                        '<td>' + realtron.area + '</td>' +
                                        '<td>' + realtron.city + '</td>' +
                                        '<td>' + realtron.role + '</td>' +
                                        '<td>' + realtron.status + '</td>' +
                                        '<td>' +
                                            '<button class="acceptBtn btn btn-primary" data-id="' + realtron.id + '">Accept</button> ' +
                                            '<button class="btn btn-danger rejectBtn" data-id="' + realtron.id + '">Reject</button>' +
                                        '</td>' +
                                        // '<td>' +
                                        //     '<button class="btn btn-primary editBtn" data-id="' + realtron.id + '">Edit</button>' +
                                        //     '<button class="btn btn-danger deleteBtn" data-id="' + realtron.id + '">Delete</button>' +
                                        // '</td>' +
                                        '</tr>';
                                    tableBody.append(row);
                                }
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }

            $(document).on('click', '.acceptBtn', function() {
                var id = $(this).data('id');
                $.ajax({
                    url: '/Approve_detail/' + id,
                    method: 'POST',
                    success: function(response) {
                        console.log('Server response:', response);
                        if (response.success) {
                            alert(response.message);
                            location.reload();
                        } else {
                            alert('Failed to accept Realtron: ' + response.error);
                            console.error('Response Error:', response.error);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        alert('An error occurred: ' + xhr.responseText);
                    }
                });
            });

            $(document).on('click', '.rejectBtn', function() {
                var id = $(this).data('id');
                $.ajax({
                    url: '/Reject_detail/'+ id ,
                    method: 'POST',
                    success: function(response) {
                        if (response.success) {
                            alert('Realtron rejected successfully.');
                            location.reload();
                        } else {
                            alert('Failed to reject Realtron.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            });

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
    /* background-color: #5e3806; */
    /* padding: 5px 0; */
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
    max-width: 100px;
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
    padding: 5px 8px;
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

.container-fluid {
    padding-left: 0;
    padding-right: 0;
}

.user-info {
    display: flex;
    align-items: center;
    padding: 20px;
    background-color: #2e2e42;
    margin-top: 20px;
}

.user-info img {
    border-radius: 50%;
    width: 40px;
    height: 40px;
    margin-right: 10px;
}

.user-info span {
    display: block;
    color: #fff;
}

.user-info span:first-child {
    font-weight: bold;
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
    /* color: #7f8c8d; */
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
    padding: 8px;
    text-align: left;
    white-space: nowrap;
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
    padding: 20px;
}

.input_color {
    color: black;
    padding: 10px;
    margin-bottom: 10px;
    width: 35%;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="submit"] {
    background-color: #3498db;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #2980b9;
}

/* Sidebar Styles */
.sidebar {
    width: 250px;
    background-color: #2c3e50;
    color: #ecf0f1;
    padding: 20px;
    position: fixed;
    top: 60px; /* Adjust based on header height */
    left: 0;
    bottom: 0;
    overflow-y: auto;
}

.sidebar nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.sidebar nav ul li {
    margin-bottom: 15px;
}

.sidebar nav ul li a {
    color: #ecf0f1;
    text-decoration: none;
    display: block;
    padding: 10px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.sidebar nav ul li a:hover {
    background-color: #34495e;
}

.sidebar nav ul li ul {
    padding-left: 20px;
}

.sidebar nav ul li ul li a {
    background-color: #34495e;
    padding-left: 15px;
}

.sidebar nav ul li ul li a:hover {
    background-color: #3b5998;
}
