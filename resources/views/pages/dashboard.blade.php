@extends('welcome')
@section('main')

<style>
    body {
        background-color: #eee;
    }

    .hello {
        opacity: 1 !important;
    }

    .full {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
    }

    .full .content {
        background-color: rgba(0, 0, 0, 0.75) !important;
        height: 100%;
        width: 100%;
        display: grid;
    }

    .full .content img {
        left: 50%;
        bottom: 50%;
        transform: translate3d(0, 0, 0);
        animation: zoomin 1s ease;
        max-width: 50%;
        max-height: 50%;
        margin: auto;
    }

    .byebye {
        opacity: 0;
    }

    .byebye:hover {
        transform: scale(0.2) !important;
    }

    .gallery {
        display: grid;
        grid-column-gap: 8px;
        grid-row-gap: 8px;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        grid-auto-rows: 8px;
    }

    .gallery img {
        max-width: 100%;
        border-radius: 8px;
        box-shadow: 0 0 16px #2b5679;
        transition: all 1.5s ease;
    }

    .gallery img:hover {
        box-shadow: 0 0 32px #e1bd36;
    }

    .gallery .content {
        padding: 4px;
    }

    .gallery .gallery-item {
        transition: grid-row-start 300ms linear;
        transition: transform 300ms ease;
        transition: all 0.5s ease;
        cursor: pointer;
    }

    .gallery .gallery-item:hover {
        transform: scale(1.025);
    }

    @media (max-width: 300px) {
        .gallery {
            grid-template-columns: repeat(auto-fill, minmax(30%, 1fr));
        }
    }

    @media (max-width: 400px) {
        .gallery {
            grid-template-columns: repeat(auto-fill, minmax(50%, 1fr));
        }
    }

    @media (max-width: 400px) {
        .gallery img {
            max-width: 98%;
            border-radius: 8px;
            box-shadow: 0 0 16px #2b5679;
            transition: all 1.5s ease;
            margin-left: 4px;
        }
    }

    @-moz-keyframes zoomin {
        0% {
            max-width: 50%;
            transform: rotate(-30deg);
            filter: blur(4px);
        }

        30% {
            filter: blur(4px);
            transform: rotate(-80deg);
        }

        70% {
            max-width: 50%;
            transform: rotate(45deg);
        }

        100% {
            max-width: 100%;
            transform: rotate(0deg);
        }
    }

    @-webkit-keyframes zoomin {
        0% {
            max-width: 50%;
            transform: rotate(-30deg);
            filter: blur(4px);
        }

        30% {
            filter: blur(4px);
            transform: rotate(-80deg);
        }

        70% {
            max-width: 50%;
            transform: rotate(45deg);
        }

        100% {
            max-width: 100%;
            transform: rotate(0deg);
        }
    }

    @-o-keyframes zoomin {
        0% {
            max-width: 50%;
            transform: rotate(-30deg);
            filter: blur(4px);
        }

        30% {
            filter: blur(4px);
            transform: rotate(-80deg);
        }

        70% {
            max-width: 50%;
            transform: rotate(45deg);
        }

        100% {
            max-width: 100%;
            transform: rotate(0deg);
        }
    }

    @keyframes zoomin {
        0% {
            max-width: 30%;
            transform: rotate(-30deg);
            filter: blur(4px);
        }

        30% {
            filter: blur(4px);
            transform: rotate(-80deg);
        }

        70% {
            max-width: 50%;
            transform: rotate(45deg);
        }

        100% {
            max-width: 50%;
            transform: rotate(0deg);
        }
    }

    .slick-slide {
        margin: 0px 20px;
    }

    .slick-slide img {
        width: 100%;
    }

    .slick-slider {
        position: relative;
        display: block;
        box-sizing: border-box;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -webkit-touch-callout: none;
        -khtml-user-select: none;
        -ms-touch-action: pan-y;
        touch-action: pan-y;
        -webkit-tap-highlight-color: transparent;
    }

    .slick-list {
        position: relative;
        display: block;
        overflow: hidden;
        margin: 0;
        padding: 0;
    }

    .slick-list:focus {
        outline: none;
    }

    .slick-list.dragging {
        cursor: pointer;
        cursor: hand;
    }

    .slick-slider .slick-track,
    .slick-slider .slick-list {
        -webkit-transform: translate3d(0, 0, 0);
        -moz-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
        -o-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
    }

    .slick-track {
        position: relative;
        top: 0;
        left: 0;
        display: block;
    }

    .slick-track:before,
    .slick-track:after {
        display: table;
        content: '';
    }

    .slick-track:after {
        clear: both;
    }

    .slick-loading .slick-track {
        visibility: hidden;
    }

    .slick-slide {
        display: none;
        float: left;
        height: 100%;
        min-height: 1px;
    }

    [dir='rtl'] .slick-slide {
        float: right;
    }

    .slick-slide img {
        display: block;
    }

    .slick-slide.slick-loading img {
        display: none;
    }

    .slick-slide.dragging img {
        pointer-events: none;
    }

    .slick-initialized .slick-slide {
        display: block;
    }

    .slick-loading .slick-slide {
        visibility: hidden;
    }

    .slick-vertical .slick-slide {
        display: block;
        height: auto;
        border: 1px solid transparent;
    }

    .slick-arrow.slick-hidden {
        display: none;
    }
