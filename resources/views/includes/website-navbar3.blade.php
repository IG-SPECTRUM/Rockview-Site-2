
    <!-- header -->
    <header class="fixed-top header">
        <!-- top header -->
        <div class="top-header py-2 bg-white">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-4 text-center text-lg-left">

                        <a class="text-color mr-3" href="mailto:info@rockview.ac.zm"><strong>email</strong>
                            info@rockview.ac.zm</a>
                        <ul class="list-inline d-inline">
                            <li class="list-inline-item mx-0">
                                <a class="d-inline-block p-2 text-color" href="#"><i class="ti-facebook"></i></a>
                            </li>
                            <li class="list-inline-item mx-0">
                                <a class="d-inline-block p-2 text-color" href="#"><i class="ti-twitter-alt"></i></a>
                            </li>
                            <li class="list-inline-item mx-0">
                                <a class="d-inline-block p-2 text-color" href="#"><i class="ti-linkedin"></i></a>
                            </li>
                            <li class="list-inline-item mx-0">
                                <a class="d-inline-block p-2 text-color" href="#"><i class="ti-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-8 text-center text-lg-right">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block text-warning" href="#">+260 967
                                    967 961</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block text-warning"
                                    href="notice.php">My Rockview</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block text-warning"
                                    href="research.php">research</a>
                            </li>

                            <li class="list-inline-item">
                                <a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block text-warning"
                                    href="portal/admin">Staff Login</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block text-warning"
                                    href="portal/admin"> Student Portal</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- navbar -->
        <div class="navigation w-100" style="background-color:  white;">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                    <a class="navbar-brand" href="index.php"><img src="../../storage/website/images/sample_rockview.png" alt="logo"
                            width="200" /></a>
                    <button class="navbar-toggler rounded-0" type="button" data-toggle="collapse"
                        data-target="#navigation" aria-controls="navigation" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav ml-auto text-center">
                            <li class="nav-item @@about">
                                <a class="nav-link" href="{{ route('website-home-page') }}">Home</a>
                            </li>
                            <li class="nav-item @@about">
                                <a class="nav-link" href="{{ route('show-application-form') }}">Apply Now</a>
                            </li>

                            <li class="nav-item @@events">
                                <a class="nav-link" href="{{ route('view-programs') }}">Programs</a>
                            </li>
                            <li class="nav-item @@events">
                                <a class="nav-link" href="{{ route('show-application-form')}}">Applicants</a>
                            </li>

                            <li class="nav-item dropdown view">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Resources
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">



                                    <a class="dropdown-item" href="{{ route('anti-scam') }}">Anti Scam</a>

                                    <a class="dropdown-item" href="{{ route('our-bursaries')}}">Bursary</a>
                                    <a class="dropdown-item" href="{{ route('our-fees') }}">Fees</a>
                                </div>
                            </li>
                            <li class="nav-item @@contact">
                                <a class="nav-link" href="{{ route('contact-us') }}">CONTACT</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- /header -->