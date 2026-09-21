<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'LabMI Library') }}</title>

        <!-- Tailwind CSS CDN -->
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet" />

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
                background: radial-gradient(ellipse, rgba(255, 220, 150, 0.25) 0%, transparent 70%);
                animation: lampBreathe 6s ease-in-out infinite;
            }
            @keyframes lampBreathe {
                0%, 100% { opacity: 0.7; }
                50% { opacity: 1; }
            }
            .bookshelf {
                position: absolute;
                top: 0; height: 100vh;
                width: 20vw; min-width: 200px; max-width: 300px;
                display: flex; flex-direction: column;
                background: linear-gradient(90deg, rgba(0,0,0,0.6) 0%, rgba(60, 35, 20, 1) 30%, rgba(80, 45, 25, 1) 70%, rgba(0,0,0,0.6) 100%), #3d2417;
                box-shadow: inset 0 0 60px rgba(0,0,0,0.9), 0 0 40px rgba(0,0,0,0.8);
            }
            .bookshelf.left  { left: 0; }
            .bookshelf.right { right: 0; }
            .shelf-row {
                display: flex; align-items: flex-end; gap: 1px;
                padding: 0 6px; height: 20%; position: relative;
                border-bottom: 8px solid #1a0f08;
                box-shadow: 0 6px 12px rgba(0,0,0,0.7);
                overflow: hidden;
            }
            .book-spine {
                position: relative;
                border-radius: 3px 3px 0 0;
                box-shadow: inset -3px 0 6px rgba(0,0,0,0.5), inset 3px 0 4px rgba(255,255,255,0.15), 1px 0 2px rgba(0,0,0,0.6);
                animation: bookBreathe 5s ease-in-out infinite;
            }
            .book-spine::before, .book-spine::after {
                content: '';
                position: absolute;
                left: 15%; right: 15%; height: 2px;
                background: linear-gradient(90deg, transparent, rgba(212, 175, 55, 0.9), transparent);
            }
            .book-spine::before { top: 12%; }
            .book-spine::after  { bottom: 12%; }
            @keyframes bookBreathe {
                0%, 100% { transform: scaleY(1); }
                50% { transform: scaleY(1.015); }
            }
            .dust {
                position: absolute;
                width: 3px; height: 3px;
                background: rgba(255, 220, 150, 0.9);
                border-radius: 50%;
                box-shadow: 0 0 8px 3px rgba(255, 200, 100, 0.5);
                animation: dustFloat linear infinite;
            }
            @keyframes dustFloat {
                0% { transform: translate(0, 100vh) scale(0.5); opacity: 0; }
                10% { opacity: 0.9; }
                90% { opacity: 0.9; }
                100% { transform: translate(60px, -10vh) scale(1.3); opacity: 0; }
            }
            .ornament {
                background: linear-gradient(90deg, transparent, #d4af37, transparent);
                height: 2px;
                border-radius: 1px;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <!-- BACKGROUND -->
        <div class="library-bg">
            <div class="lamp-glow"></div>

            <!-- Rak Kiri -->
            <div class="bookshelf left">
                <div class="shelf-row">
                    <div class="book-spine" style="background:linear-gradient(180deg,#7f1d1d,#991b1b); width:22px; height:92%;"></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#14532d,#166534); width:18px; height:85%;"></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#713f12,#a16207); width:26px; height:95%;"></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#581c87,#7e22ce); width:20px; height:88%;"></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#7c2d12,#9a3412); width:24px; height:82%;"></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#0c4a6e,#0e7490); width:19px; height:90%;"></div>
                </div>
                <div class="shelf-row">
                    <div class="book-spine" style="background:linear-gradient(180deg,#1e3a8a,#1e40af); width:23px; height:90%;"></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#831843,#9d174d); width:19px; height:84%;"></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#78350f,#92400e); width:25px; height:94%;"></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#164e63,#155e75); width:17px; height:88%;"></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#4c1d95,#5b21b6); width:22px; height:92%;"></div>
                </div>
                <div class="shelf-row">
                    <div class="book-spine" style="background:linear-gradient(180deg,#14532d,#15803d); width:20px; height:88%;"></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#713f12,#854d0e); width:24px; height:92%;"></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#1e293b,#334155); width:19px; height:85%;"></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#581c87,#6b21a8); width:22px; height:90%;"></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#831843,#be185d); width:18px; height:88%;"></div>
                </div>
                <div class="shelf-row">
                    <div class="book-spine" style="background:linear-gradient(180deg,#7c2d12,#c2410c); width:21px; height:92%;"></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#0c4a6e,#0369a1); width:19px; height:86%;"></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#7f1d1d,#991b1b); width:25px; height:90%;"></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#4c1d95,#7e22ce); width:20px; height:88%;"></div>
                </div>
                <div class="shelf-row">
                    <div class="book-spine" style="background:linear-gradient(180deg,#14532d,#166534); width:22px; height:90%;"></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#713f12,#a16207); width:19px; height:84%;"></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#7f1d1d,#b91c1c); width:24px; height:92%;"></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#1e3a8a,#1d4ed8); width:18px; height:86%;"></div>
                </div>
            </div>

            <!-- Rak Kanan -->
            <div class="bookshelf right">
                <div class="shelf-row">
                    <div class="book-spine" style="background:linear-gradient(180deg,#0c4a6e,#0e7490); width:22px; height:88%;"></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#831843,#be123c); width:20px; height:92%;"></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#713f12,#854d0e); width:25px; height:85%;"></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#581c87,#6b21a8); width:19px; height:90%;"></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#7f1d1d,#991b1b); width:23px; height:87%;"></div>
                </div>
                <div class="shelf-row">
                    <div class="book-spine" style="background:linear-gradient(180deg,#7c2d12,#9a3412); width:22px; height:90%;"></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#1e293b,#334155); width:18px; height:85%;"></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#1e3a8a,#2563eb); width:24px; height:92%;"></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#831843,#a21caf); width:20px; height:88%;"></div>
                </div>
                <div class="shelf-row">
                    <div class="book-spine" style="background:linear-gradient(180deg,#7f1d1d,#b91c1c); width:21px; height:88%;"></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#713f12,#a16207); width:24px; height:92%;"></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#4c1d95,#7e22ce); width:19px; height:85%;"></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#0c4a6e,#0369a1); width:22px; height:90%;"></div>
                </div>
                <div class="shelf-row">
                    <div class="book-spine" style="background:linear-gradient(180deg,#581c87,#6b21a8); width:20px; height:88%;"></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#831843,#be123c); width:23px; height:92%;"></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#14532d,#15803d); width:19px; height:86%;"></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#7c2d12,#c2410c); width:22px; height:90%;"></div>
                </div>
                <div class="shelf-row">
                    <div class="book-spine" style="background:linear-gradient(180deg,#1e40af,#1d4ed8); width:22px; height:90%;"></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#7f1d1d,#991b1b); width:20px; height:88%;"></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#713f12,#854d0e); width:24px; height:92%;"></div>
                    <div class="book-spine" style="background:linear-gradient(180deg,#0c4a6e,#0e7490); width:19px; height:85%;"></div>
                </div>
            </div>

            <!-- Debu -->
            <span class="dust" style="left: 25%; animation-duration: 12s; animation-delay: 0s;"></span>
            <span class="dust" style="left: 45%; animation-duration: 15s; animation-delay: 2s;"></span>
            <span class="dust" style="left: 60%; animation-duration: 10s; animation-delay: 4s;"></span>
            <span class="dust" style="left: 75%; animation-duration: 14s; animation-delay: 1s;"></span>
            <span class="dust" style="left: 35%; animation-duration: 11s; animation-delay: 6s;"></span>
            <span class="dust" style="left: 55%; animation-duration: 13s; animation-delay: 3s;"></span>
        </div>

        <!-- ===== FORM LOGIN/REGISTER ===== -->
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative z-10">

            <!-- Logo / Brand -->
            <div class="mb-6 text-center">
                <div class="inline-flex items-center gap-3 px-6 py-3 rounded-2xl"
                     style="background: rgba(255,255,255,0.1); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); border: 2px solid rgba(251, 191, 36, 0.3); box-shadow: 0 20px 40px rgba(0,0,0,0.4);">
                    <span class="text-5xl">📚</span>
                    <div class="text-left">
                        <h1 style="font-family: 'Playfair Display', serif; color: #fef3c7; text-shadow: 0 2px 8px rgba(0,0,0,0.8);" class="text-3xl font-bold">LabMI Library</h1>
                        <p style="color: rgba(253, 230, 138, 0.8);" class="text-xs italic">Perpustakaan Laboratorium MI</p>
                    </div>
                </div>
            </div>

            <!-- Card Form (FROSTED GLASS TRANSPARAN) -->
            <div class="w-full sm:max-w-md mt-2 px-8 py-8 overflow-hidden sm:rounded-2xl relative"
                 style="background: rgba(20, 10, 5, 0.35) !important; backdrop-filter: blur(20px) saturate(180%); -webkit-backdrop-filter: blur(20px) saturate(180%); border: 2px solid rgba(212, 175, 55, 0.5); box-shadow: 0 25px 60px rgba(0,0,0,0.5), 0 0 100px rgba(255, 200, 100, 0.2), inset 0 0 60px rgba(255, 220, 150, 0.08);">

                <!-- Ornamen sudut emas -->
                <div class="absolute top-3 left-3 w-8 h-8" style="border-top: 2px solid rgba(212, 175, 55, 0.6); border-left: 2px solid rgba(212, 175, 55, 0.6); border-radius: 8px 0 0 0;"></div>
                <div class="absolute top-3 right-3 w-8 h-8" style="border-top: 2px solid rgba(212, 175, 55, 0.6); border-right: 2px solid rgba(212, 175, 55, 0.6); border-radius: 0 8px 0 0;"></div>
                <div class="absolute bottom-3 left-3 w-8 h-8" style="border-bottom: 2px solid rgba(212, 175, 55, 0.6); border-left: 2px solid rgba(212, 175, 55, 0.6); border-radius: 0 0 0 8px;"></div>
                <div class="absolute bottom-3 right-3 w-8 h-8" style="border-bottom: 2px solid rgba(212, 175, 55, 0.6); border-right: 2px solid rgba(212, 175, 55, 0.6); border-radius: 0 0 8px 0;"></div>

                <!-- Garis emas atas -->
                <div class="ornament w-1/2 mx-auto mb-6"></div>

                <!-- STYLE UNTUK ISI FORM -->
                <style>
                    /* Label teks jadi terang */
                    .login-form-content label,
                    .login-form-content .block {
                        color: #fef3c7 !important;
                        text-shadow: 0 1px 3px rgba(0,0,0,0.9);
                        font-weight: 600;
                    }

                    /* Input field putih semi transparan */
                    .login-form-content input[type="text"],
                    .login-form-content input[type="email"],
                    .login-form-content input[type="password"] {
                        background: rgba(255, 250, 240, 0.95) !important;
                        border: 1px solid rgba(212, 175, 55, 0.6) !important;
                        color: #1a0f08 !important;
                        border-radius: 8px;
                    }
                    .login-form-content input[type="text"]:focus,
                    .login-form-content input[type="email"]:focus,
                    .login-form-content input[type="password"]:focus {
                        border-color: rgba(212, 175, 55, 1) !important;
                        box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.4) !important;
                        outline: none;
                    }

                    /* Teks Remember me */
                    .login-form-content .text-gray-600,
                    .login-form-content .text-gray-500,
                    .login-form-content label span {
                        color: #fef3c7 !important;
                        text-shadow: 0 1px 2px rgba(0,0,0,0.7);
                    }

                    /* Link */
                    .login-form-content a {
                        color: #fcd34d !important;
                        text-shadow: 0 1px 2px rgba(0,0,0,0.7);
                    }
                    .login-form-content a:hover {
                        color: #fbbf24 !important;
                        text-decoration: underline;
                    }

                    /* Error message */
                    .login-form-content .text-red-600,
                    .login-form-content .text-red-500,
                    .login-form-content .text-sm.text-red-600 {
                        color: #fca5a5 !important;
                        text-shadow: 0 1px 2px rgba(0,0,0,0.7);
                    }

                    /* Checkbox */
                    .login-form-content input[type="checkbox"] {
                        background: rgba(255, 250, 240, 0.9);
                        border: 1px solid rgba(212, 175, 55, 0.6);
                    }
                </style>

                <!-- ISI FORM LOGIN/REGISTER -->
                <div class="login-form-content">
                    {{ $slot }}
                </div>

                <!-- Garis emas bawah -->
                <div class="ornament w-1/2 mx-auto mt-6"></div>
            </div>

            <p class="mt-6 text-xs italic" style="color: rgba(253, 230, 138, 0.6);">© 2026 LabMI Library — Peminjaman Buku Digital</p>
        </div>
    </body>
</html>