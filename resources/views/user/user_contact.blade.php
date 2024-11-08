<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Agent</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to bottom right, #007bff, #6f42c1);
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            margin: 0;
        }

        .contact-form-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
            position: relative;
        }

        .contact-form-container::before {
            content: "";
            position: absolute;
            top: -10px;
            right: -10px;
            bottom: -10px;
            left: -10px;
            background: linear-gradient(135deg, #007bff 0%, #6f42c1 100%);
            z-index: -1;
            border-radius: 12px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #6f42c1;
            font-weight: bold;
        }

        .form-group label {
            font-weight: bold;
            color: #6f42c1;
        }

        .form-group input, .form-group textarea {
            border: 1px solid #ddd;
            border-radius: 6px;
            padding-left: 40px;
            transition: border-color 0.3s;
        }

        .form-group input:focus, .form-group textarea:focus {
            border-color: #6f42c1;
            outline: none;
        }

        .form-group .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6f42c1;
        }

        .btn-submit {
            background-color: #6f42c1;
            color: #ffffff;
            border: none;
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border-radius: 6px;
            transition: background-color 0.3s;
        }

        .btn-submit:hover {
            background-color: #007bff;
        }

        .form-group {
            position: relative;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="contact-form-container">
        <h2>Contact Agent</h2>
        <form id="contactForm">
            @csrf
            <div class="form-group">
                <label for="userName">Your Name</label>
                <i class="input-icon fas fa-user"></i>
                <input type="text" class="form-control" id="userName" name="user_name" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label for="userPhone">Your Phone Number</label>
                <i class="input-icon fas fa-phone"></i>
                <input type="tel" class="form-control" id="userPhone" name="user_phone" placeholder="Enter your phone number" required>
            </div>
            <div class="form-group">
                <label for="userAddress">Your Address</label>
                <i class="input-icon fas fa-map-marker-alt"></i>
                <input type="text" class="form-control" id="userAddress" name="user_address" placeholder="Enter your address" required>
            </div>
            <div class="form-group">
                <label for="agentName">Agent Name</label>
                <i class="input-icon fas fa-user"></i>
                <input type="text" class="form-control" id="agentName" name="agent_name" placeholder="Enter agent's name" required>
            </div>
            <div class="form-group">
                <label for="agentPhone">Agent Phone Number</label>
                <i class="input-icon fas fa-phone"></i>
                <input type="tel" class="form-control" id="agentPhone" name="agent_phone" placeholder="Enter agent's phone number" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <i class="input-icon fas fa-comment"></i>
                <textarea class="form-control" id="message" name="message" rows="4" placeholder="Enter your message to the agent" required></textarea>
            </div>
            <button type="submit" class="btn btn-submit">Send Message</button>
        </form>
    </div>

    <!-- FontAwesome Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#contactForm').on('submit', function(e) {
                e.preventDefault(); // Prevent default form submission

                // Collect form data
                let formData = $(this).serialize();

                // Send AJAX request
                $.ajax({
                    url: "{{ url('agent_Message') }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        if (response.status === 'success') {
                            alert(response.message); // Display the success message
                            $('#contactForm')[0].reset(); // Clear the form if needed
                        }
                    },
                    error: function(xhr) {
                        alert("An error occurred. Please try again.");
                    }
                });
            });
        });
    </script>
</body> 
</html>
