<nav class="navbar navbar-expand-lg navbar-light home-top-nav">
    <div class="container22">
        <button class="navbar-toggler menu-btn no-outline" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation" id="navbarMenuButton">
            <i class="fas fa-bars"></i>
        </button>
        <a class="navbar-brand mr-md-auto" href="{{url('/')}}">
            <img class="logo d-lg-none" src="{{ url('/') }}/frontend/images/logo/logo-mobile.svg" alt="Rx MiMS Bangladesh">

            <img style="width:180px;" class="logo d-none d-lg-block" src="{{ url('/') }}/frontend/images/logo/Gv2.png" alt="Rx MiMS Bangladesh">
        </a>
        <button class="navbar-toggler menu-btn no-outline" type="button" data-toggle="collapse" data-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false" aria-label="Toggle navigation" id="navbarSearchButton">
            <i class="fas fa-search"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarMenu">
            <div class="container2222 d-flex navbar-container main-menu-top-bar">
                <ul class="navbar-nav mt-2 mt-lg-0 main-menu mr-auto ml-auto">
                    <li id="mainMenuHome" class="nav-item">
                        <a class="nav-link mims-nav-link home-link mims-main-menu" href="{{url('/')}}">Home</a>
                    </li>
                    <li id="mainMenuDoctor" class="nav-item">
                        <a class="nav-link mims-nav-link doctor-link mims-main-menu" href="{{ route('web_page_doctor') }}">Doctor</a>
                    </li>
                    <li id="mainMenuHerbal" class="nav-item">
                        <a class="nav-link mims-nav-link herbal-link mims-main-menu" href="{{ route('web_get_herbal_list') }}">Herbal</a>
                    </li>
                    <li class="nav-item umesh" id="mainMenuResource">
                        <a class="nav-link mims-nav-link resource-link mims-main-menu" href="#" id="navbarDropdownResource" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Journal
                            <i class="icon-dropdown"></i>
                        </a>
                        <div class="dropdown-menu mims-dropdown-menu" aria-labelledby="navbarDropdownResource" style="min-width: 15rem">
                            <a class="dropdown-item nav-link mims-nav-link" href="{{ route('web_get_journal', ['category'=> 'Cardiovascular']) }}">Cardiovascular</a>
                            <a class="dropdown-item nav-link mims-nav-link" href="{{ route('web_get_journal', ['category'=> 'Dental']) }}">Dental</a>
                            <a class="dropdown-item nav-link mims-nav-link" href="{{ route('web_get_journal', ['category'=> 'Library']) }}">Library</a>
                            <a class="dropdown-item nav-link mims-nav-link" href="{{ route('web_get_journal', ['category'=> 'Research Method']) }}">Research Method</a>
                            <a class="dropdown-item nav-link mims-nav-link" href="{{ route('web_get_journal', ['category'=> 'Resource']) }}">Resource</a>
                            <div class="dropdown-divider"></div>



                            <div class="rgmk">


                    <li class="nav-item umesh" id="mainMenuAbout">
                        <a class="nav-link mims-nav-link about-link mims-main-menu" href="#" id="navbarDropdownAbout" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            About Us
                            <i class="icon-dropdown"></i>
                        </a>
                        <div class="dropdown-menu mims-dropdown-menu" aria-labelledby="navbarDropdownAbout">
                            <a class="dropdown-item nav-link mims-nav-link about-link" href="{{ route('web_page_about') }}">About Us</a>
                            <a class="dropdown-item nav-link mims-nav-link about-link" href="{{ route('web_page_disclaimer') }}">Disclaimer</a>
                            

                            <a class="dropdown-item nav-link mims-nav-link about-link" href="{{ route('web_page_privacy_policy') }}">Privacy Policy</a>

                        </div>
                    </li>


                </ul>
                <!-- <div class="left-links">
            <a href="https://www.facebook.com/rxmimsbd" class="side-link" target="_blank"><i class="fab fa-facebook-square"></i></a>
            <a href="https://twitter.com/rxmims" class="side-link" target="_blank"><i class="fab fa-twitter-square"></i></a>
        </div> -->

                <div class="form-inline my-2 my-lg-0 d-flex flex-row-reverse flex-lg-row justify-content-end" id="user-login-status">

                    @if(auth()->check())
                    <a class="btn btn-success my-2 my-sm-0 mims-nav-link-cta-primary" href="{{ route('profile') }}">Info</a>



                    <a class="btn btn-success my-2 my-sm-0 mims-nav-link-cta-primary" href="{{ route('logout') }}">Logout</a>';
                    @else
                    <a href="{{ route('login_page') }}" class="btn btn-success my-2 my-sm-0 mims-nav-link-cta-primary" style="
                        margin: 0px 10px !important;
                    ">Login</a>



                    {{-- <a href="#" class="btn btn-success my-2 my-sm-0 mims-nav-link-cta-primary">Register</a>'; --}}
                    @endif
                    
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSearch">
            <div class="navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" id="searchOptionInMobile">
                    <div class="input-group-append">
                        <button class="btn theme-btn" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
                <div class="search-category-radio">
                    <div class="custom-control custom-radio">
                        <input type="radio" id="brand" name="search-category" value="brand" class="custom-control-input" checked="checked" onclick="drugObject.changeSearchOption('brand')">
                        <label class="custom-control-label" for="brand">Brand</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="generic" name="search-category" value="generic" class="custom-control-input" onclick="drugObject.changeSearchOption('generic')">
                        <label class="custom-control-label" for="generic">Generic</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="indication" name="search-category" value="indication" class="custom-control-input" onclick="drugObject.changeSearchOption('indication')">
                        <label class="custom-control-label" for="indication">Indication</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="manufacture" name="search-category" value="manufacture" class="custom-control-input" onclick="drugObject.changeSearchOption('manufacturer')">
                        <label class="custom-control-label" for="manufacture">Manufacturer</label>
                    </div>
                    <p class="alphabets nav-aldphabets">
                        <a onclick="drugObject.searchAlphabetically('a')" class="alphabet-link">A</a>
                        <a onclick="drugObject.searchAlphabetically('b')" class="alphabet-link">B</a>
                        <a onclick="drugObject.searchAlphabetically('c')" class="alphabet-link">C</a>
                        <a onclick="drugObject.searchAlphabetically('d')" class="alphabet-link">D</a>
                        <a onclick="drugObject.searchAlphabetically('e')" class="alphabet-link">E</a>
                        <a onclick="drugObject.searchAlphabetically('f')" class="alphabet-link">F</a>
                        <a onclick="drugObject.searchAlphabetically('g')" class="alphabet-link">G</a>
                        <a onclick="drugObject.searchAlphabetically('h')" class="alphabet-link">H</a>
                        <a onclick="drugObject.searchAlphabetically('i')" class="alphabet-link">I</a>
                        <a onclick="drugObject.searchAlphabetically('j')" class="alphabet-link">J</a>
                        <a onclick="drugObject.searchAlphabetically('k')" class="alphabet-link">K</a>
                        <a onclick="drugObject.searchAlphabetically('l')" class="alphabet-link">L</a>
                        <a onclick="drugObject.searchAlphabetically('m')" class="alphabet-link">M</a>
                        <a onclick="drugObject.searchAlphabetically('n')" class="alphabet-link">N</a>
                        <a onclick="drugObject.searchAlphabetically('o')" class="alphabet-link">O</a>
                        <a onclick="drugObject.searchAlphabetically('p')" class="alphabet-link">P</a>
                        <a onclick="drugObject.searchAlphabetically('q')" class="alphabet-link">Q</a>
                        <a onclick="drugObject.searchAlphabetically('r')" class="alphabet-link">R</a>
                        <a onclick="drugObject.searchAlphabetically('s')" class="alphabet-link">S</a>
                        <a onclick="drugObject.searchAlphabetically('t')" class="alphabet-link">T</a>
                        <a onclick="drugObject.searchAlphabetically('u')" class="alphabet-link">U</a>
                        <a onclick="drugObject.searchAlphabetically('v')" class="alphabet-link">V</a>
                        <a onclick="drugObject.searchAlphabetically('w')" class="alphabet-link">W</a>
                        <a onclick="drugObject.searchAlphabetically('x')" class="alphabet-link">X</a>
                        <a onclick="drugObject.searchAlphabetically('y')" class="alphabet-link">Y</a>
                        <a onclick="drugObject.searchAlphabetically('z')" class="alphabet-link">Z</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</nav>