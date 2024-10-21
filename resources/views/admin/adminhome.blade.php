<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RealEstate-Admin</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" href="images/logo md.png" type="">
</head>
<body>
    <div class="hero_area">
        <!-- header section starts -->
       @include('admin.header')
        <!-- header section ends -->
        <div class="container">
           @include('admin.sidebar')
           @include('admin.body')
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
<style>
 body {
    margin: 0;
    font-family: Arial, sans-serif;
    display: flex;
    flex-direction: column;
    background-color: #ffffff; /* White */
}

.dashboard header {
    background-color: white; /* Black */
    color: #ffc000;
    padding: 20px;
    text-align: center;
    border-bottom: 4px solid #b31226; /* Orange Red */
}

.dashboard header h1 {
    margin: 0;
    font-size: 2em;
}

.dashboard header p {
    margin: 5px 0 0;
    font-size: 1.2em;
}

.cards {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    padding: 20px;
}

.card {
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin: 10px;
    flex: 1 1 calc(25% - 40px);
    max-width: calc(25% - 40px);
    transition: transform 0.2s;
}

.card:hover {
    transform: scale(1.05);
}

.card-content {
    padding: 20px;
    text-align: center;
}

.card-content h2 {
    margin: 0;
    font-size: 2em;
    color: #4682b4; /* Steel Blue */
}

.card-content p {
    margin: 10px 0 0;
    font-size: 1.2em;
    color: #6a5acd; /* Slate Blue */
}

.table-section {
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin: 20px;
    padding: 20px;
}

.table-section h2 {
    margin: 0 0 20px;
    font-size: 1.8em;
    color: #4682b4; /* Steel Blue */
}

#agent-form {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 20px;
}

#agent-form input,
#agent-form button {
    padding: 10px;
    border: 2px solid #ddd;
    border-radius: 5px;
}

#agent-form input {
    flex: 1;
}

#agent-form button {
    background-color: #84210f; /* Tomato */
    color: #ffd000;
    border: none;
    cursor: pointer;
    transition: background-color 0.2s;
}

#agent-form button:hover {
    background-color: #ff4500; /* Orange Red */
}

table {
    width: 100%;
    border-collapse: collapse;
}

table th,
table td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

table th {
    background-color: #4682b4; /* Steel Blue */
    color: white;
}

table tbody tr:nth-child(even) {
    background-color: #f0f8ff; /* Alice Blue */
}

table tbody tr:hover {
    background-color: #f5f5dc; /* Beige */
}

.hero_area {
    display: flex;
    flex-direction: column;
    width: 100%;
}

body {
    background-color: #ffffff; /* White */
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
    background-color: #ffffff;
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
    background-color: #3498db; /* Dodger Blue */
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.table-section form button:hover {
    background-color: #2980b9; /* Darker Dodger Blue */
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
    background-color: #4682b4; /* Steel Blue */
    color: white;
}

.table-section tbody tr:nth-child(even) {
    background-color: #f0f8ff; /* Alice Blue */
}

.table-section tbody tr:hover {
    background-color: #f5f5dc; /* Beige */
}

.table-section button {
    padding: 5px 10px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

.table-section .accept {
    background-color: #2ecc71; /* Emerald */
    color: white;
}

.table-section .reject {
    background-color: #e74c3c; /* Cinnabar */
    color: white;
}

.table-section .delete {
    background-color: #e67e22; /* Carrot */
    color: white;
}

.table-section button:hover {
    opacity: 0.8;
}
</style>
