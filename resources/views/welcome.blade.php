<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReservHub - Reservasi Mudah</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #E8F5E9 0%, #FFFFFF 50%, #E8F5E9 100%);
            overflow-x: hidden;
            position: relative;
        }

        /* ornamen blur bulat */
        .blob {
            position: fixed;
            border-radius: 50%;
            filter: blur(60px);
            opacity: 0.5;
            z-index: 0;
            pointer-events: none;
        }

        .blob-1 {
            width: 350px;
            height: 350px;
            background: #A5D6A7;
            top: -80px;
            left: -100px;
        }

        .blob-2 {
            width: 400px;
            height: 400px;
            background: #C8E6C9;
            bottom: -100px;
            right: -120px;
        }

        .blob-3 {
            width: 150px;
            height: 150px;
            background: #81C784;
            top: 40%;
            right: 8%;
            opacity: 0.25;
            animation: floatShape 6s ease-in-out infinite;
        }

        @keyframes floatShape {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-25px); }
        }

        /* container utama */
        .main-wrapper {
            position: relative;
            z-index: 1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 40px 20px;
        }

        .brand-title {
            font-weight: 800;
            font-size: 3rem;
            color: #198754;
            letter-spacing: -1px;
        }

        .brand-subtitle {
            color: #6c757d;
            font-size: 1.1rem;
            margin-top: 8px;
            margin-bottom: 35px;
        }

        /* carousel custom */
        .carousel-wrapper {
            width: 850px;
            max-width: 90vw;
            position: relative;
        }

        .carousel-card {
            width: 100%;
            height: 480px;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.15);
            position: relative;
            background: #f1f1f1;
        }

        .carousel-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transform: scale(1.05);
            transition: opacity 1s ease, transform 1.2s ease;
        }

        .carousel-slide.active {
            opacity: 1;
            transform: scale(1);
            z-index: 2;
        }

        .carousel-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* caption di bawah gambar */
        .caption-box {
            margin-top: 22px;
            min-height: 70px;
        }

        .caption-title {
            font-weight: 700;
            font-size: 1.4rem;
            color: #212529;
            opacity: 0;
            transform: translateY(10px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .caption-desc {
            color: #6c757d;
            font-size: 0.95rem;
            margin-top: 4px;
            opacity: 0;
            transform: translateY(10px);
            transition: opacity 0.6s ease 0.1s, transform 0.6s ease 0.1s;
        }

        .caption-title.show,
        .caption-desc.show {
            opacity: 1;
            transform: translateY(0);
        }

        /* indikator */
        .indicators {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 18px;
        }

        .dot {
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: #A5D6A7;
            cursor: pointer;
            transition: all 0.4s ease;
        }

        .dot.active {
            width: 26px;
            border-radius: 6px;
            background: #198754;
        }

        /* tombol */
        .btn-group-custom {
            margin-top: 40px;
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .btn-login {
            background: #198754;
            color: #fff;
            border: none;
            padding: 13px 40px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1rem;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .btn-login:hover {
            background: #146c43;
            color: #fff;
            transform: translateY(-2px);
        }

        .btn-register {
            background: #fff;
            color: #198754;
            border: 2px solid #198754;
            padding: 11px 38px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .btn-register:hover {
            background: #198754;
            color: #fff;
            transform: translateY(-2px);
        }

        /* responsive */
        @media (max-width: 768px) {
            .brand-title {
                font-size: 2.2rem;
            }

            .brand-subtitle {
                font-size: 0.95rem;
                padding: 0 10px;
            }

            .carousel-card {
                height: 300px;
                border-radius: 18px;
            }

            .caption-title {
                font-size: 1.15rem;
            }

            .caption-desc {
                font-size: 0.85rem;
            }

            .btn-login,
            .btn-register {
                padding: 11px 28px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>

    <!-- ornamen background -->
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div class="blob blob-3"></div>

    <div class="main-wrapper">

        <!-- judul -->
        <h1 class="brand-title">ReservHub</h1>
        <p class="brand-subtitle">Temukan tempat favoritmu dan lakukan reservasi dengan mudah.</p>

        <!-- carousel -->
        <div class="carousel-wrapper">
            <div class="carousel-card">
                <div class="carousel-slide active" data-index="0">
                    <img src="{{ asset('images/coffee.jpg') }}" alt="Coffee Shop">
                </div>
                <div class="carousel-slide" data-index="1">
                    <img src="{{ asset('images/salon.jpg') }}" alt="Salon">
                </div>
                <div class="carousel-slide" data-index="2">
                    <img src="{{ asset('images/rental.jpg') }}" alt="Rental Alat">
                </div>
            </div>

            <!-- caption -->
            <div class="caption-box">
                <div class="caption-title show" id="captionTitle">Coffee Shop</div>
                <div class="caption-desc show" id="captionDesc">Nikmati suasana nyaman bersama teman.</div>
            </div>

            <!-- indikator -->
            <div class="indicators" id="indicators">
                <span class="dot active" data-index="0"></span>
                <span class="dot" data-index="1"></span>
                <span class="dot" data-index="2"></span>
            </div>
        </div>

        <!-- tombol -->
        <div class="btn-group-custom">
            <a href="{{ route('login') }}" class="btn btn-login">Login</a>
            <a href="{{ route('register') }}" class="btn btn-register">Register</a>
        </div>

    </div>

    <script>
        // data kategori untuk carousel
        const slidesData = [
            {
                title: "Coffee Shop",
                desc: "Nikmati suasana nyaman bersama teman."
            },
            {
                title: "Salon",
                desc: "Reservasi salon favorit tanpa antre."
            },
            {
                title: "Rental Alat",
                desc: "Sewa alat dengan cepat dan mudah."
            }
        ];

        let currentIndex = 0;
        const slides = document.querySelectorAll('.carousel-slide');
        const dots = document.querySelectorAll('.dot');
        const captionTitle = document.getElementById('captionTitle');
        const captionDesc = document.getElementById('captionDesc');

        function goToSlide(index) {
            // ganti gambar
            slides.forEach(slide => slide.classList.remove('active'));
            slides[index].classList.add('active');

            // ganti indikator
            dots.forEach(dot => dot.classList.remove('active'));
            dots[index].classList.add('active');

            // animasi caption keluar dulu
            captionTitle.classList.remove('show');
            captionDesc.classList.remove('show');

            setTimeout(() => {
                captionTitle.textContent = slidesData[index].title;
                captionDesc.textContent = slidesData[index].desc;
                captionTitle.classList.add('show');
                captionDesc.classList.add('show');
            }, 300);

            currentIndex = index;
        }

        function nextSlide() {
            const next = (currentIndex + 1) % slides.length;
            goToSlide(next);
        }

        // auto slide tiap 3 detik
        let autoSlide = setInterval(nextSlide, 3000);

        // klik indikator langsung pindah slide
        dots.forEach(dot => {
            dot.addEventListener('click', () => {
                const index = parseInt(dot.getAttribute('data-index'));
                goToSlide(index);

                // reset interval biar tidak langsung ganti lagi
                clearInterval(autoSlide);
                autoSlide = setInterval(nextSlide, 3000);
            });
        });
    </script>

</body>
</html>
