@extends('pages.layouts.siswa')
@extends('pages.components.siswa.navbar')

@section('title', 'Dashboard - Siswa')

@section('style')
    <style>
        .contener1 {
            background-color: #ece0d0;
        }

        .contener2 {
            background-color: #38210f;
        }
        .swiper-container-wrapper {
            display: flex;
            justify-content: center;
            /* Menempatkan swiper di tengah secara horizontal */
            align-items: center;
            /* Menempatkan swiper di tengah secara vertikal */
            height: 60vh;
            /* Mengatur tinggi wrapper agar memenuhi tinggi layar */

        }

        .swiper-container {
            width: 370px;
            height: 60vh;
        }

        .swiper-slide {
            background-position: center;
            background-size: cover;
            width: 120px;
            height: 180px;
        }

        .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }

        .swiper-button-next,
        .swiper-button-prev {
            background-color: transparent;
            /* Menghilangkan background */
            opacity: 0;
            /* Membuat tombol menjadi transparan */
            pointer-events: auto;
            /* Memastikan tombol tetap bisa diklik */
            width: 50px;
            /* Menyesuaikan area klik */
            height: 50px;
            /* Menyesuaikan area klik */
        }

        .swiper-button-next:hover,
        .swiper-button-prev:hover {
            opacity: 0.2;
            /* Sedikit memperlihatkan tombol saat hover (opsional) */
        }
    </style>
@endsection

@section('main')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <div class="">
        <div class="contener1 pe-3">
            <h1 class="text-center pt-5 pb-2 fw-bolder">Selamat datang, {{ $user->user_nama }}</h1>
            <h4 class="text-center pb-3">pinjam buku sekarang!</h4>
            <!-- Hero Carousel Wrapper -->
            <div class="swiper-container-wrapper">
                <div class="swiper-container swiper-coverflow">
                    <div class="swiper-wrapper">
                        @foreach ($bukus as $buku)
                            <div class="swiper-slide">
                                <img src="{{ asset('images/' . $buku->buku_img) }}" alt="{{ $buku->buku_nama }}"
                                    class="img-fluid">
                            </div>
                        @endforeach
                    </div>
                    <!-- Navigasi (opsional) -->
                    
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <br>            
        </div>
        <div class="contener2">
            <div class="row pt-5 pb-3">
                <div class="col col-4">
                    <div class="text-center">
                        <img src="{{ asset('images/' . $bukus[0]->buku_img) }}" width="200" alt="Manga">
                    </div>
                    <div class="text-center text-white pt-2">
                        <h3>Manga</h3>
                        <p>Koleksi manga jepang</p>
                    </div>
                </div>
                <div class="col col-4">
                    <div class="text-center">
                        <img src="{{ asset('images/' . $bukus[6]->buku_img) }}" width="200" alt="Manga">
                    </div>
                    <div class="text-center text-white pt-2">
                        <h3>Novel</h3>
                        <p>Koleksi novel indonesia</p>
                    </div>
                </div>
                <div class="col col-4">
                    <div class="text-center">
                        <img src="{{ asset('images/' . $bukus[2]->buku_img) }}" width="200" alt="Manga">
                    </div>
                    <div class="text-center text-white pt-2">
                        <h3>Manga</h3>
                        <p>menceritakan tentang perjalanan hidup yang sangat menyenangkan</p>
                    </div>
                </div>
            </div>
            <div class="contener3">
                <h3 class="text-center fw-bolder">Paling banyak di baca</h3>
                
            </div>
        </div>


        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <!-- Inisialisasi Swiper -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var swiper = new Swiper('.swiper-container', {
                    effect: 'coverflow',
                    grabCursor: true,
                    centeredSlides: true,
                    slidesPerView: 'auto',
                    loop: true, // Menambahkan efek loop
                    autoplay: { // Menambahkan autoplay
                        delay: 2000, // Durasi slide (3000ms = 3 detik)
                        disableOnInteraction: false, // Tetap autoplay meskipun ada interaksi pengguna
                    },
                    coverflowEffect: {
                        rotate: 0,
                        stretch: 0,
                        depth: 100,
                        modifier: 1,
                        slideShadows: true,
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                });
            });
        </script>
    </div>
@endsection
