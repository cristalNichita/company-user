<header>
    <!-- Navbar start -->
    <div class="px-0 navbar-position sticky-top">
        <div class="container bg-flashx ">
            <div class="container px-0">
                <nav class="navbar navbar-light navbar-expand-xl p-0">
                    <a href="{{route('home')}}" class="navbar-brand" aria-label="Logo">
                        <img src="{{env('WEB_BASE_URL').('front-new/images/logo.webp')}}" width="197" height="46"
                            alt="">
                    </a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse" aria-label="Toggler">
                        <span class="fa fa-bars"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav mx-auto border-top ">
                            <div class="position-relative">
                                <a href="{{route('home')}}"
                                    class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                            </div>
                        </div>
                        <div class="dropdown language-dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false" aria-label="Language Dropdown">
                                <img src="{{env('WEB_BASE_URL').('front-new/images/lang-eng.png')}}" alt=""></a>
                            </button>
                            <ul class="dropdown-menu" style="">
                                <li><a class="dropdown-item" href="#"><img
                                            src="{{env('WEB_BASE_URL').('front-new/images/lang-eng.png')}}"
                                            alt="">English</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
