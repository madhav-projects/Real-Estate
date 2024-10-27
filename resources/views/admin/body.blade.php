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
            width: 250px;
            background-color: #333;
            color: #fff;
            height: 100vh;
            position: fixed;
            padding-top: 20px;
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        .sidebar a {
            padding: 15px;
            text-decoration: none;
            color: #fff;
            display: flex;
            align-items: center;
            transition: background 0.3s;
        }
        .sidebar a:hover {
            background-color: #575757;
        }
        .sidebar i {
            margin-right: 10px;
        }
        .content {
    margin-left: 250px;
    padding: 20px;
    flex-grow: 1;
    text-align: center;   /* Center-align text */
    font-weight: bold;    /* Make text bold */
}

        .home-image {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
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
    </div>

    <!-- Content Area -->
    <div class="content">
        <h1>Welcome to the LuxeDwell Admin Dashboard</h1>
       
        
        <!-- Home Page Image -->
        <img src="images\titlecard.png" alt="Home Page Image" class="home-image">
    </div>

</body>
</html>
