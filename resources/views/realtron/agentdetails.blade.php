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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="overflow-x-hidden font-sans antialiased">
    <div class="hero_area">
    @include('realtron.header')
        <div class="container">
            
            <div class="row justify-content-center">
                <div class="col-md-12 ms-3 mt-5" style="width: 100%;">
                <h1 class="centered-header">User Request</h1>
                    <div class="table-section">
                    
                        <div class="table-responsive mt-3">
                            <table class="table table-section w-100">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Company Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>Area</th>
                                        <th>Role</th>
                                        <th>Pincode</th>
                                        <th>Status</th>
                                        <th>Profile</th>
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
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function fetchAgents() {
                $.ajax({
                    url: '{{ url('showagentregister') }}', // endpoint api
                    method: 'GET',
                    success: function(response) {
                        var tableBody = $('#Agentdetails');
                        tableBody.empty();

                        if (response.agent) {
                            response.agent.forEach(function(agent) {
                                var row = '<tr>' +
                                    '<td>' + agent.username + '</td>' +
                                    '<td>' + agent.agent_company + '</td>' +
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

.table-section {
    margin-top: 20px;
}

.centered-header {
    text-align: center;
    font-weight: bold;
    font-size: 23px;
    color: black; /* Change color to black */
    margin-bottom: -66px;
    padding: 60px; /* Keep padding */
}

.table-section .table {
    width: 100%;
    border-collapse: collapse;
    background-color: transparent; /* Remove background color */
    border-radius: 8px;
    overflow: hidden;
    box-shadow: none; /* Remove shadow */
}

.table-section th, .table-section td {
    padding: 12px;
    text-align: center;
    color: #333;
    border: 1px solid #ddd;
}

.table-section th {
    background-color: #f8f9fa; /* Light background for table headers */
    color: #000; /* Change header text color */
    font-weight: bold;
}

.table-section tbody tr:nth-child(even) {
    background-color: #f9f9f9; /* Light gray for even rows */
}

.table-section tbody tr:hover {
    background-color: #e0f7fa; /* Light hover effect */
}

.table-section button {
    padding: 5px 10px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    font-size: 0.9em;
}

.table-section .acceptBtn {
    /* Remove specific styling for accept button */
}

.table-section .rejectBtn, .table-section .deleteBtn {
    /* Remove specific styling for reject and delete buttons */
}

.table-section .editBtn {
    /* Remove specific styling for edit button */
}

.table-section button:hover {
    opacity: 0.8;
}
</style>
