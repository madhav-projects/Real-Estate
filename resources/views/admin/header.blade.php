<header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container w-100">
        <img width="120" src="images/logo md.png" alt="#" />
        <div class="luxe-text">LuxeDwell</div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto"> <!-- Use mr-auto to push items to the left -->
                <li class="nav-item">
                    <a class="nav-link" href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Realtrondetail">Realtron Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Agentdetails">Agent Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/propertydetails">Property Details</a>
                </li>
            </ul>
            <x-app-layout></x-app-layout>
        </div>
    </nav>
</header>

<style>
   /* LuxeDwell text position */
.luxe-text {
    margin-left: 0px;
    margin-top: 0px;
    font-weight: bold;
    font-size: 30px;
    color: black;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}

/* Make header fixed at the top */
.header_section .navbar {
    display: flex;
    align-items: center;
    width: 100%;
    justify-content: space-between; /* Space between logo and nav items */
}

.header_section .navbar-nav {
    display: flex;
    align-items: center;
    margin-left: auto; /* Align items to the right */
    padding: 0;
}

/* Additional styles for nav items */
.header_section .navbar-nav .nav-item {
    margin: 0 15px;
}

.header_section .navbar-nav .nav-item a {
    color: black; /* Set link color to black */
    text-decoration: none;
    padding: 5px 8px;
    font-weight: bold;
}

.header_section .navbar-nav .nav-item .username {
    color: black; /* Set username color to black */
    font-weight: bold; /* Make username bold */
}

/* Hover and active states */
.header_section .navbar-nav .nav-item a:hover,
.header_section .navbar-nav .nav-item.active a {
    color: #c0392b; /* Color on hover or active */
}

/* Ensuring the navbar is responsive */
@media (max-width: 768px) {
    .header_section .navbar-nav {
        flex-direction: column; /* Stack items vertically on small screens */
    }
}

</style>
