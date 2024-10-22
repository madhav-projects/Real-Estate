<header class="header_section">
                <nav class="navbar navbar-expand-lg custom_nav-container w-100">
                    <img width="120" src="images/logo md.png" alt="#" />
                        <div class="luxe-text">LuxeDwell</div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""></span>
                    </button>
                    <div class="collapse navbar-collapse justify-end" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="">Home</a>
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
                                <a class="nav-link" href="#">Propertie Details</a>
                            </li>
                            <x-app-layout></x-app-layout>
                        </ul>
                    </div>
                </nav>
        </header>