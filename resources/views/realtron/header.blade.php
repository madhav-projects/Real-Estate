<header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container w-100">
        <img width="120" src="images/logo md.png" alt="#" />
        <div class="luxe-text">LuxeDwell</div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""></span>
        </button>
        <div class="collapse navbar-collapse justify-end" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Properties</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/showagentregister')}}">Agents</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/viewuser_request')}}">User Request</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <x-app-layout></x-app-layout>
            </ul>
        </div>
    </nav>
</header>

<style>
    .luxe-text {
        position: absolute;
        top: 23px;
        left: 122px;
        z-index: 1000;
        font-weight: bold;
        font-size: 30px;
        color: black;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .hero_area {
        width: 100%;
    }

    .header_section {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 10;
        background-color: white;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* Styling for navbar items */
    .navbar-nav {
        display: flex;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .navbar-nav .nav-item {
        margin-left: 15px;
        transition: transform 0.3s, background-color 0.3s, color 0.3s; /* Smooth transitions */
    }

    .nav-link {
        text-decoration: none;
        color: #333;
        font-size: 16px;
        padding: 10px 20px; /* Increase padding for better click area */
        border-radius: 5px;
        transition: all 0.3s ease; /* Smooth hover effect */
    }

    /* Hover effect for navbar items */
    .nav-link:hover {
        background-color: #d4a253; /* Change background color on hover */
        color: white; /* Change text color on hover */
        transform: translateY(-5px); /* Animate upward movement */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); /* Add shadow effect */
    }

    /* Active navbar item */
    .nav-item.active .nav-link {
        background-color: #b3933a; /* Highlight active menu */
        color: white; /* Change text color for active item */
        transform: scale(1.05); /* Slightly enlarge active item */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15); /* Shadow effect on active */
    }

    /* Responsive navbar toggler (for mobile) */
    .navbar-toggler {
        display: none; /* You can add responsiveness for small screens */
    }

    /* Add animation for smoother dropdown interactions */
    .dropdown-menu {
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.4s ease, visibility 0.4s ease;
    }

    .nav-item.dropdown:hover .dropdown-menu {
        opacity: 1;
        visibility: visible;
    }
</style>
