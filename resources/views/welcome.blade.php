<!DOCTYPE html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Flat - Bootstrap 5 Template</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Place favicon.ico in the root directory -->

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{ asset('flat/assets/css/bootstrap-5.0.0-alpha-2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('flat/assets/css/LineIcons.2.0.css') }}" />
    <link rel="stylesheet" href="{{ asset('flat/assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('flat/assets/css/lindy-uikit.css') }}" />
    <style>
        body {
            background:
                repeating-linear-gradient(-45deg,
                    rgba(255, 255, 255, 0.2) 0px,
                    rgba(255, 255, 255, 0.2) 2px,
                    transparent 2px,
                    transparent 10px),
                radial-gradient(circle at 12% 100%, rgba(255, 226, 176, 0.96) 1%, rgba(255, 226, 176, 0.96) 5px, rgba(0, 0, 0, 0) 15%),
                radial-gradient(circle at 95% -15%, rgba(218, 77, 241, 0.4) 5%, rgba(0, 0, 0, 0) 30%),
                radial-gradient(circle at 100% center, rgba(196, 245, 233, 0.698) 2%, rgba(0, 0, 0, 0) 35%) !important;
        }
    </style>
</head>

<body>
    

    <section id="home" class="hero-section-wrapper-2" style="background: transparent;">

        <!-- ========================= header-2 start ========================= -->
        <header class="header header-2">
            <div class="navbar-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <nav class="navbar navbar-expand-lg">
                                <a class="navbar-brand" href="index.html">
                                    <i>
                                        <h4>SIKEKER</h4>
                                    </i>
                                </a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                </button>

                                <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent2">
                                    <ul id="nav2" class="navbar-nav ml-auto">
                                        <li class="nav-item">
                                            <a class="page-scroll active" href="#home">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="page-scroll" href="#services">Program Kerja</a>
                                        </li>
                                    </ul>
                                    <a href="{{ url('admin/dashboard') }}" class="button button-sm radius-10 d-none d-lg-flex">Login</a>
                                </div>
                                <!-- navbar collapse -->
                            </nav>
                            <!-- navbar -->
                        </div>
                    </div>
                    <!-- row -->
                </div>
                <!-- container -->
            </div>
            <!-- navbar area -->
        </header>
        <!-- ========================= header-2 end ========================= -->

        <!-- ========================= hero-2 start ========================= -->
        <div class="hero-section hero-style-2">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-lg-6">
                        <div class="hero-content-wrapper">
                            <h4 class="wow fadeInUp" data-wow-delay=".2s">
                                <i>SIKEKER</i>
                            </h4>
                            <h2 class="mb-30 wow fadeInUp" data-wow-delay=".4s">
                                Sistem Informasi <br> Kerja dan Kinerja
                            </h2>
                            <p class="mb-50 wow fadeInUp" data-wow-delay=".6s">
                                Sistem Pelaporan dan Pemantauan Program Kerja Tahunan di Unit Kerja
                                Politeknik Penerbangan Palembang
                            </p>
                            <div class="buttons">
                                <a href="https://rebrand.ly/flat-ud/" rel="nofollow" target="blank"
                                    class="button button-lg radius-10 wow fadeInUp" data-wow-delay=".7s">
                                    Lihat Program
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="hero-image">
                            <img src="{{ asset('flat/assets/img/hero/hero-2/hero-img.svg') }}" alt=""
                                class="wow fadeInRight" data-wow-delay=".2s">
                            <img src="{{ asset('flat/assets/img/hero/hero-2/paattern.svg') }}" alt=""
                                class="shape shape-1">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ========================= hero-2 end ========================= -->

    </section>

    <section id="services" class="feature-section feature-style-2" style="background: transparent;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-xl-7 col-lg-10 col-md-9">
                            <div class="section-title mb-60">
                                <h3 class="mb-15 wow fadeInUp" data-wow-delay=".2s">
                                    <i>PROGRAM KERJA AKTIF TAHUN</i> {{ date('Y') }}
                                </h3>
                                <p class="wow fadeInUp" data-wow-delay=".4s">
                                    Daftar proker dan unit kerja di Politeknik Penerbangan Palembang Tahun
                                    {{ date('Y') }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="single-feature wow fadeInUp" data-wow-delay=".2s">
                                <div class="icon"
                                    style="
                                    background-image: url('{{ asset('foto/ririn.jpg') }}');
                                    background-size: cover;
                                    ">

                                </div>
                                <div class="content">
                                    <h5 class="mb-25">Satuan Pemeriksa Intern</h5>
                                    <ul>
                                        <li class="mb-2"><a href="">🚀 Jadwal Kegiatan</a></li>
                                        <li class="mb-2"><a href="">🎯 Laporan Kegiatan</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-feature wow fadeInUp" data-wow-delay=".4s">
                                <div class="icon"
                                    style="
                                    background-image: url('{{ asset('foto/anton.jpg') }}');
                                    background-size: cover;
                                    ">

                                </div>
                                <div class="content">
                                    <h5 class="mb-25">Satuan Penjamin Mutu</h5>
                                    <ul>
                                        <li class="mb-2"><a href="">🚀 Jadwal Kegiatan</a></li>
                                        <li class="mb-2"><a href="">🎯 Laporan Kegiatan</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-feature wow fadeInUp" data-wow-delay=".6s">
                                <div class="icon"
                                    style="
                                    background-image: url('{{ asset('foto/CANDRA.jpg') }}');
                                    background-size: cover;
                                    ">

                                </div>
                                <div class="content">
                                    <h5 class="mb-25">Manajemen Bandar Udara</h5>
                                    <ul>
                                        <li class="mb-2"><a href="">🚀 Jadwal Kegiatan</a></li>
                                        <li class="mb-2"><a href="">🎯 Laporan Kegiatan</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-feature wow fadeInUp" data-wow-delay=".8s">
                                <div class="icon"
                                    style="
                                    background-image: url('{{ asset('foto/WILDAN.jpg') }}');
                                    background-size: cover;
                                    ">

                                </div>
                                <div class="content">
                                    <h5 class="mb-25">Penyelamatan dan Pemadam Kebakaran Penerbangan</h5>
                                    <ul>
                                        <li class="mb-2"><a href="">🚀 Jadwal Kegiatan</a></li>
                                        <li class="mb-2"><a href="">🎯 Laporan Kegiatan</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-feature wow fadeInUp" data-wow-delay=".6s">
                                <div class="icon"
                                    style="
                                    background-image: url('{{ asset('foto/INDRA.jpg') }}');
                                    background-size: cover;
                                    ">

                                </div>
                                <div class="content">
                                    <h5 class="mb-25">Prodi Teknologi Rekayasa Bandar Udara</h5>
                                    <ul>
                                        <li class="mb-2"><a href="">🚀 Jadwal Kegiatan</a></li>
                                        <li class="mb-2"><a href="">🎯 Laporan Kegiatan</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-feature wow fadeInUp" data-wow-delay=".8s">
                                <div class="icon"
                                    style="
                                    background-image: url('{{ asset('foto/YETI.jpg') }}');
                                    background-size: cover;
                                    ">

                                </div>
                                <div class="content">
                                    <h5 class="mb-25">Penelitian dan Pengabdian Kepada Masyarakat</h5>
                                    <ul>
                                        <li class="mb-2"><a href="">🚀 Jadwal Kegiatan</a></li>
                                        <li class="mb-2"><a href="">🎯 Laporan Kegiatan</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-feature wow fadeInUp" data-wow-delay=".2s">
                                <div class="icon"
                                    style="
                                    background-image: url('{{ asset('foto/erawan.jpg') }}');
                                    background-size: cover;
                                    ">

                                </div>
                                <div class="content">
                                    <h5 class="mb-25">Pusat Pengembangan Karakter</h5>
                                    <ul>
                                        <li class="mb-2"><a href="">🚀 Jadwal Kegiatan</a></li>
                                        <li class="mb-2"><a href="">🎯 Laporan Kegiatan</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-feature wow fadeInUp" data-wow-delay=".4s">
                                <div class="icon"
                                    style="
                                    background-image: url('{{ asset('foto/FITRI.jpg') }}');
                                    background-size: cover;
                                    ">

                                </div>
                                <div class="content">
                                    <h5 class="mb-25">Kelompok Jabatan Fungsional</h5>
                                    <ul>
                                        <li class="mb-2"><a href="">🚀 Jadwal Kegiatan</a></li>
                                        <li class="mb-2"><a href="">🎯 Laporan Kegiatan</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-feature wow fadeInUp" data-wow-delay=".6s">
                                <div class="icon"
                                    style="
                                    background-image: url('{{ asset('foto/munir.jpg') }}');
                                    background-size: cover;
                                    ">

                                </div>
                                <div class="content">
                                    <h5 class="mb-25">Unit Perpustakaan</h5>
                                    <ul>
                                        <li class="mb-2"><a href="">🚀 Jadwal Kegiatan</a></li>
                                        <li class="mb-2"><a href="">🎯 Laporan Kegiatan</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-feature wow fadeInUp" data-wow-delay=".8s">
                                <div class="icon"
                                    style="
                                    background-image: url('{{ asset('foto/BHANU.jpg') }}');
                                    background-size: cover;
                                    ">

                                </div>
                                <div class="content">
                                    <h5 class="mb-25">Unit Bahasa</h5>
                                    <ul>
                                        <li class="mb-2"><a href="">🚀 Jadwal Kegiatan</a></li>
                                        <li class="mb-2"><a href="">🎯 Laporan Kegiatan</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-feature wow fadeInUp" data-wow-delay=".6s">
                                <div class="icon"
                                    style="
                                    background-image: url('{{ asset('foto/fetra.jpeg') }}');
                                    background-size: cover;
                                    background-position: center;
                                    ">

                                </div>
                                <div class="content">
                                    <h5 class="mb-25">Unit Teknik Informatika</h5>
                                    <ul>
                                        <li class="mb-2"><a href="">🚀 Jadwal Kegiatan</a></li>
                                        <li class="mb-2"><a href="">🎯 Laporan Kegiatan</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-feature wow fadeInUp" data-wow-delay=".8s">
                                <div class="icon"
                                    style="
                                    background-image: url('{{ asset('foto/yessi.jpg') }}');
                                    background-size: cover;
                                    ">

                                </div>
                                <div class="content">
                                    <h5 class="mb-25">Unit Kesehatan</h5>
                                    <ul>
                                        <li class="mb-2"><a href="">🚀 Jadwal Kegiatan</a></li>
                                        <li class="mb-2"><a href="">🎯 Laporan Kegiatan</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="single-feature wow fadeInUp" data-wow-delay=".8s">
                                <div class="icon"
                                    style="
                                    background-image: url('{{ asset('foto/FEBBY.jpg') }}');
                                    background-size: cover;
                                    ">

                                </div>
                                <div class="content">
                                    <h5 class="mb-25">Unit Pengembangan Usaha</h5>
                                    <ul>
                                        <li class="mb-2"><a href="">🚀 Jadwal Kegiatan</a></li>
                                        <li class="mb-2"><a href="">🎯 Laporan Kegiatan</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-feature wow fadeInUp" data-wow-delay=".8s">
                                <div class="icon"
                                    style="
                                    background-image: url('{{ asset('foto/ahmad.jpg') }}');
                                    background-size: cover;
                                    ">

                                </div>
                                <div class="content">
                                    <h5 class="mb-25">Unit Asrama</h5>
                                    <ul>
                                        <li class="mb-2"><a href="">🚀 Jadwal Kegiatan</a></li>
                                        <li class="mb-2"><a href="">🎯 Laporan Kegiatan</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-feature wow fadeInUp" data-wow-delay=".8s">
                                <div class="icon"
                                    style="
                                    background-image: url('{{ asset('foto/fandy.jpeg') }}');
                                    background-size: cover;
                                    ">

                                </div>
                                <div class="content">
                                    <h5 class="mb-25">Unit Laboratorium</h5>
                                    <ul>
                                        <li class="mb-2"><a href="">🚀 Jadwal Kegiatan</a></li>
                                        <li class="mb-2"><a href="">🎯 Laporan Kegiatan</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-feature wow fadeInUp" data-wow-delay=".8s">
                                <div class="icon"
                                    style="
                                    background-image: url('{{ asset('foto/johny.jpg') }}');
                                    background-size: cover;
                                    ">

                                </div>
                                <div class="content">
                                    <h5 class="mb-25">Unit Pelatihan</h5>
                                    <ul>
                                        <li class="mb-2"><a href="">🚀 Jadwal Kegiatan</a></li>
                                        <li class="mb-2"><a href="">🎯 Laporan Kegiatan</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="feature-img wow" style="margin-top: -40px !important;" data-wow-delay=".2s">
            <img src="{{ asset('flat/assets/img/feature/feature-2-1.svg') }}" alt="">
        </div>
    </section>

    <footer class="footer footer-style-1">
        <div class="container">
            <div class="widget-wrapper">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="footer-widget wow fadeInUp" data-wow-delay=".2s">
                            <div class="logo">
                                <a href="#0">
                                    <i>
                                        <h4>SIKEKER</h4>
                                    </i>
                                </a>
                            </div>
                            <p class="desc">
                                Jl. Adi Sucipto No.3012, Sukodadi Kec. Sukarami, Palembang, Sumatera selatan 30961
                                Email: info@poltekbangplg.ac.id telpon: 0711-410930 fax: 0711-420385
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-2 offset-xl-1 col-lg-2 col-md-6 col-sm-6">
                        <div class="footer-widget wow fadeInUp" data-wow-delay=".3s">
                            <h6>Quick Link</h6>
                            <ul class="links">
                                <li> <a href="#0">Home</a> </li>
                                <li> <a href="#0">About</a> </li>
                                <li> <a href="#0">Service</a> </li>
                                <li> <a href="#0">Contact</a> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-widget wow fadeInUp" data-wow-delay=".4s">
                            <h6>Services</h6>
                            <ul class="links">
                                <li> <a href="#0">Web Design</a> </li>
                                <li> <a href="#0">Web Development</a> </li>
                                <li> <a href="#0">Seo Optimization</a> </li>
                                <li> <a href="#0">Blog Writing</a> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="footer-widget wow fadeInUp" data-wow-delay=".5s">
                            <h6>Help & Support</h6>
                            <ul class="links">
                                <li> <a href="#0">Support Center</a> </li>
                                <li> <a href="#0">Live Chat</a> </li>
                                <li> <a href="#0">FAQ</a> </li>
                                <li> <a href="#0">Terms & Conditions</a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-wrapper wow fadeInUp" data-wow-delay=".2s">
                <p>Design and Developed by Unit IT Politeknik Penerbangan Palembang</p>
            </div>
        </div>
    </footer>

    <a href="#" class="scroll-top"> <i class="lni lni-chevron-up"></i> </a>


    <!-- ========================= JS here ========================= -->
    <script src="{{ asset('flat/assets/js/bootstrap.5.0.0.alpha-2-min.js') }}"></script>
    <script src="{{ asset('flat/assets/js/count-up.min.js') }}"></script>
    <script src=""></script>
    <script src="{{ asset('flat/assets/js/main.js') }}"></script>
</body>

</html>
