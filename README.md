# 📚 LabMI Library — Web Peminjaman Buku Laboratorium MI

Aplikasi web peminjaman buku laboratorium MI berbasis **Laravel** dengan UI bertema perpustakaan klasik.

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![SQLite](https://img.shields.io/badge/SQLite-07405E?style=for-the-badge&logo=sqlite&logoColor=white)

## ✨ Fitur Utama

### 👤 Untuk User
- Login & Register dengan autentikasi Breeze
- Lihat katalog buku dengan pencarian & filter kategori
- Ajukan peminjaman buku
- Lihat riwayat peminjaman
- Kembalikan buku

### 🎛️ Untuk Admin
- Dashboard statistik (Total Buku, User, Peminjaman, Pending)
- Kelola buku (CRUD + upload cover)
- Kelola kategori
- Approve/Reject peminjaman
- Lihat semua transaksi peminjaman

### 🎨 Tampilan
- Tema perpustakaan klasik dengan animasi rak buku
- Background hidup dengan debu beterbangan & buku terbang
- Form login transparan (frosted glass effect)
- Responsive di semua ukuran layar

## 🛠️ Teknologi

- **Backend:** Laravel 12, PHP 8.3
- **Frontend:** Tailwind CSS, Alpine.js
- **Database:** SQLite
- **Auth:** Laravel Breeze

## 🚀 Cara Install

### Persyaratan
- PHP >= 8.2
- Composer
- Node.js & NPM
- Git

### Langkah-langkah

```bash
# 1. Clone repository
git clone https://github.com/jessihombing/peminjaman-buku-lab.git
cd peminjaman-buku-lab

# 2. Install dependencies PHP
composer install

# 3. Copy file environment
copy .env.example .env

# 4. Generate application key
php artisan key:generate

# 5. Buat file database SQLite
type nul > database\database.sqlite

# 6. Jalankan migrasi & seeder
php artisan migrate --seed

# 7. Install dependencies Node
npm install
npm run build

# 8. Jalankan server
php artisan serve