</style>

<!-- ***** Welcome Area Start ***** -->
<div class="welcome-area" id="welcome">

    <!-- ***** Header Text Start ***** -->
    <div class="header-text">
        <div class="container">
            <div class="row">
                <div class="offset-xl-3 col-xl-6 offset-lg-2 col-lg-8 col-md-12 col-sm-12 w-100">
                    <h1><strong style="font-size: 55px;">Pamuji Luhur Utama</strong></h1>
                    <p>Melayani pelanggan dan jamaah secara aman dan profesional</p>
                    <a href="#features" class="main-button-slider">Lebih Dalam</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Header Text End ***** -->
</div>
<!-- ***** Welcome Area End ***** -->

<!-- ***** Features Small Start ***** -->
<section class="section home-feature">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <!-- ***** Features Small Item Start ***** -->
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                        <div class="features-small-item">
                            <div class="icon">
                                <i><img src="assets/images/hajj.png" alt="" style="margin-top: 19px;"></i>
                            </div>
                            <h5 class="features-title">Haji</h5>
                            <p>Melayani Perjalanan Haji <br> (Reguler dan Plus) <br> </p>
                        </div>
                    </div>
                    <!-- ***** Features Small Item End ***** -->

                    <!-- ***** Features Small Item Start ***** -->
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.4s">
                        <div class="features-small-item">
                            <div class="icon">
                                <i><img src="assets/images/kaaba2.png" alt="" style="margin-top: 19px;"></i>
                            </div>
                            <h5 class="features-title">Umrah</h5>
                            <p>Melayani Perjalanan Umrah <br> (Reguler dan Plus) <br></p>
                        </div>
                    </div>
                    <!-- ***** Features Small Item End ***** -->

                    <!-- ***** Features Small Item Start ***** -->
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.6s">
                        <div class="features-small-item">
                            <div class="icon">
                                <i><img src="assets/images/travel.png" alt="" style="margin-top: 19px;"></i>
                            </div>
                            <h5 class="features-title">Ticket dan Visa</h5>
                            <p>Melayani pemesanan tiket pesawat Domestik dan Internasional serta Visa Umrah dan Haji</p>
                        </div>
                    </div>
                    <!-- ***** Features Small Item End ***** -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Features Small End ***** -->

