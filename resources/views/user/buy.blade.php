<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            padding-top: 60px; /* Adjust based on navbar height */
            font-family: Arial, sans-serif; /* Optional: Set a default font */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: -60px; /* Space between header and table */
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h1.text-center.font-weight-bold {
            text-align: center; /* Center the text */
            font-weight: bold; /* Make the text bold */
            margin-bottom: 20px; /* Space below the header */
            font-size: 24px; /* Adjust the font size if needed */
            padding: 60px; /* Add padding inside the header */
        }
        .alert {
            color: red;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    @include('agents.header')
    <div class="container py-5">
        <h1 class="text-center font-weight-bold">Properties for Sale</h1> <!-- Centered bold header above the table -->
        <div id="alertMessage" class="alert" style="display: none;"></div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Agent Name</th>
                    <th>Property Name</th>
                    <th>Price</th>
                    <th>Location</th>
                    <th>Available From</th>
                </tr>
            </thead>
            <tbody id="propertyTableBody">
                <!-- Rows will be populated by AJAX -->
            </tbody>
        </table>
    </div>

    <script>
        function fetchProperties() {
            $.ajax({
                url: '{{ url('fetch_agent_property') }}', // Use the correct endpoint to fetch properties
                method: 'GET',
                success: function(response) {
                    console.log(response); // Log the response to inspect the data structure
                    const propertyTableBody = $('#propertyTableBody');
                    const alertMessage = $('#alertMessage');
                    propertyTableBody.empty(); // Clear any existing rows
                    alertMessage.hide(); // Hide the alert message

                    // Check if properties are returned
                    if (response.properties && response.properties.length > 0) {
                        response.properties.forEach(function(property) {
                            const row = `
                                <tr>
                                    <td>${property.id}</td>
                                    <td>${property.agent_name}</td>
                                    <td>${property.name}</td>
                                    <td>${property.price}</td>
                                    <td>${property.location}</td>
                                    <td>${property.available_from}</td>
                                </tr>
                            `;
                            propertyTableBody.append(row); // Append new row to the table body
                        });
                    } else {
                        // Show alert message if no properties are found
                        alertMessage.text('No properties found for this user.').show();
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching properties:', error);
                    // Show an error message if the AJAX request fails
                    const alertMessage = $('#alertMessage');
                    alertMessage.text('Error fetching properties. Please try again later.').show();
                }
            });
        }

        // Fetch properties when the document is ready
        $(document).ready(function() {
            fetchProperties();
        });
    </script>
</body>
</html>
