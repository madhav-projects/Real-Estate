<header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container w-100">
        <img width="120" src="images/logo md.png" alt="#" />
        <div class="luxe-text">LuxeDwell</div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""></span>
        </button>
        <div class="collapse navbar-collapse justify-end" id="navbarSupportedContent">
            <x-app-layout></x-app-layout>
        </div>
    </nav>
</header>

<style>
    /* LuxeDwell text position */
    .luxe-text {
    position: absolute;
    top: 17px;
    left: 124px;
    z-index: 1000;
    font-weight: bold;
    font-size: 30px;
    color: black;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}

    /* Make header fixed at the top */
    .header_section {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 80px; /* Set header height */
        background-color: #ffffff; /* Set background color */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Add shadow */
        z-index: 1000; /* Ensure it stays on top of other elements */
        border-bottom: 1px solid #ddd;
        font-family: 'Poppins', sans-serif;
    }

    /* Ensure page content doesn't hide behind the header */
    body {
        padding-top: 80px; /* Set padding equal to header height */
    }

    /* Container within the header */
    .header_section .container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* Navbar adjustments */
    .header_section .navbar {
        display: flex;
        align-items: center;
        width: 100%;
        justify-content: space-between;
    }

    .header_section .navbar-brand img {
        max-width: 100px;
        transition: transform 0.3s ease;
    }

    .header_section .navbar-nav {
        list-style: none;
        display: flex;
        align-items: center;
        margin: 0;
        padding: 0;
        flex-grow: 1;
        justify-content: center;
        flex-direction: row;
    }

    .header_section .navbar-nav .nav-item {
        margin: 0 15px;
    }

    .header_section .navbar-nav .nav-item a {
        color: black;
        text-decoration: none;
        padding: 5px 8px;
        font-weight: bold;
    }

    .header_section .navbar-nav .nav-item a:hover,
    .header_section .navbar-nav .nav-item.active a {
        color: #c0392b;
    }

    .header_section .navbar-nav .dropdown-menu {
        display: none;
        position: absolute;
        background-color: white;
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        margin-top: 10px;
        padding: 0;
        list-style: none;
    }

    .header_section .navbar-nav .dropdown-menu li {
        padding: 10px;
    }

    .header_section .navbar-nav .dropdown-menu li a {
        color: black;
        text-decoration: none;
        display: block;
    }

    .header_section .navbar-nav .dropdown:hover .dropdown-menu {
        display: block;
    }
</style>