<!-- ***** Features Big Item Start ***** -->
<section class="section padding-top-70 padding-bottom-0" id="features">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-12 col-sm-12 align-self-center" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                <img src="assets/images/logopaluma.png" class="rounded img-fluid d-block mx-auto" style="margin-top: -80px;" alt="App">
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-6 col-md-12 col-sm-12 align-self-center mobile-top-fix">
                <div class="center-heading">
                    <h2 class="section-title">Tentang <strong style="color: #e1bd36;">Paluma Travel</strong></h2>

                </div>
                <div class="center-text">
                    <p>PALUMA Travel didirikan di Jakarta pada Tahun 1997 berdasarkan AktA Notaris Mintarsih Natamihardja, SH, dengan nama PT. PANGUJI LUHUR UTAMA. Dengan semangat melayani, PALUMA Travel fokus pada kualitas Ibadah dan Pelayanan sebagai “ Sahabat Syari’ah Terbaik “ Kaum Muslimin baik dalam Ibadah maupun Muamalah.
                        <br><br> PALUMA Travel merupan perusahaan swasta nasional yang bergerak di bidang Tour dan Travel, meliputi program Umrah Reguler, Umrah Plus, Haji Khusus, Haji Furoda, Visa Umrah, Reservasi Hotel, Tour Domestik dan Internasional, Tiket Domestik dan Internasional serta Pengurusan Dokumen Perjalanan. <br><br>
                        <!-- Sebagai komitmen legalitas perusahaan dalam melayani pelanggan dan jamaah secara aman dan profesional, saat ini PALUMA Travel telah mengantongi izin resmi dari Pemerintah melalui Kementerian Pariwisata, izin Umrah dan Haji Khusus dari Kementerian Agama. Selain itu perusahaan juga tergabung dalam komunitas organisasi Internasional yaitu IATA, organisasi travel nasional yaitu ASITA dan komunitas penyelenggara Umrah dan Haji Khusus yaitu KESTHURI. -->
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Features Big Item End ***** -->
<hr style="width:70%">
<!-- ***** Features Big Item Start ***** -->
<section class="section padding-bottom-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 align-self-center mobile-bottom-fix">
                <div class="center-heading">
                    <h2 class="section-title"><strong style="color: #2b5679;">Visi &</strong><strong style="color: #e1bd36;"> Misi</strong></h2>
                </div>
                <div class="center-text align-items-center">
                    <p style="background-color: #2b5679; color:#fff; border-radius:10px">Menjadi perusahaan penyelenggara umrah yang amanah serta menyelenggarakan umrah sesuai Sunnah Rasulullah SAW</p>
                    <p style="background-color: #e1bd36; color:#fff; border-radius:10px">Memberikan layanan serta solusi tour dan travel terbaik <br> bagi client kami</p>
                    <p style="background-color: #e1bd36; color:#fff; border-radius:10px">Menjadi partner terbaik dalam mendampingi perjalanan <br> para client kami</p>
                    <p style="background-color: #e1bd36; color:#fff; border-radius:10px">Mengembangkan sumber daya manusia yang profesional, jujur, amanah yang berkelanjutan</p>
                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-5 col-md-12 col-sm-12 align-self-center mobile-bottom-fix-big" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                <img src="assets/images/target.png" class="rounded img-fluid d-block mx-auto" alt="App">
            </div>
        </div>
    </div>
</section>
<!-- ***** Features Big Item End ***** -->

<!-- ***** Home Parallax Start ***** -->
<section class="mini" id="work-process">
    <div class="mini-content">
        <div class="container">
            <div class="row">
                <div class="offset-lg-3 col-lg-6">
                    <div class="info">
                        <h1>Value</h1>
                        <p>Beberapa nilai yang kami aplikasikan dalam menjalankan usaha ini.</p>
                    </div>
                </div>
            </div>

            <!-- ***** Mini Box Start ***** -->
            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                    <a href="#" class="mini-box">
                        <i><img src="assets/images/icon/3.png" alt=""></i>
                        <strong>kejujuran</strong>
                    </a>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                    <a href="#" class="mini-box">
                        <i><img src="assets/images/icon/4.png" alt=""></i>
                        <strong>Integritas</strong>
                    </a>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                    <a href="#" class="mini-box">
                        <i><img src="assets/images/icon/2.png" alt=""></i>
                        <strong>Determinasi</strong>
                    </a>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                    <a href="#" class="mini-box">
                        <i><img src="assets/images/icon/6.png" alt=""></i>
                        <strong>Kerjasama Tim</strong>
                    </a>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                    <a href="#" class="mini-box">
                        <i><img src="assets/images/icon/1.png" alt=""></i>
                        <strong>Amanah</strong>
                    </a>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                    <a href="#" class="mini-box">
                        <i><img src="assets/images/icon/5.png" alt=""></i>
                        <strong>Terpercaya</strong>
                    </a>
                </div>
            </div>
            <!-- ***** Mini Box End ***** -->
        </div>
    </div>
