@extends('layouts.landing_page_layout')

@section('main-content')
    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

        <img src="photo/photo-2.jpeg" alt="" data-aos="fade-in">

        <div class="container d-flex flex-column align-items-start">
            <h2 data-aos="fade-up" data-aos-delay="100">Aplikasi Iuran dan Tabungan Santri TKA-TPA Khsunul Khatimah Manjalling
                Kabupaten Gowa</h2>
            <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
                <a href="{{ route('login') }}" class="btn-get-started">Login</a>
            </div>
        </div>

    </section><!-- /Hero Section -->
@endsection
