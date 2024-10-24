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


.container {
    display: flex;
    width: 100%;
}

.nav-link{
    color: #333 !important;
}
.nav-item{
    margin-left: 15px;
    margin-right: 15px;
}
        .table-responsive {
            overflow-x: auto;
        }

        .table-section th, .table-section td {
            padding: 8px;
            text-align: left;
            white-space: nowrap; /* Prevent text wrapping */
        }

        .container-fluid {
            padding-left: 0;
            padding-right: 0;
        }
        
    </style>
</head>
<body class="overflow-x-hidden font-sans antialiased">
    <div class="hero_area">
    <div class="container">
        <!-- header section starts -->
        @include('realtron.header')
        <!-- header section ends -->
        <div class="row">
            
            <div class="col-md-12 ms-3 mt-5" style="width: 100%;">
                <div class="row">
                    <h2 class="fs-5 fw-bold mt-5">Agent Details</h2>
                    <div class="table-responsive">
                        <table class="table table-section w-100">
                            <thead>
                            <tr>
                                    <th>username</th>
                                    <th>companyname</th>
                                    <th>phone</th>
                                    <th>email</th>
                                    <th>password</th>
                                    <th>address</th>
                                    <th>city</th>
                                    <th>area</th>
                                    <th>role</th>
                                    <th>pincode</th>
                                    <th>status</th>
                                    <th>profile</th>
                                    <th>Manage</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="Agentdetails">
                                <!-- Data will be populated here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function fetchAgents() {
                $.ajax({
                    url: '{{ url('showagentregister') }}',//endpoint api
                    method: 'GET',
                    success: function(response) {
                        var tableBody = $('#Agentdetails');
                        tableBody.empty();

                        if (response.agent) {
                            response.agent.forEach(function(agent) {
                              
                                    var row = '<tr>' +
                                        '<td>' + agent.username + '</td>' +
                                        '<td>' + agent.agent_company+ '</td>' +
                                        '<td>' + agent.phone + '</td>' +
                                        '<td>' + agent.email + '</td>' +
                                        '<td>' + agent.password + '</td>' +
                                        '<td>' + agent.address + '</td>' +
                                        '<td>' + agent.city + '</td>' +
                                        '<td>' + agent.area + '</td>' +
                                        '<td>' + agent.role + '</td>' +
                                        '<td>' + agent.pincode + '</td>' +
                                        '<td>' + agent.status + '</td>' +
                                        '<td>' + (agent.profile ? '<a href="' + agent.profile + '" target="_blank">View</a>' : 'N/A') + '</td>' +
                                        '<td>' +
                                            '<button class="acceptBtn btn btn-primary" data-id="' + agent.id + '">Accept</button> ' +
                                            '<button class="btn btn-danger rejectBtn" data-id="' + agent.id + '">Reject</button>' +
                                        '</td>' +
                                        '<td>' +
                                            '<button class="btn btn-primary editBtn me-1" data-id="' + agent.id + '">Edit</button>' +
                                            '<button class="btn btn-danger deleteBtn" data-id="' + agent.id + '">Delete</button>' +
                                        '</td>' +
                                        '</tr>';
                                    tableBody.append(row);
                                
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
                    url: '/Approve_detailagent/' + id,
                    method: 'POST',
                    success: function(response) {
                        if (response.success) {
                            alert(response.message);
                            location.reload();
                        } else {
                            alert('Failed to accept Agent: ' + response.error);
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
                    url: '/Reject_detailagent/' + id,
                    method: 'POST',
                    success: function(response) {
                        if (response.success) {
                            alert('Agent rejected successfully.');
                            location.reload();
                        } else {
                            alert('Failed to reject Agent.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            });

            fetchAgents();
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
        </style>