</section>

<section class="minu" id="work-process">
    <div class="mini-content">
        <div class="container">
            <div class="row">
                <div class="offset-lg-3 col-lg-6">
                    <div class="info">
                        <h1>Terdaftar</h1>
                        <p><strong style="color: #e1bd36;">Paluma Travel </strong>telah memiliki beberapa partner</p>
                    </div>
                </div>
            </div>

            <!-- ***** Mini Box Start ***** -->
            <div style="justify-content: center;" class="row">
                <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                    <a href="#" class="mini-box">
                        <i><img style="width: 100%;" src="assets/images/iata.png" alt=""></i>
                    </a>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                    <a href="#" class="mini-box">
                        <i><img style="width: 100%;" src="assets/images/kan.png" alt=""></i>
                    </a>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                    <a href="#" class="mini-box">
                        <i><img style="width: 100%;" src="assets/images/kemenag.png" alt=""></i>
                    </a>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                    <a href="#" class="mini-box">
                        <i><img style="width: 100%;" src="assets/images/kesthuri.png" alt=""></i>
                    </a>
                </div>
            </div>
            <!-- ***** Mini Box End ***** -->
        </div>
    </div>
</section>
<!-- ***** Home Parallax End ***** -->

<!-- ***** Pricing Plans Start ***** -->
<section class="section colored" id="pricing-plans">
    <div class="container">
        <!-- ***** Section Title Start ***** -->
        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="center-heading">
                    <h2 class="section-title" style="color: #fff;">Daftar Paket</h2>
                </div>
            </div>
            <div class="offset-lg-3 col-lg-6">
                <div class="center-text">
                    <p style="color: #fff;"><strong style="color: #e1bd36;">Paluma Travel </strong>memiliki beberapa paket Haji dan Umrah</p>
                </div>
            </div>
        </div>
        <!-- ***** Section Title End ***** -->

        <div class="row">
            <!-- ***** Pricing Item Start ***** -->
            <div class="col-lg-4 col-md-6 col-sm-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                <div class="pricing-item">
                    <div class="pricing-header">
                        <h3 class="pricing-title">Family Umrah</h3>
                    </div>
                    <div class="pricing-body">
                        <div class="price-wrapper" style="background-color: #e1bd36;">
                            <span class="currency">Rp.</span>
                            <span class="price">44 jt</span>
                            <span class="period"><i class=" fa fa-plane"></i> December 2022</span>
                        </div>
                        <ul class="list">
                            <li class="active">Tiket Jakarta - Madinah/Jeddah PP</li>
                            <li class="active">Hotel Kamar Quad (Berempat)</li>
                            <li class="active">Visa Umroh</li>
                            <li class="active">Handling & Lounge Airport</li>
                            <li class="active">Makan 3x fullboard hotel</li>
                            <li class="active">Air Zamzam 5lt</li>
                        </ul>
                    </div>
                    <div class="pricing-footer" style="display: block;">
                        <a href="" class="main-button mr-1" data-toggle="modal" data-target="#exampleModal">Lihat Detail</a>
                        <a href="https://api.whatsapp.com/send?phone=628128037789&text=Halo, Paluma Travel!" class="main-button" style="margin-top: 20px;">Kontak Kami</a>
                    </div>
                </div>
            </div>
            <!-- ***** Pricing Item End ***** -->

            <!-- ***** Pricing Item Start ***** -->
            <div class="col-lg-4 col-md-6 col-sm-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.4s">
                <div class="pricing-item active">
                    <div class="pricing-header">
                        <h3 class="pricing-title">Umrah Milad</h3>
                    </div>
                    <div class="pricing-body">
                        <div class="price-wrapper">
                            <span class="currency">Rp.</span>
                            <span class="price">27,9 jt</span>
                            <span class="period"><i class=" fa fa-plane"></i> 10 December 2022</span>
                        </div>
                        <ul class="list">
                            <li class="active">JKT-MED/JDH PP</li>
                            <li class="active">Visa Umroh</li>
                            <li class="active">Makan 3x Fullboard</li>
                            <li class="active">Handling Airport</li>
                            <li class="active">Ziarah Makkah & Madinah</li>
                            <li class="active">Bus Executive 2022</li>
                        </ul>
                    </div>
                    <div class="pricing-footer">
                        <a href="#" class="main-button" data-toggle="modal" data-target="#exampleModal2">Lihat Detail</a>
                        <a href="https://api.whatsapp.com/send?phone=628128037789&text=Halo, Paluma Travel!" class="main-button" style="margin-top: 20px;">Kontak Kami</a>
                    </div>
                </div>
            </div>
            <!-- ***** Pricing Item End ***** -->

            <!-- ***** Pricing Item Start ***** -->
            <div class="col-lg-4 col-md-6 col-sm-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.6s">
                <div class="pricing-item">
                    <div class="pricing-header">
                        <h3 class="pricing-title">Haji Khusus</h3>
                    </div>
                    <div class="pricing-body">
                        <div class="price-wrapper">
                            <span class="currency">$</span>
                            <span class="price">18,500 - 25,000</span>
                            <span class="period"><i class=" fa fa-plane"></i> 2023</span>
                        </div>
                        <ul class="list">
                            <li class="active"><strong style="color:#2b5679;">Reguler</strong></li>
                            <li class="active">Maktab : Farodah</li>
                            <li class="active">Program 28 hari full arbain</li>
                            <li class="active"><strong style="color:#2b5679;">VIP</strong></li>
                            <li class="active">Maktab : VIP</li>
                            <li class="active">Program 24 hari Non Arbain</li>
                        </ul>
                    </div>
                    <div class="pricing-footer">
                        <a href="assets/images/paket3.png" class="main-button" data-toggle="modal" data-target="#exampleModal3">Lihat Detail</a>
                        <a href="https://api.whatsapp.com/send?phone=628128037789&text=Halo, Paluma Travel!" class="main-button" style="margin-top: 20px;">Kontak Kami</a>
                    </div>
                </div>
            </div>
            <!-- ***** Pricing Item End ***** -->
        </div>
    </div>
