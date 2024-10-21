<aside class="sidebar">
    <nav>
        <ul>
            <li><a href="/home" class="active">Dashboard</a></li>
            <li><a href="{{url('/Realtrondetail')}}">Realtron Details</a></li>
            <li><a href="{{url('view_properties')}}">Agent Details</a></li>
            <li><a href="{{url('show_properties')}}">Property Details</a></li>
            <li><a href="#">Contact, Feedback</a></li>
        </ul>
    </nav>
</aside>

<style>
    /* Sidebar Styles */
    .sidebar {
        width: 250px; /* Fixed width for sidebar */
        background-color: #f8f9fa;
        padding: 20px;
        min-height: 100vh; /* Full height */
        position: fixed; /* Keep it fixed to the left */
        top: 80px; /* Space for fixed header */
        left: 0;
    }

    .sidebar nav ul {
        list-style: none;
        padding: 0;
    }

    .sidebar nav ul li {
        margin-bottom: 15px;
    }

    .sidebar nav ul li a {
        text-decoration: none;
        color: #333;
        font-size: 16px;
    }

    .sidebar nav ul li a:hover, 
    .sidebar nav ul li a.active {
        color: #d4a253; /* Hover or active link color */
        font-weight: bold;
    }
</style>
