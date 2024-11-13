<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Property Details</title>
    <link rel="stylesheet" href="styles.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="property-details" id="propertyDetails">
        <h1>Property Details</h1>
        <p>Company Name: <span id="companyName">{{ $property->company_name }}</span></p>
        <p>Agent Name: <span id="agentName">{{ $property->agent_name }}</span></p>
        <p>Price: ₹<span id="price">{{ number_format($property->price, 2) }}</span></p>

        <h2>Price Breakdown</h2>
        <p>Admin Share (5%): ₹<span id="adminShare">{{ number_format($property->price * 0.05, 2) }}</span></p>
        <p>Company Share (10%): ₹<span id="companyShare">{{ number_format($property->price * 0.10, 2) }}</span></p>
        <p>Agent Share (15%): ₹<span id="agentShare">{{ number_format($property->price * 0.15, 2) }}</span></p>
        <p>User Share (70%): ₹<span id="userShare">{{ number_format($property->price * 0.70, 2) }}</span></p>

        <div class="button-container">
            <button onclick="window.history.back();">Go Back</button>
            <button id="submitBtn">Submit</button>
        </div>
    </div>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }

        h1, h2 {
            color: #333;
        }

        .property-details {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        .property-details p {
            font-size: 16px;
            margin: 10px 0;
        }

        .property-details h2 {
            margin-top: 20px;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .button-container button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .button-container button#submitBtn {
            background-color: #28a745;
            color: white;
        }

        .button-container button#submitBtn:hover {
            background-color: #218838;
        }

        .button-container button {
            background-color: #007bff;
            color: white;
        }

        .button-container button:hover {
            background-color: #0056b3;
        }
    </style>

    <script>
        $(document).ready(function() {
            // Set CSRF token for AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // AJAX call to fetch property details by ID
            function fetchPropertyDetails(propertyId) {
                $.ajax({
                    url: '/property/' + propertyId,
                    type: 'GET',
                    success: function(response) {
                        // Update the HTML content with property data
                        $('#companyName').text(response.company_name);
                        $('#agentName').text(response.agent_name);
                        $('#price').text(parseFloat(response.price).toFixed(2));
                        $('#adminShare').text((response.price * 0.05).toFixed(2));
                        $('#companyShare').text((response.price * 0.10).toFixed(2));
                        $('#agentShare').text((response.price * 0.15).toFixed(2));
                        $('#userShare').text((response.price * 0.70).toFixed(2));
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching property details:', error);
                    }
                });
            }

            // Submit button click event
            $('#submitBtn').click(function() {
                // Use AJAX for form submission if needed
                $.ajax({
                    url: '/property/save',
                    type: 'POST',
                    data: {
                        company_name: $('#companyName').text(),
                        agent_name: $('#agentName').text(),
                        price: $('#price').text()
                        // Add other data as needed
                    },
                    success: function(response) {
                        alert('Property details submitted successfully!');
                    },
                    error: function(xhr, status, error) {
                        console.error('Error submitting property details:', error);
                    }
                });
            });
        });
    </script>
</body>
</html>