</section>
<!-- ***** Pricing Plans End ***** -->

<!-- ***** Counter Parallax Start ***** -->
<!-- <section class="counter">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="count-item decoration-bottom">
                        <strong>126</strong>
                        <span>Projects</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="count-item decoration-top">
                        <strong>63</strong>
                        <span>Happy Clients</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="count-item decoration-bottom">
                        <strong>18</strong>
                        <span>Awards Wins</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="count-item">
                        <strong>27</strong>
                        <span>Countries</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- ***** Counter Parallax End ***** -->

<!-- ***** Blog Start ***** -->
<section class="section" id="blog">
    <div class="container">
        <!-- ***** Section Title Start ***** -->
        <div class="row">
            <div class="col-lg-12">
                <div class="center-heading">
                    <h2 class="section-title">Video Testimoni</h2>
                </div>
            </div>
            <div class="offset-lg-3 col-lg-6">
                <div class="center-text">
                    <p>Beberapa Video Testimoni dari Jamaah Haji & Umrah <strong style="color: #e1bd36;">Paluma Travel</strong></p>
                </div>
            </div>
        </div>
        <!-- ***** Section Title End ***** -->

        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="blog-post-thumb">
                    <div class="img">
                        <video class=w-100 controls>
                            <source src="assets/images/test.mp4">
                        </video>
                    </div>
                    <!-- <div class="blog-content">
                        <h3>
                            <a href="#">Vivamus ac vehicula dui</a>
                        </h3>
                        <div class="text">
                            Cras aliquet ligula dui, vitae fermentum velit tincidunt id. Praesent eu finibus nunc. Nulla in sagittis eros. Aliquam egestas augue.
                        </div>
                        <a href="#" class="main-button">Read More</a>
                    </div> -->
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 bs-3">
                <div class="blog-post-thumb">
                    <div class="img">
                        <video class=w-100 controls>
                            <source src="assets/images/test2.mp4">
                        </video>
                    </div>
                    <!-- <div class="blog-content">
                        <h3>
                            <a href="#">Phasellus convallis augue</a>
                        </h3>
                        <div class="text">
                            Aliquam commodo ornare nisl, et scelerisque nisl dignissim ac. Vestibulum finibus urna ut velit venenatis, vel ultrices sapien mattis.
                        </div>
                        <a href="#" class="main-button">Read More</a>
                    </div> -->
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="blog-post-thumb">
                    <div class="img">
                        <video class=w-100 controls>
                            <source src="assets/images/test3.mp4">
                        </video>
                    </div>
                    <!-- <div class="blog-content">
                        <h3>
                            <a href="#">Nam gravida purus non</a>
                        </h3>
                        <div class="text">
                            Maecenas eu erat vitae dui convallis consequat vel gravida nulla. Vestibulum finibus euismod odio, ut tempus enim varius eu.
                        </div>
                        <a href="#" class="main-button">Read More</a>
                    </div> -->
                </div>
            </div>
            <div class="offset-lg-3 col-lg-6">
                <div class="center-text">
                    <p>*klik pada video untuk memulai</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Blog End ***** -->

