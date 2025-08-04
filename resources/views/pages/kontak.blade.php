@extends('layouts.landing_page_layout')

@section('main-content')
    <!-- Contact Section -->
    <section id="contact" class="contact section my-5" style="padding-top: 5rem;">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Kontak</h2>
            <p>Khusnul Khatimah</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">
                <div class="col-lg-6 ">
                    <div class="row gy-4">

                        <div class="col-lg-12">
                            <div class="info-item d-flex flex-column justify-content-center align-items-center"
                                data-aos="fade-up" data-aos-delay="200">
                                <i class="bi bi-geo-alt"></i>
                                <h3>Alamat</h3>
                                <p>P95V+9F8, Manjalling, Kec. Bajeng Bar., Kabupaten Gowa, Sulawesi Selatan 92152</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="col-md-6">
                            <div class="info-item d-flex flex-column justify-content-center align-items-center"
                                data-aos="fade-up" data-aos-delay="300">
                                <i class="bi bi-telephone"></i>
                                <h3>Nomor yang Bisa Dihubungi</h3>
                                <p>085256656029</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="col-md-6">
                            <div class="info-item d-flex flex-column justify-content-center align-items-center"
                                data-aos="fade-up" data-aos-delay="400">
                                <i class="bi bi-envelope"></i>
                                <h3>Email</h3>
                                <p>husnulkhatimah333999@gmail.com</p>
                            </div>
                        </div><!-- End Info Item -->

                    </div>
                </div>

                <div class="col-lg-6">
                    <form action="{{ route('post.kontak') }}" method="POST" data-aos="fade-up" data-aos-delay="500">
                        @csrf
                        @method('POST')
                        <div class="row gy-4">

                            <div class="col-md-12">
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama"
                                    required>
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="pesan" rows="7" placeholder="Masukkan Pesan" required></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn text-white rounded-pill px-4"
                                    style="background-color: var(--accent-color);">
                                    Kirim Pesan
                                </button>
                            </div>

                        </div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>

    </section><!-- /Contact Section -->

    @if (session('msg_success'))
        <script>
            alert("{{ session('msg_success') }}")
        </script>
    @endif
@endsection
