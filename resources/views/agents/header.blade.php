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
                    <a class="nav-link" href="{{url('/home')}}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Properties</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{url('/agenthome')}}">Task</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{url('/view_properties')}}">Add Properties</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{url('/show_properties')}}">Property Details</a>
                </li>

                <!-- Ganesh Section -->
                <li class="nav-item">
                    <x-app-layout></x-app-layout> <!-- This is where "Ganesh" will be rendered -->
                </li>
            </ul>
        </div>
    </nav>
</header>

<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    .header_section {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 10;
        background-color: white;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
    }

    .navbar-nav {
        display: flex;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .navbar-nav .nav-item {
        margin-left: 15px;
    }

    .nav-link {
        text-decoration: none;
        color: #333;
        font-size: 16px;
    }

    .nav-link:hover {
        color: #d4a253;
    }

    .navbar-toggler {
        display: none;
    }

    .luxe-text {
    position: absolute;
    top: 21px;
    left: 150px;
    z-index: 1000;
    font-weight: bold;
    font-size: 30px;
    font-size: 1.5em;
    color: black;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}

    /* Align menu items to the right */
    .navbar-collapse {
        justify-content: flex-end;
    }

    /* Adjust Ganesh's layout component */
    .navbar-nav .x-app-layout {
        margin-left: auto;
    }

    /* Add spacing between menu items */
    .nav-item {
        padding: 0 10px;
    }
</style>