<div class="row">
    <div class="col-lg-12">
        <div class="center-heading">
            <h2 class="section-title">Galeri Foto</h2>
        </div>
    </div>
    <div class="offset-lg-3 col-lg-6">
        <div class="center-text">
            <p>Beberapa Foto dari Jamaah Haji & Umrah <strong style="color: #e1bd36;">Paluma Travel</strong></p>
        </div>
    </div>
</div>

<div class="gallery mb-5 w-100" id="gallery">
    <div class="gallery-item">
        <div class="content"><img src="assets/images/jamaah/11.jpeg" alt=""></div>
    </div>
    <div class="gallery-item">
        <div class="content"><img src="assets/images/jamaah/1.jpeg" alt=""></div>
    </div>
    <div class="gallery-item">
        <div class="content"><img src="assets/images/jamaah/2.jpeg" alt=""></div>
    </div>
    <div class="gallery-item">
        <div class="content"><img src="assets/images/jamaah/3.jpeg" alt=""></div>
    </div>
    <div class="gallery-item">
        <div class="content"><img src="assets/images/jamaah/4.jpeg" alt=""></div>
    </div>
    <div class="gallery-item">
        <div class="content"><img src="assets/images/jamaah/5.jpeg" alt=""></div>
    </div>
    <div class="gallery-item">
        <div class="content"><img src="assets/images/jamaah/6.jpeg" alt=""></div>
    </div>
    <div class="gallery-item">
        <div class="content"><img src="assets/images/jamaah/7.jpeg" alt=""></div>
    </div>
    <div class="gallery-item">
        <div class="content"><img src="assets/images/jamaah/8.jpeg" alt=""></div>
    </div>
    <div class="gallery-item">
        <div class="content"><img src="assets/images/jamaah/9.jpeg" alt=""></div>
    </div>
    <div class="gallery-item">
        <div class="content"><img src="assets/images/jamaah/10.jpeg" alt=""></div>
    </div>
</div>

</body>

