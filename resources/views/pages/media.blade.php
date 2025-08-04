@extends('layouts.landing_page_layout')

@section('main-content')
    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section my-5" style="padding-top:5rem !important;">

        <!-- Section Title -->
        {{-- <div class="container section-title" data-aos="fade-up">
            <h2>Portfolio</h2>
            <p>CHECK OUR PORTFOLIO</p>
        </div> --}}
        <!-- End Section Title -->

        <div class="container">

            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                {{-- <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-app">App</li>
                    <li data-filter=".filter-product">Product</li>
                    <li data-filter=".filter-branding">Branding</li>
                    <li data-filter=".filter-books">Books</li>
                </ul> --}}
                <!-- End Portfolio Filters -->

                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                        <div class="portfolio-content h-100">
                            <img src="photo/photo-1.jpeg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <a href="photo/photo-1.jpeg" data-gallery="portfolio-gallery-branding"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                        <div class="portfolio-content h-100">
                            <img src="photo/photo-2.jpeg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <a href="photo/photo-2.jpeg" data-gallery="portfolio-gallery-branding"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                        <div class="portfolio-content h-100">
                            <img src="photo/photo-3.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <a href="photo/photo-3.jpg" data-gallery="portfolio-gallery-branding"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                        <div class="portfolio-content h-100">
                            <img src="photo/photo-4.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <a href="photo/photo-4.jpg" data-gallery="portfolio-gallery-branding"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                        <div class="portfolio-content h-100">
                            <img src="photo/photo-6.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <a href="photo/photo-6.jpg" data-gallery="portfolio-gallery-branding"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                        <div class="portfolio-content h-100">
                            <img src="photo/photo-8.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <a href="photo/photo-8.jpg" data-gallery="portfolio-gallery-branding"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                        <div class="portfolio-content h-100">
                            <img src="photo/photo-10.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <a href="photo/photo-10.jpg" data-gallery="portfolio-gallery-branding"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                        <div class="portfolio-content h-100">
                            <img src="photo/photo-11.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <a href="photo/photo-11.jpg" data-gallery="portfolio-gallery-branding"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->

                </div><!-- End Portfolio Container -->

            </div>

        </div>

    </section><!-- /Portfolio Section -->
@endsection
