<?php
// Start session if necessary
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bekam Asy Syifa</title>

    <!-- Favicon -->
    <link href="{{ asset('favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('restoran/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('restoran/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('restoran/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('restoran/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('restoran/css/style.css') }}" rel="stylesheet">

    <!-- Custom fixes -->
    <style>
        /* ensure service cards are same height */
        .service-item {
            /* increase base height so content doesn't overflow
               and allow flex grow for uniformity */
            min-height: 300px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* make the inner padding container stretch so the
           icon + text section and the paragraph share equal
           height regardless of text length */
        .service-item .p-4 {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
    </style>
</head>
</head>
<body>
    <div class="container-xxl bg-white p-0">
        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="/" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-hand-holding-medical me-3"></i>Bekam Asy Syifa</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="#home" class="nav-item nav-link active">Home</a>
                        <a href="#about" class="nav-item nav-link">About</a>
                        <a href="#service" class="nav-item nav-link">Service</a>
                        <a href="#packages" class="nav-item nav-link">Packages</a>
                        <a href="#contact" class="nav-item nav-link">Contact</a>
                    </div>
                    <a href="{{ route('login.form') }}" class="btn btn-primary py-2 px-4">Book Now</a>
                </div>
            </nav>

            <div class="container-xxl py-5 hero-header mb-5" id="home" style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset('pictures/cupping treatment.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed;">
                <div class="container my-5 py-5">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="display-3 text-white">Experience Our<br>Professional Cupping Therapy</h1>
                            <p class="text-white mb-4 pb-2">Traditional healing techniques for modern wellness. Our experienced practitioners provide personalized cupping therapy to restore balance and promote natural healing.</p>
                            <a href="{{ route('login.form') }}" class="btn btn-primary py-sm-3 px-sm-5 me-3">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Service Start -->
        <div class="container-xxl py-5" id="service">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-hand-holding-medical text-primary mb-4"></i>
                                <!-- show a small symbol above the heading instead of beside it -->
                                <h5 class="text-center">
                                    <i class="fa fa-check-circle text-primary d-block mb-2" style="font-size:1.25rem;"></i>
                                    Professional Cupping
                                </h5>
                                <p>Traditional hijama therapy performed by certified practitioners using sterile equipment and techniques.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-heartbeat text-primary mb-4"></i>
                                <h5>Health Benefits</h5>
                                <p>Improve blood circulation, reduce pain, boost immunity, and promote overall wellness naturally.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-calendar-check text-primary mb-4"></i>
                                <h5>Personalized Care</h5>
                                <p>Individual consultations and customized treatment plans tailored to your specific health needs.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-user-md text-primary mb-4"></i>
                                <h5>Personalized Care</h5>
                                <p>Individual consultations and customized treatment plans tailored to your specific health needs.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->

        <!-- About Start -->
        <div class="container-xxl py-5" id="about">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="{{ asset('pictures/cupping treatment.jpg') }}">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="{{ asset('pictures/images4.avif') }}" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="{{ asset('pictures/massages.jpg') }}" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="{{ asset('pictures/cupping2.webp') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">About Us</h5>
                        <h1 class="mb-4">Welcome to <i class="fa fa-hand-holding-medical text-primary me-2"></i>Bekam Asy Syifa</h1>
                        <p class="mb-4">Bekam Asy Syifa is dedicated to providing authentic traditional cupping therapy (hijama) services. Our experienced practitioners combine ancient healing wisdom with modern hygiene standards to deliver safe and effective treatments.</p>
                        <p class="mb-4">We believe in the power of natural healing and are committed to helping our clients achieve optimal wellness through professional cupping therapy. Every treatment is performed with care, precision, and respect for traditional practices.</p>
                        <div class="row g-4 mb-4">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">5</h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Years of</p>
                                        <h6 class="text-uppercase mb-0">Experience</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">1000</h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Happy</p>
                                        <h6 class="text-uppercase mb-0">Clients</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-primary py-3 px-5 mt-2" href="#contact">Learn More</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Therapists Start -->
        <div class="container-xxl pt-5 pb-3" id="therapists">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Our Team</h5>
                    <h1 class="mb-5">Meet Our Skilled Therapists</h1>
                </div>
                <div class="row g-4 justify-content-center">
                    <!-- male therapist -->
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <div class="rounded-circle overflow-hidden m-4" style="width:150px;height:150px;">
                                <!-- force the image itself to be circular too -->
                                <img class="img-fluid rounded-circle" src="{{ asset('pictures/man therapist.jpg') }}" alt="Male Therapist">
                            </div>
                            <h5 class="mb-0">Shafiq Bin Jamal</h5>
                            <small> Male Cupping Specialist</small>
                            <div class="d-flex justify-content-center mt-3">
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- female therapist -->
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <div class="rounded-circle overflow-hidden m-4" style="width:150px;height:150px;">
                                <img class="img-fluid rounded-circle" src="{{ asset('pictures/women theapist.jpg') }}" alt="Female Therapist">
                            </div>
                            <h5 class="mb-0">Nurul Waheeda</h5>
                            <small>Female Cupping Specialist</small>
                            <div class="d-flex justify-content-center mt-3">
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Therapists End -->

        <!-- Menu Start -->
        <div class="container-xxl py-5" id="packages">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Our Packages</h5>
                    <h1 class="mb-5">Popular Cupping Treatments</h1>
                </div>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                                <i class="fa fa-tint fa-2x text-primary"></i>
                                <div class="ps-3">
                                    <small class="text-body">Traditional</small>
                                    <h6 class="mt-n1 mb-0">Cupping Treatments</h6>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-2">
                                <i class="fa fa-spa fa-2x text-primary"></i>
                                <div class="ps-3">
                                    <small class="text-body">Therapeutic</small>
                                    <h6 class="mt-n1 mb-0">Massage Services</h6>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                @foreach($packages->where('type', 'cupping treatment') as $package)
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('pictures/package3.jpg') }}" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>{{ $package->name }}</span>
                                                <span class="text-primary">RM{{ number_format($package->price, 2) }}</span>
                                            </h5>
                                            <small class="fst-italic">{{ $package->description }}</small>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                @foreach($packages->where('type', 'messages') as $package)
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('pictures/package3.jpg') }}" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>{{ $package->name }}</span>
                                                <span class="text-primary">RM{{ number_format($package->price, 2) }}</span>
                                            </h5>
                                            <small class="fst-italic">{{ $package->description }}</small>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu End -->

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s" id="contact">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Company</h4>
                        <a class="btn btn-link" href="#about">About Us</a>
                        <a class="btn btn-link" href="#service">Our Services</a>
                        <a class="btn btn-link" href="#packages">Packages</a>
                        <a class="btn btn-link" href="#contact">Contact Us</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Contact</h4>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Kuala Lumpur, Malaysia</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+6012 345 6789</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@bekamasyifa.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Opening Hours</h4>
                        <h5 class="text-light fw-normal">Monday - Saturday</h5>
                        <p>09AM - 07PM</p>
                        <h5 class="text-light fw-normal">Sunday</h5>
                        <p>10AM - 05PM</p>
                        <h5 class="text-light fw-normal">Friday</h5>
                        <p>02PM - 07PM</p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Newsletter</h4>
                        <p>Subscribe to our newsletter for health tips and special offers.</p>
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                            <input class="form-control border-primary w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                            <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Bekam Asy Syifa</a>, All Right Reserved.
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="#home">Home</a>
                                <a href="#about">About</a>
                                <a href="#service">Service</a>
                                <a href="#contact">Contact</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('restoran/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('restoran/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('restoran/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('restoran/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('restoran/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('restoran/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('restoran/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('restoran/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('restoran/js/main.js') }}"></script>
</body>
</html>