<!-- ***** Contact Us Start ***** -->
<section class="section coloredd" id="contact-us">
    <div class="container">
        <!-- ***** Section Title Start ***** -->
        <div class="row">
            <div class="col-lg-12 mb-5">
                <div class="center-heading">
                    <h2 class="section-title">Temukan Kami <strong style="color: #e1bd36;">Paluma Travel</strong></h2>
                </div>
            </div>
        </div>
        <!-- ***** Section Title End ***** -->

        <div class="row">
            <!-- ***** Contact Text Start ***** -->
            <div class="col-lg-4 col-md-6 col-sm-12" style="text-align: center;">
                <h5 class="margin-bottom-15">Alamat <strong style="color: #e1bd36;">Paluma Travel</strong></h5>
                <div class="contact-text">
                    <a>Komplek Islamic Centre Bekasi, Jl Jend. Achmad Yani No.22, Kotga Bekasi, Jawa Barat, 17141.</a>
                    <br>
                    <br>
                    <a style="color: #e1bd36;">*klik pada MAP untuk Rute</a> <br> <br>
                </div>
                <h5 class="margin-bottom-15">No. Telp <strong style="color: #e1bd36;">Paluma Travel</strong></h5>
                <div class="contact-text">
                    <a href="https://api.whatsapp.com/send?phone=628128037789&text=Halo, Paluma Travel!">+62-8128037789</a>
                    <br>
                    <br>
                </div>
                <h5 class="margin-bottom-15">Alamat Email <strong style="color: #e1bd36;">Paluma Travel</strong></h5>
                <div class="contact-text">
                    <a>halalsehat98@gmail.com</a>
                    <br>
                    <br>
                </div>
            </div>
            <!-- ***** Contact Text End ***** -->

            <!-- ***** Contact Form Start ***** -->
            <div class="col-lg-8 col-md-6 col-sm-12 align-end">
                <a href="https://goo.gl/maps/5WYQ611AY9C1dUet9">
                    <img width="100%" src="assets/images/map.png" alt="">
                </a>
            </div>
            <!-- ***** Contact Form End ***** -->
        </div>
    </div>
</section>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Add image inside the body of modal -->
            <div class="modal-body">
                <img class="w-100" style="margin: auto; display:block;" id="image" src="assets/images/paket11.png" alt="Click on button" />
            </div>

            <!-- <div class="modal-footer">
                <button type="button" class="main-button" data-dismiss="modal">
                    Close
                </button>
            </div> -->
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Add image inside the body of modal -->
            <div class="modal-body w-100">
                <img class="w-100" style="margin: auto; display:block;" id="image" src="assets/images/paket22.png" alt="Click on button" />
            </div>

            <!-- <div class="modal-footer">
                <button type="button" class="main-button" data-dismiss="modal">
                    Close
                </button>
            </div> -->
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Add image inside the body of modal -->
            <div class="modal-body w-100">
                <img class="w-100" style="margin: auto; display:block;" id="image" src="assets/images/paket3.png" alt="Click on button" />
            </div>

            <!-- <div class="modal-footer">
                <button type="button" class="main-button" data-dismiss="modal">
                    Close
                </button>
            </div> -->
        </div>
    </div>
</div>

<script>
    var gallery = document.querySelector('#gallery');
    var getVal = function(elem, style) {
        return parseInt(window.getComputedStyle(elem).getPropertyValue(style));
    };
    var getHeight = function(item) {
        return item.querySelector('.content').getBoundingClientRect().height;
    };
    var resizeAll = function() {
        var altura = getVal(gallery, 'grid-auto-rows');
        var gap = getVal(gallery, 'grid-row-gap');
        gallery.querySelectorAll('.gallery-item').forEach(function(item) {
            var el = item;
            el.style.gridRowEnd = "span " + Math.ceil((getHeight(item) + gap) / (altura + gap));
        });
    };
    gallery.querySelectorAll('img').forEach(function(item) {
        item.classList.add('byebye');
        if (item.complete) {
            console.log(item.src);
        } else {
            item.addEventListener('load', function() {
                var altura = getVal(gallery, 'grid-auto-rows');
                var gap = getVal(gallery, 'grid-row-gap');
                var gitem = item.parentElement.parentElement;
                gitem.style.gridRowEnd = "span " + Math.ceil((getHeight(gitem) + gap) / (altura + gap));
                item.classList.remove('byebye');
            });
        }
    });
    window.addEventListener('resize', resizeAll);
    gallery.querySelectorAll('.gallery-item').forEach(function(item) {
        item.addEventListener('click', function() {
            item.classList.toggle('full');
        });
    });

    $(document).ready(function() {
        $('.customer-logos').slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1500,
            arrows: false,
            dots: false,
            pauseOnHover: false,
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 4
                }
            }, {
                breakpoint: 520,
                settings: {
                    slidesToShow: 3
                }
            }]
        });
    });
</script>


<!-- Adding scripts to use bootstrap -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<!-- ***** Contact Us End ***** -->