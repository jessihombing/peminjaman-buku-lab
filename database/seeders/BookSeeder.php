<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            ['category_id' => 1, 'title' => 'Belajar Laravel dari Nol', 'author' => 'Andi Pratama', 'publisher' => 'Informatika', 'year' => 2023, 'stock' => 5, 'description' => 'Panduan lengkap Laravel untuk pemula hingga mahir.'],
            ['category_id' => 1, 'title' => 'PHP Modern', 'author' => 'Budi Setiawan', 'publisher' => 'Elex Media', 'year' => 2022, 'stock' => 3, 'description' => 'Menguasai PHP 8 dengan teknik modern.'],
            ['category_id' => 2, 'title' => 'Jaringan Komputer Dasar', 'author' => 'Cici Amelia', 'publisher' => 'Andi Publisher', 'year' => 2021, 'stock' => 4, 'description' => 'Konsep dasar jaringan komputer dan implementasinya.'],
            ['category_id' => 2, 'title' => 'Keamanan Siber', 'author' => 'Dedi Kurniawan', 'publisher' => 'Media Kita', 'year' => 2023, 'stock' => 2, 'description' => 'Dasar-dasar keamanan siber untuk praktisi IT.'],
            ['category_id' => 3, 'title' => 'Desain Grafis dengan Figma', 'author' => 'Eka Lestari', 'publisher' => 'Gramedia', 'year' => 2023, 'stock' => 6, 'description' => 'Membuat desain UI/UX menggunakan Figma.'],
            ['category_id' => 4, 'title' => 'SQL untuk Data Analyst', 'author' => 'Fajar Nugroho', 'publisher' => 'Informatika', 'year' => 2024, 'stock' => 5, 'description' => 'Query SQL untuk analisis data modern.'],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}