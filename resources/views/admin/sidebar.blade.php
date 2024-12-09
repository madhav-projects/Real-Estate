<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LuxeDwell Admin Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
        }
        .sidebar {
            width: 270px;
            background-color: #333;
            color: #fff;
            height: 100vh;
            position: fixed;
            padding-top: 132px;
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
            padding: 15px;
            background-color: #3c2626; /* Dark Brown */
            color: white;
            border-radius: 25px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            font-size: 1.8em;
            font-weight: bold;
            border: 3px solid #ffd000; /* Golden border */
        }
        .sidebar a {
            text-decoration: none;
            color: #fff;
            display: flex;
            align-items: center;
            transition: background 0.3s;
            margin: 10px 20px; /* Add spacing between boxes */
            padding: 21px;
            border-radius: 10px;
            background-color: #444; /* Default box background */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3); /* Add shadow */
        }
        .sidebar a:hover {
            background-color: #575757; /* Lighter hover color */
        }
        .sidebar i {
            margin-right: 10px;
        }
        .content {
            margin-left: 270px;
            padding: 20px;
            flex-grow: 1;
            text-align: center;   /* Center-align text */
            font-weight: bold;    /* Make text bold */
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>LuxeDwell Admin</h2>
        <a href="/home"><i>🏠</i> Home</a>
        <a href="/Realtrondetail"><i>📊</i> Company Details</a>
        <a href="/Agentdetails"><i>👤</i> Agent Details</a>
        <a href="/propertydetails"><i>🏢</i> Property Details</a>
        <!-- Additional links can be added here -->
    </div>

    <!-- Content -->
    <div class="content">
       
        
    </div>

</body>
</html>
