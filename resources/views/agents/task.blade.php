<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
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
        <h1 class="text-center font-weight-bold">Task List</h1> <!-- Centered bold header above the table -->
        <div id="alertMessage" class="alert" style="display: none;"></div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Agent Name</th>
                    <th>Task</th>
                    <th>Due Date</th>
                </tr>
            </thead>
            <tbody id="taskTableBody">
                <!-- Rows will be populated by AJAX -->
            </tbody>
        </table>
    </div>

    <script>
        function fetchTasks() {
            $.ajax({
                url: '{{ url('fetch_task') }}', // Use Laravel's url helper for the endpoint
                method: 'GET',
                success: function(response) {
                    console.log(response); // Log the response to inspect the data structure
                    const taskTableBody = $('#taskTableBody');
                    const alertMessage = $('#alertMessage');
                    taskTableBody.empty(); // Clear any existing rows
                    alertMessage.hide(); // Hide the alert message

                    // Check if tasks are returned
                    if (response.assigntask && response.assigntask.length > 0) {
                        response.assigntask.forEach(function(task) {
                            const row = `
                                <tr>
                                    <td>${task.id}</td>
                                    <td>${task.agent_name}</td>
                                    <td>${task.task}</td>
                                    <td>${task.due_date}</td>
                                </tr>
                            `;
                            taskTableBody.append(row); // Append new row to the table body
                        });
                    } else {
                        // Show alert message if no tasks are found
                        alertMessage.text('No tasks found for this user.').show();
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching tasks:', error);
                    // Show an error message if the AJAX request fails
                    const alertMessage = $('#alertMessage');
                    alertMessage.text('Error fetching tasks. Please try again later.').show();
                }
            });
        }

        // Fetch tasks when the document is ready
        $(document).ready(function() {
            fetchTasks();
        });
    </script>
</body>
</html>
