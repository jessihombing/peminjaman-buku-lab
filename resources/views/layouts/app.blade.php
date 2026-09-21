<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'LabMI Library') }}</title>

        <!-- Tailwind CSS CDN -->
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Alpine.js CDN -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Crimson+Text:ital,wght@0,600;1,400&display=swap" rel="stylesheet" />

        <style>
            /* ===== BACKGROUND PERPUSTAKAAN ===== */
            .library-bg {
                position: fixed;
                inset: 0;
                z-index: -1;
                background:
                    radial-gradient(ellipse at 50% 0%, rgba(255, 200, 100, 0.3) 0%, transparent 45%),
                    radial-gradient(ellipse at 50% 100%, rgba(80, 40, 15, 0.6) 0%, transparent 60%),
                    linear-gradient(180deg, #3d2417 0%, #2a1810 50%, #1a0f08 100%);
                overflow: hidden;
            }

            .lamp-glow {
                position: absolute;
                top: -25%;
                left: 50%;
                transform: translateX(-50%);
                width: 90vw;
                height: 70vh;
                background: radial-gradient(ellipse, rgba(255, 220, 150, 0.22) 0%, transparent 70%);
                animation: lampBreathe 6s ease-in-out infinite;
                pointer-events: none;
            }
            @keyframes lampBreathe {
                0%, 100% { opacity: 0.7; }
                50% { opacity: 1; }
            }

            .bookshelf {
                position: absolute;
                top: 0;
                height: 100vh;
                width: 20vw;
                min-width: 200px;
                max-width: 300px;
                display: flex;
                flex-direction: column;
                background:
                    linear-gradient(90deg, rgba(0,0,0,0.6) 0%, rgba(60, 35, 20, 1) 30%, rgba(80, 45, 25, 1) 70%, rgba(0,0,0,0.6) 100%),
                    #3d2417;
                box-shadow:
                    inset 0 0 60px rgba(0,0,0,0.9),
                    0 0 40px rgba(0,0,0,0.8);
            }
            .bookshelf.left  { left: 0; }
            .bookshelf.right { right: 0; }

            .shelf-row {
                display: flex;
                align-items: flex-end;
                gap: 1px;
                padding: 0 6px;
                height: 20%;
                position: relative;
                border-bottom: 8px solid #1a0f08;
                background: linear-gradient(180deg, transparent 80%, rgba(0,0,0,0.5) 100%);
                box-shadow:
                    0 6px 12px rgba(0,0,0,0.7),
                    inset 0 -2px 3px rgba(255,200,120,0.1);
                overflow: hidden;
            }

            .book-spine {
                position: relative;
                border-radius: 3px 3px 0 0;
                box-shadow:
                    inset -3px 0 6px rgba(0,0,0,0.5),
                    inset 3px 0 4px rgba(255,255,255,0.15),
                    inset 0 -8px 8px rgba(0,0,0,0.3),
                    1px 0 2px rgba(0,0,0,0.6);
                cursor: pointer;
                transition: transform 0.4s ease, box-shadow 0.4s ease;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                padding: 4px 2px;
                overflow: hidden;
                animation: bookBreathe 5s ease-in-out infinite;
            }

            .book-spine::before,
            .book-spine::after {
                content: '';
                position: absolute;
                left: 15%;
                right: 15%;
                height: 2px;
                background: linear-gradient(90deg, transparent, rgba(212, 175, 55, 0.9), transparent);
                box-shadow: 0 0 4px rgba(212, 175, 55, 0.6);
            }
            .book-spine::before { top: 12%; }
            .book-spine::after  { bottom: 12%; }

            .book-title {
                font-family: 'Crimson Text', serif;
                font-size: 0.55rem;
                font-weight: 600;
                color: rgba(255, 240, 200, 0.85);
                writing-mode: vertical-rl;
                text-orientation: mixed;
                letter-spacing: 1px;
                text-shadow: 0 0 3px rgba(0,0,0,0.8);
                padding: 4px 0;
                max-height: 70%;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
                text-transform: uppercase;
            }

            .book-ornament {
                position: absolute;
                top: 20%;
                left: 50%;
                transform: translateX(-50%);
                width: 60%;
                height: 8px;
                background: radial-gradient(ellipse, rgba(212, 175, 55, 0.8), transparent 70%);
                border-radius: 50%;
            }

            @keyframes bookBreathe {
                0%, 100% { transform: scaleY(1); }
                50% { transform: scaleY(1.015); }
            }

            .book-spine.alive {
                animation: bookAlive 10s ease-in-out infinite;
            }
            @keyframes bookAlive {
                0%, 85%, 100% {
                    transform: translateY(0) scaleY(1);
                    box-shadow:
                        inset -3px 0 6px rgba(0,0,0,0.5),
                        inset 3px 0 4px rgba(255,255,255,0.15);
                }
                92% {
                    transform: translateY(-12px) scaleY(1.02);
                    box-shadow:
                        0 0 25px 8px rgba(255, 215, 120, 0.9),
                        0 0 60px 15px rgba(255, 200, 100, 0.5);
                }
            }

            .flying-book {
                position: absolute;
                width: 60px;
                height: 80px;
                border-radius: 3px;
                opacity: 0;
                animation: flyAcross linear infinite;
                box-shadow:
                    inset -3px 0 6px rgba(0,0,0,0.5),
                    inset 3px 0 4px rgba(255,255,255,0.15),
                    0 0 30px rgba(255, 200, 100, 0.6);
                pointer-events: none;
                transform-style: preserve-3d;
            }
            .flying-book::before {
                content: '';
                position: absolute;
                top: 8%;
                bottom: 8%;
                left: 8%;
                right: 8%;
                border: 1px solid rgba(212, 175, 55, 0.7);
                border-radius: 2px;
                pointer-events: none;
            }
            .flying-book::after {
                content: '';
                position: absolute;
                top: 30%;
                left: 25%;
                right: 25%;
                height: 40%;
                background: radial-gradient(ellipse, rgba(212, 175, 55, 0.9), transparent);
                border-radius: 50%;
                opacity: 0.6;
            }

            @keyframes flyAcross {
                0% {
                    transform: translate(-10vw, 100vh) rotate(-25deg) scale(0.6);
                    opacity: 0;
                }
                15% {
                    opacity: 0.9;
                    transform: translate(10vw, 80vh) rotate(-15deg) scale(0.9);
                }
                50% {
                    opacity: 1;
                    transform: translate(50vw, 50vh) rotate(5deg) scale(1);
                }
                85% {
                    opacity: 0.9;
                    transform: translate(90vw, 20vh) rotate(20deg) scale(0.9);
                }
                100% {
                    transform: translate(110vw, 0vh) rotate(30deg) scale(0.6);
                    opacity: 0;
                }
            }

            .dust {
                position: absolute;
                width: 3px; height: 3px;
                background: rgba(255, 220, 150, 0.9);
                border-radius: 50%;
                box-shadow: 0 0 8px 3px rgba(255, 200, 100, 0.5);
                animation: dustFloat linear infinite;
                pointer-events: none;
            }
            @keyframes dustFloat {
                0% {
                    transform: translate(0, 100vh) scale(0.5);
                    opacity: 0;
                }
                10% { opacity: 0.9; }
                90% { opacity: 0.9; }
                100% {
                    transform: translate(60px, -10vh) scale(1.3);
                    opacity: 0;
                }
            }

            .glass-card {
                background: rgba(255, 250, 240, 0.96) !important;
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
                border: 1px solid rgba(255, 220, 150, 0.3);
                box-shadow: 0 10px 40px rgba(0,0,0,0.4);
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <!-- ===== BACKGROUND PERPUSTAKAAN ===== -->
        <div class="library-bg">
            <div class="lamp-glow"></div>

            <!-- ===== RAK BUKU KIRI ===== -->
            <div class="bookshelf left">
                <div class="shelf-row">
                    <div class="book-spine" style="background:linear-gradient(180deg,#7f1d1d,#991b1b); width:22px; height:92%;"><span class="book-ornament"></span><span class="book-title">Laravel</span></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#14532d,#166534); width:18px; height:85%;"><span class="book-ornament"></span><span class="book-title">PHP</span></div>
                    <div class="book-spine alive" style="background:linear-gradient(180deg,#713f12,#a16207); width:26px; height:95%;"><span class="book-ornament"></span><span class="book-title">Sejarah</span></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#581c87,#7e22ce); width:20px; height:88%;"><span class="book-ornament"></span><span class="book-title">Matematika</span></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#7c2d12,#9a3412); width:24px; height:82%;"><span class="book-ornament"></span><span class="book-title">Fisika</span></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#0c4a6e,#0e7490); width:19px; height:90%;"><span class="book-ornament"></span><span class="book-title">Kimia</span></div>
                    <div class="book-spine alive" style="background:linear-gradient(180deg,#831843,#be123c); width:21px; height:87%;"><span class="book-ornament"></span><span class="book-title">Sastra</span></div>
                </div>
                <div class="shelf-row">
                    <div class="book-spine" style="background:linear-gradient(180deg,#1e3a8a,#1e40af); width:23px; height:90%;"><span class="book-ornament"></span><span class="book-title">Algoritma</span></div>
                    <div class="book-spine alive" style="background:linear-gradient(180deg,#831843,#9d174d); width:19px; height:84%;"><span class="book-ornament"></span><span class="book-title">Biologi</span></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#78350f,#92400e); width:25px; height:94%;"><span class="book-ornament"></span><span class="book-title">Ekonomi</span></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#164e63,#155e75); width:17px; height:88%;"><span class="book-ornament"></span><span class="book-title">Geografi</span></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#4c1d95,#5b21b6); width:22px; height:92%;"><span class="book-ornament"></span><span class="book-title">Filsafat</span></div>
                    <div class="book-spine alive" style="background:linear-gradient(180deg,#7f1d1d,#b91c1c); width:20px; height:86%;"><span class="book-ornament"></span><span class="book-title">Novel</span></div>
                </div>
                <div class="shelf-row">
                    <div class="book-spine" style="background:linear-gradient(180deg,#14532d,#15803d); width:20px; height:88%;"><span class="book-ornament"></span><span class="book-title">Komik</span></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#713f12,#854d0e); width:24px; height:92%;"><span class="book-ornament"></span><span class="book-title">Puisi</span></div>
                    <div class="book-spine alive" style="background:linear-gradient(180deg,#1e293b,#334155); width:19px; height:85%;"><span class="book-ornament"></span><span class="book-title">Kamus</span></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#581c87,#6b21a8); width:22px; height:90%;"><span class="book-ornament"></span><span class="book-title">Drama</span></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#831843,#be185d); width:18px; height:88%;"><span class="book-ornament"></span><span class="book-title">Sejarah</span></div>
                </div>
                <div class="shelf-row">
                    <div class="book-spine" style="background:linear-gradient(180deg,#7c2d12,#c2410c); width:21px; height:92%;"><span class="book-ornament"></span><span class="book-title">Artikel</span></div>
                    <div class="book-spine alive" style="background:linear-gradient(180deg,#0c4a6e,#0369a1); width:19px; height:86%;"><span class="book-ornament"></span><span class="book-title">Jurnal</span></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#7f1d1d,#991b1b); width:25px; height:90%;"><span class="book-ornament"></span><span class="book-title">Ensiklopedia</span></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#4c1d95,#7e22ce); width:20px; height:88%;"><span class="book-ornament"></span><span class="book-title">Antologi</span></div>
                </div>
                <div class="shelf-row">
                    <div class="book-spine" style="background:linear-gradient(180deg,#14532d,#166534); width:22px; height:90%;"><span class="book-ornament"></span><span class="book-title">Python</span></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#713f12,#a16207); width:19px; height:84%;"><span class="book-ornament"></span><span class="book-title">Java</span></div>
                    <div class="book-spine alive" style="background:linear-gradient(180deg,#7f1d1d,#b91c1c); width:24px; height:92%;"><span class="book-ornament"></span><span class="book-title">C++</span></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#1e3a8a,#1d4ed8); width:18px; height:86%;"><span class="book-ornament"></span><span class="book-title">HTML</span></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#581c87,#7e22ce); width:21px; height:88%;"><span class="book-ornament"></span><span class="book-title">CSS</span></div>
                </div>
            </div>

            <!-- ===== RAK BUKU KANAN ===== -->
            <div class="bookshelf right">
                <div class="shelf-row">
                    <div class="book-spine" style="background:linear-gradient(180deg,#0c4a6e,#0e7490); width:22px; height:88%;"><span class="book-ornament"></span><span class="book-title">Database</span></div>
                    <div class="book-spine alive" style="background:linear-gradient(180deg,#831843,#be123c); width:20px; height:92%;"><span class="book-ornament"></span><span class="book-title">SQL</span></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#713f12,#854d0e); width:25px; height:85%;"><span class="book-ornament"></span><span class="book-title">Jaringan</span></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#581c87,#6b21a8); width:19px; height:90%;"><span class="book-ornament"></span><span class="book-title">Keamanan</span></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#7f1d1d,#991b1b); width:23px; height:87%;"><span class="book-ornament"></span><span class="book-title">AI</span></div>
                    <div class="book-spine alive" style="background:linear-gradient(180deg,#14532d,#15803d); width:21px; height:92%;"><span class="book-ornament"></span><span class="book-title">ML</span></div>
                </div>
                <div class="shelf-row">
                    <div class="book-spine alive" style="background:linear-gradient(180deg,#7c2d12,#9a3412); width:22px; height:90%;"><span class="book-ornament"></span><span class="book-title">UX Design</span></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#1e293b,#334155); width:18px; height:85%;"><span class="book-ornament"></span><span class="book-title">UI</span></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#1e3a8a,#2563eb); width:24px; height:92%;"><span class="book-ornament"></span><span class="book-title">Figma</span></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#831843,#a21caf); width:20px; height:88%;"><span class="book-ornament"></span><span class="book-title">Ilustrasi</span></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#14532d,#166534); width:22px; height:90%;"><span class="book-ornament"></span><span class="book-title">Fotografi</span></div>
                </div>
                <div class="shelf-row">
                    <div class="book-spine" style="background:linear-gradient(180deg,#7f1d1d,#b91c1c); width:21px; height:88%;"><span class="book-ornament"></span><span class="book-title">Visi Misi</span></div>
                    <div class="book-spine alive" style="background:linear-gradient(180deg,#713f12,#a16207); width:24px; height:92%;"><span class="book-ornament"></span><span class="book-title">Manajemen</span></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#4c1d95,#7e22ce); width:19px; height:85%;"><span class="book-ornament"></span><span class="book-title">Bisnis</span></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#0c4a6e,#0369a1); width:22px; height:90%;"><span class="book-ornament"></span><span class="book-title">Pemasaran</span></div>
                </div>
                <div class="shelf-row">
                    <div class="book-spine" style="background:linear-gradient(180deg,#581c87,#6b21a8); width:20px; height:88%;"><span class="book-ornament"></span><span class="book-title">Filsafat</span></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#831843,#be123c); width:23px; height:92%;"><span class="book-ornament"></span><span class="book-title">Agama</span></div>
                    <div class="book-spine alive" style="background:linear-gradient(180deg,#14532d,#15803d); width:19px; height:86%;"><span class="book-ornament"></span><span class="book-title">Budaya</span></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#7c2d12,#c2410c); width:22px; height:90%;"><span class="book-ornament"></span><span class="book-title">Politik</span></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#1e293b,#475569); width:18px; height:84%;"><span class="book-ornament"></span><span class="book-title">Hukum</span></div>
                </div>
                <div class="shelf-row">
                    <div class="book-spine" style="background:linear-gradient(180deg,#1e40af,#1d4ed8); width:22px; height:90%;"><span class="book-ornament"></span><span class="book-title">Fiksi</span></div>
                    <div class="book-spine alive" style="background:linear-gradient(180deg,#7f1d1d,#991b1b); width:20px; height:88%;"><span class="book-ornament"></span><span class="book-title">Misteri</span></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#713f12,#854d0e); width:24px; height:92%;"><span class="book-ornament"></span><span class="book-title">Romance</span></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#0c4a6e,#0e7490); width:19px; height:85%;"><span class="book-ornament"></span><span class="book-title">Fantasi</span></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#4c1d95,#7e22ce); width:21px; height:90%;"><span class="book-ornament"></span><span class="book-title">Horor</span></div>
                </div>
            </div>

            <!-- BUKU TERBANG -->
            <div class="flying-book" style="background:linear-gradient(135deg,#7f1d1d,#b91c1c); animation-duration: 20s; animation-delay: 0s;"></div>
            <div class="flying-book" style="background:linear-gradient(135deg,#14532d,#15803d); animation-duration: 26s; animation-delay: 7s; width:70px; height:90px;"></div>
            <div class="flying-book" style="background:linear-gradient(135deg,#581c87,#7e22ce); animation-duration: 23s; animation-delay: 14s; width:55px; height:75px;"></div>

            <!-- DEBU -->
            <span class="dust" style="left: 25%; animation-duration: 12s; animation-delay: 0s;"></span>
            <span class="dust" style="left: 40%; animation-duration: 15s; animation-delay: 2s;"></span>
            <span class="dust" style="left: 55%; animation-duration: 10s; animation-delay: 4s;"></span>
            <span class="dust" style="left: 70%; animation-duration: 14s; animation-delay: 1s;"></span>
            <span class="dust" style="left: 33%; animation-duration: 11s; animation-delay: 6s;"></span>
            <span class="dust" style="left: 62%; animation-duration: 13s; animation-delay: 3s;"></span>
            <span class="dust" style="left: 48%; animation-duration: 16s; animation-delay: 5s;"></span>
            <span class="dust" style="left: 80%; animation-duration: 12s; animation-delay: 7s;"></span>
        </div>

        <!-- ===== KONTEN UTAMA (TIDAK PAKAI BORDER EMAS) ===== -->
        <div class="min-h-screen relative z-10">
            @include('layouts.navigation')

            @isset($header)
                <header class="bg-white/70 backdrop-blur-md shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>