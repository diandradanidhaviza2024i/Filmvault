<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Genre;
use App\Models\Film;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Membuat Akun Admin & Akun User Biasa
        User::create([
            'name' => 'Admin FilmVault',
            'email' => 'admin@filmvault.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Guest User',
            'email' => 'user@filmvault.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);

        // 2. Membuat Data Genre
        $genres = ['Action', 'Sci-Fi', 'Horror', 'Drama', 'Thriller', 'Animation', 'Adventure', 'Fantasy'];
        $genreModels = [];
        
        foreach ($genres as $genreName) {
            $genreModels[$genreName] = Genre::create([
                'name' => $genreName,
                'slug' => Str::slug($genreName),
            ]);
        }

        // 3. DAFTAR FILM MASSIVE
        // Menggunakan TMDB asli, dan Wikimedia untuk film yang diblokir

        // ==========================================
        // BATCH 1: FILM GLOBAL UTAMA 
        // ==========================================
        
        Film::create([
            'genre_id' => $genreModels['Sci-Fi']->id,
            'title' => 'Interstellar',
            'slug' => Str::slug('Interstellar'),
            'synopsis' => 'Sekelompok penjelajah melintasi lubang cacing di luar angkasa dalam upaya untuk memastikan kelangsungan hidup umat manusia.',
            'rating' => 8.6,
            'release_year' => 2014,
            'duration' => 169,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Matthew McConaughey, Anne Hathaway, Jessica Chastain',
            'director' => 'Christopher Nolan',
            'poster' => 'https://upload.wikimedia.org/wikipedia/en/b/bc/Interstellar_film_poster.jpg', 
            'trailer_url' => 'https://www.youtube.com/embed/zSWdZVtXT7E',
        ]);

        Film::create([
            'genre_id' => $genreModels['Sci-Fi']->id,
            'title' => 'The Matrix',
            'slug' => Str::slug('The Matrix'),
            'synopsis' => 'Seorang peretas komputer belajar dari pemberontak misterius tentang sifat sebenarnya dari realitasnya dan perannya dalam perang melawan pengendalinya.',
            'rating' => 8.7,
            'release_year' => 1999,
            'duration' => 136,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Keanu Reeves, Laurence Fishburne, Carrie-Anne Moss',
            'director' => 'Lana Wachowski, Lilly Wachowski',
            'poster' => 'https://image.tmdb.org/t/p/w500/f89U3ADr1oiB1s9GkdPOEpXUk5H.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/vKQi3bBA1y8',
        ]);

        Film::create([
            'genre_id' => $genreModels['Sci-Fi']->id,
            'title' => 'Inception',
            'slug' => Str::slug('Inception'),
            'synopsis' => 'Seorang pencuri yang mencuri rahasia perusahaan melalui penggunaan teknologi berbagi mimpi diberikan tugas sebaliknya: menanamkan ide ke dalam pikiran seorang CEO.',
            'rating' => 8.8,
            'release_year' => 2010,
            'duration' => 148,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Leonardo DiCaprio, Joseph Gordon-Levitt, Elliot Page',
            'director' => 'Christopher Nolan',
            'poster' => 'https://image.tmdb.org/t/p/w500/oYuLEt3zVCKq57qu2F8dT7NIa6f.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/YoHD9XEInc0',
        ]);

        Film::create([
            'genre_id' => $genreModels['Sci-Fi']->id,
            'title' => 'Blade Runner 2049',
            'slug' => Str::slug('Blade Runner 2049'),
            'synopsis' => 'Seorang blade runner muda menemukan rahasia yang telah lama terkubur yang membawanya untuk melacak mantan blade runner, Rick Deckard.',
            'rating' => 8.0,
            'release_year' => 2017,
            'duration' => 164,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Ryan Gosling, Harrison Ford, Ana de Armas',
            'director' => 'Denis Villeneuve',
            'poster' => 'https://image.tmdb.org/t/p/w500/gajva2L0rPYkEWjzgFlBXCAVBE5.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/gCcx85zbxz4',
        ]);

        Film::create([
            'genre_id' => $genreModels['Sci-Fi']->id,
            'title' => 'Dune',
            'slug' => Str::slug('Dune'),
            'synopsis' => 'Putra dari keluarga bangsawan yang dipercaya untuk melindungi aset paling berharga dan elemen paling vital di galaksi.',
            'rating' => 8.0,
            'release_year' => 2021,
            'duration' => 155,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Timothée Chalamet, Rebecca Ferguson, Zendaya',
            'director' => 'Denis Villeneuve',
            'poster' => 'https://image.tmdb.org/t/p/w500/d5NXSklXo0qyIYkgV94XAgMIckC.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/n9xhJrPXop4',
        ]);

        Film::create([
            'genre_id' => $genreModels['Action']->id,
            'title' => 'The Dark Knight',
            'slug' => Str::slug('The Dark Knight'),
            'synopsis' => 'Ketika ancaman yang dikenal sebagai Joker mendatangkan kekacauan pada rakyat Gotham, Batman harus menerima ujian fisik dan psikologis terbesar.',
            'rating' => 9.0,
            'release_year' => 2008,
            'duration' => 152,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Christian Bale, Heath Ledger, Aaron Eckhart',
            'director' => 'Christopher Nolan',
            'poster' => 'https://image.tmdb.org/t/p/w500/qJ2tW6WMUDux911r6m7haRef0WH.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/EXeTwQWrcwY',
        ]);

        Film::create([
            'genre_id' => $genreModels['Action']->id,
            'title' => 'Mad Max: Fury Road',
            'slug' => Str::slug('Mad Max Fury Road'),
            'synopsis' => 'Di gurun pasca-apokaliptik, seorang wanita memberontak melawan penguasa tirani demi mencari tanah airnya.',
            'rating' => 8.1,
            'release_year' => 2015,
            'duration' => 120,
            'country' => 'Australia',
            'language' => 'English',
            'cast' => 'Tom Hardy, Charlize Theron, Nicholas Hoult',
            'director' => 'George Miller',
            'poster' => 'https://upload.wikimedia.org/wikipedia/en/6/6e/Mad_Max_Fury_Road.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/hEJnMQG9ev8',
        ]);

        Film::create([
            'genre_id' => $genreModels['Action']->id,
            'title' => 'John Wick',
            'slug' => Str::slug('John Wick'),
            'synopsis' => 'Seorang mantan pembunuh bayaran keluar dari masa pensiunnya untuk melacak para gangster yang membunuh anjingnya.',
            'rating' => 7.4,
            'release_year' => 2014,
            'duration' => 101,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Keanu Reeves, Michael Nyqvist, Alfie Allen',
            'director' => 'Chad Stahelski',
            'poster' => 'https://image.tmdb.org/t/p/w500/fZPSd91yGE9fCcCe6OoQr6E3Bev.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/C0BMx-qxsP4',
        ]);

        Film::create([
            'genre_id' => $genreModels['Action']->id,
            'title' => 'Avengers: Endgame',
            'slug' => Str::slug('Avengers Endgame'),
            'synopsis' => 'Para Avengers yang tersisa berkumpul sekali lagi untuk membalikkan tindakan Thanos dan mengembalikan keseimbangan.',
            'rating' => 8.4,
            'release_year' => 2019,
            'duration' => 181,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Robert Downey Jr., Chris Evans, Mark Ruffalo',
            'director' => 'Anthony Russo, Joe Russo',
            'poster' => 'https://image.tmdb.org/t/p/w500/or06FN3Dka5tukK1e9sl16pB3iy.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/TcMBFSGVi1c',
        ]);

        Film::create([
            'genre_id' => $genreModels['Action']->id,
            'title' => 'Spider-Man: No Way Home',
            'slug' => Str::slug('Spider-Man No Way Home'),
            'synopsis' => 'Identitas Spider-Man kini terungkap, Peter meminta bantuan Doctor Strange. Namun, saat mantra salah, musuh dari dunia lain bermunculan.',
            'rating' => 8.2,
            'release_year' => 2021,
            'duration' => 148,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Tom Holland, Zendaya, Benedict Cumberbatch',
            'director' => 'Jon Watts',
            'poster' => 'https://upload.wikimedia.org/wikipedia/en/0/00/Spider-Man_No_Way_Home_poster.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/JfVOs4VSpmA',
        ]);

        Film::create([
            'genre_id' => $genreModels['Horror']->id,
            'title' => 'The Conjuring',
            'slug' => Str::slug('The Conjuring'),
            'synopsis' => 'Penyelidik paranormal Ed dan Lorraine Warren bekerja untuk membantu keluarga yang diteror oleh kehadiran gelap di rumah pertanian.',
            'rating' => 7.5,
            'release_year' => 2013,
            'duration' => 112,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Patrick Wilson, Vera Farmiga, Ron Livingston',
            'director' => 'James Wan',
            'poster' => 'https://image.tmdb.org/t/p/w500/wVYREutTvI2tmxr6ujrHT704wGF.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/k10ETZ41q5o',
        ]);

        Film::create([
            'genre_id' => $genreModels['Horror']->id,
            'title' => 'A Quiet Place',
            'slug' => Str::slug('A Quiet Place'),
            'synopsis' => 'Dalam dunia pasca-apokaliptik, sebuah keluarga dipaksa untuk hidup dalam keheningan sambil bersembunyi dari monster dengan pendengaran ultra-sensitif.',
            'rating' => 7.5,
            'release_year' => 2018,
            'duration' => 90,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Emily Blunt, John Krasinski, Millicent Simmonds',
            'director' => 'John Krasinski',
            'poster' => 'https://image.tmdb.org/t/p/w500/nAU74GmpUk7t5iklEp3bufwDq4n.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/WR7cc5t7tv8',
        ]);

        Film::create([
            'genre_id' => $genreModels['Horror']->id,
            'title' => 'Get Out',
            'slug' => Str::slug('Get Out'),
            'synopsis' => 'Seorang pemuda Afrika-Amerika mengunjungi orang tua pacarnya yang berkulit putih untuk akhir pekan, yang berujung pada teror psikologis.',
            'rating' => 7.7,
            'release_year' => 2017,
            'duration' => 104,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Daniel Kaluuya, Allison Williams, Bradley Whitford',
            'director' => 'Jordan Peele',
            'poster' => 'https://upload.wikimedia.org/wikipedia/en/a/a3/Get_Out_poster.png',
            'trailer_url' => 'https://www.youtube.com/embed/DzfpyUB60YY',
        ]);

        Film::create([
            'genre_id' => $genreModels['Horror']->id,
            'title' => 'Hereditary',
            'slug' => Str::slug('Hereditary'),
            'synopsis' => 'Keluarga Graham mulai mengungkap rahasia mengerikan tentang leluhur mereka setelah kematian nenek mereka yang tertutup.',
            'rating' => 7.3,
            'release_year' => 2018,
            'duration' => 127,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Toni Collette, Milly Shapiro, Gabriel Byrne',
            'director' => 'Ari Aster',
            'poster' => 'https://upload.wikimedia.org/wikipedia/en/d/d9/Hereditary_%28film%29.png',
            'trailer_url' => 'https://www.youtube.com/embed/V6wWKNij_1M',
        ]);

        Film::create([
            'genre_id' => $genreModels['Horror']->id,
            'title' => 'It',
            'slug' => Str::slug('It'),
            'synopsis' => 'Sekelompok anak-anak yang di-bully bersatu untuk menghancurkan monster pengubah bentuk yang memangsa anak-anak.',
            'rating' => 7.3,
            'release_year' => 2017,
            'duration' => 135,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Bill Skarsgård, Jaeden Martell, Finn Wolfhard',
            'director' => 'Andy Muschietti',
            'poster' => 'https://image.tmdb.org/t/p/w500/9E2y5Q7WlCVNEhP5GiVTjhEhx1o.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/xKJmEC5ieOk',
        ]);

        Film::create([
            'genre_id' => $genreModels['Drama']->id,
            'title' => 'The Shawshank Redemption',
            'slug' => Str::slug('The Shawshank Redemption'),
            'synopsis' => 'Dua pria yang dipenjara menjalin ikatan selama beberapa tahun, menemukan pelipur lara dan penebusan akhir.',
            'rating' => 9.3,
            'release_year' => 1994,
            'duration' => 142,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Tim Robbins, Morgan Freeman, Bob Gunton',
            'director' => 'Frank Darabont',
            'poster' => 'https://image.tmdb.org/t/p/w500/q6y0Go1tsGEsmtFryDOJo3dEmqu.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/6hB3S9bIaco',
        ]);

        Film::create([
            'genre_id' => $genreModels['Drama']->id,
            'title' => 'Forrest Gump',
            'slug' => Str::slug('Forrest Gump'),
            'synopsis' => 'Peristiwa sejarah terungkap melalui perspektif pria Alabama dengan IQ 75 yang luar biasa.',
            'rating' => 8.8,
            'release_year' => 1994,
            'duration' => 142,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Tom Hanks, Robin Wright, Gary Sinise',
            'director' => 'Robert Zemeckis',
            'poster' => 'https://image.tmdb.org/t/p/w500/arw2vcBveWOVZr6pxd9XTd1TdQa.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/bLvqoHBptjg',
        ]);

        Film::create([
            'genre_id' => $genreModels['Drama']->id,
            'title' => 'Fight Club',
            'slug' => Str::slug('Fight Club'),
            'synopsis' => 'Seorang pekerja kantoran dan pembuat sabun membentuk klub pertarungan bawah tanah yang berevolusi.',
            'rating' => 8.8,
            'release_year' => 1999,
            'duration' => 139,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Brad Pitt, Edward Norton, Meat Loaf',
            'director' => 'David Fincher',
            'poster' => 'https://image.tmdb.org/t/p/w500/pB8BM7pdSp6B6Ih7QZ4DrQ3PmJK.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/qtRKdVHc-cE',
        ]);

        Film::create([
            'genre_id' => $genreModels['Drama']->id,
            'title' => 'Parasite',
            'slug' => Str::slug('Parasite'),
            'synopsis' => 'Keserakahan dan diskriminasi kelas mengancam hubungan simbiosis antara keluarga kaya Park dan keluarga miskin Kim.',
            'rating' => 8.5,
            'release_year' => 2019,
            'duration' => 132,
            'country' => 'South Korea',
            'language' => 'Korean',
            'cast' => 'Song Kang-ho, Lee Sun-kyun, Cho Yeo-jeong',
            'director' => 'Bong Joon Ho',
            'poster' => 'https://image.tmdb.org/t/p/w500/7IiTTgloJzvGI1TAYymCfbfl3vT.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/5xH0HfJHsaY',
        ]);

        Film::create([
            'genre_id' => $genreModels['Drama']->id,
            'title' => 'Joker',
            'slug' => Str::slug('Joker'),
            'synopsis' => 'Di Kota Gotham, komedian Arthur Fleck perlahan turun ke kegilaan dan nihilisme.',
            'rating' => 8.4,
            'release_year' => 2019,
            'duration' => 122,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Joaquin Phoenix, Robert De Niro, Zazie Beetz',
            'director' => 'Todd Phillips',
            'poster' => 'https://upload.wikimedia.org/wikipedia/en/e/e1/Joker_%282019_film%29_poster.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/zAGVQLHvwOY',
        ]);

        Film::create([
            'genre_id' => $genreModels['Thriller']->id,
            'title' => 'Se7en',
            'slug' => Str::slug('Se7en'),
            'synopsis' => 'Dua detektif memburu pembunuh berantai yang menggunakan tujuh dosa mematikan sebagai motifnya.',
            'rating' => 8.6,
            'release_year' => 1995,
            'duration' => 127,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Morgan Freeman, Brad Pitt, Kevin Spacey',
            'director' => 'David Fincher',
            'poster' => 'https://upload.wikimedia.org/wikipedia/en/6/68/Seven_%28movie%29_poster.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/znmZoVkCjpI',
        ]);

        Film::create([
            'genre_id' => $genreModels['Thriller']->id,
            'title' => 'Shutter Island',
            'slug' => Str::slug('Shutter Island'),
            'synopsis' => 'Pada tahun 1954, seorang Marsekal A.S. menyelidiki hilangnya seorang pembunuh yang melarikan diri dari rumah sakit jiwa.',
            'rating' => 8.2,
            'release_year' => 2010,
            'duration' => 138,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Leonardo DiCaprio, Emily Mortimer, Mark Ruffalo',
            'director' => 'Martin Scorsese',
            'poster' => 'https://image.tmdb.org/t/p/w500/kve20tXwUZpu4GUX8l6X7Z4jmL6.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/5iaYLCiq5RM',
        ]);

        Film::create([
            'genre_id' => $genreModels['Thriller']->id,
            'title' => 'Gone Girl',
            'slug' => Str::slug('Gone Girl'),
            'synopsis' => 'Dengan hilangnya istrinya, seorang pria dicurigai membunuhnya.',
            'rating' => 8.1,
            'release_year' => 2014,
            'duration' => 149,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Ben Affleck, Rosamund Pike, Neil Patrick Harris',
            'director' => 'David Fincher',
            'poster' => 'https://upload.wikimedia.org/wikipedia/en/0/05/Gone_Girl_Poster.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/2-_-1nJf8Vg',
        ]);

        Film::create([
            'genre_id' => $genreModels['Thriller']->id,
            'title' => 'The Silence of the Lambs',
            'slug' => Str::slug('The Silence of the Lambs'),
            'synopsis' => 'Taruni FBI muda menerima bantuan dari pembunuh kanibal untuk menangkap pembunuh berantai lain.',
            'rating' => 8.6,
            'release_year' => 1991,
            'duration' => 118,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Jodie Foster, Anthony Hopkins, Lawrence A. Bonney',
            'director' => 'Jonathan Demme',
            'poster' => 'https://image.tmdb.org/t/p/w500/rplLJ2hPcOQmkFhTqUte0MkEaO2.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/W6Mm8Sbe__o',
        ]);

        Film::create([
            'genre_id' => $genreModels['Thriller']->id,
            'title' => 'Prisoners',
            'slug' => Str::slug('Prisoners'),
            'synopsis' => 'Ketika putri Keller Dover hilang, ia mengambil tindakan sendiri saat polisi mengejar banyak petunjuk.',
            'rating' => 8.1,
            'release_year' => 2013,
            'duration' => 153,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Hugh Jackman, Jake Gyllenhaal, Viola Davis',
            'director' => 'Denis Villeneuve',
            'poster' => 'https://upload.wikimedia.org/wikipedia/en/6/63/Prisoners2013Poster.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/bpXfcTF6iVk',
        ]);

        Film::create([
            'genre_id' => $genreModels['Animation']->id,
            'title' => 'Spirited Away',
            'slug' => Str::slug('Spirited Away'),
            'synopsis' => 'Seorang gadis cemberut berusia 10 tahun mengembara ke dunia yang dikuasai dewa, penyihir, dan roh.',
            'rating' => 8.6,
            'release_year' => 2001,
            'duration' => 125,
            'country' => 'Japan',
            'language' => 'Japanese',
            'cast' => 'Rumi Hiiragi, Miyu Irino, Mari Natsuki',
            'director' => 'Hayao Miyazaki',
            'poster' => 'https://upload.wikimedia.org/wikipedia/en/d/db/Spirited_Away_Japanese_poster.png',
            'trailer_url' => 'https://www.youtube.com/embed/ByXuk9QqQkk',
        ]);

        Film::create([
            'genre_id' => $genreModels['Animation']->id,
            'title' => 'Spider-Man: Into the Spider-Verse',
            'slug' => Str::slug('Spider-Man Into the Spider-Verse'),
            'synopsis' => 'Remaja Miles Morales menjadi Spider-Man dari dunianya, menyilang jalannya dengan rekan dari dimensi lain.',
            'rating' => 8.4,
            'release_year' => 2018,
            'duration' => 117,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Shameik Moore, Jake Johnson, Hailee Steinfeld',
            'director' => 'Bob Persichetti, Peter Ramsey',
            'poster' => 'https://image.tmdb.org/t/p/w500/iiZZdoQBEYBv6id8su7ImL0oCbD.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/g4Hbz2jLxvQ',
        ]);

        Film::create([
            'genre_id' => $genreModels['Animation']->id,
            'title' => 'Toy Story',
            'slug' => Str::slug('Toy Story'),
            'synopsis' => 'Sebuah boneka koboi merasa terancam cemburu saat mainan astronot yang mengkilap menjadi barang favorit pemiliknya.',
            'rating' => 8.3,
            'release_year' => 1995,
            'duration' => 81,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Tom Hanks, Tim Allen, Don Rickles',
            'director' => 'John Lasseter',
            'poster' => 'https://image.tmdb.org/t/p/w500/uXDfjJbdP4ijW5hWSBrPrlKpxab.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/v-PjgYDrg70',
        ]);

        Film::create([
            'genre_id' => $genreModels['Adventure']->id,
            'title' => 'Jurassic Park',
            'slug' => Str::slug('Jurassic Park'),
            'synopsis' => 'Taman bermain pragmatis yang berisi dinosaurus-dinosaurus kloning runtuh, ketika hewan ini membebaskan diri.',
            'rating' => 8.2,
            'release_year' => 1993,
            'duration' => 127,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Sam Neill, Laura Dern, Jeff Goldblum',
            'director' => 'Steven Spielberg',
            'poster' => 'https://image.tmdb.org/t/p/w500/oU7Oq2kFAAlGqbU4VoAE36g4hoI.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/lc0UehYemQA',
        ]);

        Film::create([
            'genre_id' => $genreModels['Fantasy']->id,
            'title' => 'The Lord of the Rings: The Fellowship of the Ring',
            'slug' => Str::slug('The Lord of the Rings The Fellowship of the Ring'),
            'synopsis' => 'Hobbit Frodo yang pemalu mewarisi sebuah Cincin. Bersama delapan rekannya ia harus menempuh perjalanan untuk menghancurkannya.',
            'rating' => 8.8,
            'release_year' => 2001,
            'duration' => 178,
            'country' => 'New Zealand',
            'language' => 'English',
            'cast' => 'Elijah Wood, Ian McKellen, Orlando Bloom',
            'director' => 'Peter Jackson',
            'poster' => 'https://upload.wikimedia.org/wikipedia/en/8/8a/The_Lord_of_the_Rings_The_Fellowship_of_the_Ring_%282001%29.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/V75dMMIW2B4',
        ]);

        // ==========================================
        // BATCH 2: TAMBAHAN GLOBAL FILMS
        // ==========================================
        
        Film::create([
            'genre_id' => $genreModels['Sci-Fi']->id,
            'title' => 'Arrival',
            'slug' => Str::slug('Arrival'),
            'synopsis' => 'Seorang ahli bahasa direkrut militer untuk berkomunikasi dengan makhluk luar angkasa yang tiba di Bumi.',
            'rating' => 7.9,
            'release_year' => 2016,
            'duration' => 116,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Amy Adams, Jeremy Renner, Forest Whitaker',
            'director' => 'Denis Villeneuve',
            'poster' => 'https://image.tmdb.org/t/p/w500/x2FJsf1ElAgr63Y3PNPtJrcmpoe.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/tFMo3UJ4B4g',
        ]);

        Film::create([
            'genre_id' => $genreModels['Sci-Fi']->id,
            'title' => 'Edge of Tomorrow',
            'slug' => Str::slug('Edge of Tomorrow'),
            'synopsis' => 'Seorang tentara terjebak dalam lingkaran waktu saat melawan invasi alien.',
            'rating' => 7.9,
            'release_year' => 2014,
            'duration' => 113,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Tom Cruise, Emily Blunt, Bill Paxton',
            'director' => 'Doug Liman',
            'poster' => 'https://image.tmdb.org/t/p/w500/uUHvlkLavotfGsNtosDy8ShsIYF.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/vw61gCe2oqI',
        ]);

        Film::create([
            'genre_id' => $genreModels['Action']->id,
            'title' => 'Gladiator',
            'slug' => Str::slug('Gladiator'),
            'synopsis' => 'Seorang jenderal Romawi dikhianati dan menjadi gladiator demi membalas dendam.',
            'rating' => 8.5,
            'release_year' => 2000,
            'duration' => 155,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Russell Crowe, Joaquin Phoenix, Connie Nielsen',
            'director' => 'Ridley Scott',
            'poster' => 'https://image.tmdb.org/t/p/w500/ty8TGRuvJLPUmAR1H1nRIsgwvim.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/owK1qxDselE',
        ]);

        Film::create([
            'genre_id' => $genreModels['Action']->id,
            'title' => 'Top Gun: Maverick',
            'slug' => Str::slug('Top Gun Maverick'),
            'synopsis' => 'Pete Maverick Mitchell kembali melatih generasi baru pilot tempur elit.',
            'rating' => 8.2,
            'release_year' => 2022,
            'duration' => 130,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Tom Cruise, Miles Teller, Jennifer Connelly',
            'director' => 'Joseph Kosinski',
            'poster' => 'https://image.tmdb.org/t/p/w500/62HCnUTziyWcpDaBO2i1DX17ljH.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/giXco2jaZ_4',
        ]);

        Film::create([
            'genre_id' => $genreModels['Horror']->id,
            'title' => 'The Nun',
            'slug' => Str::slug('The Nun'),
            'synopsis' => 'Seorang pastor dan novis menyelidiki bunuh diri misterius di biara terpencil.',
            'rating' => 5.3,
            'release_year' => 2018,
            'duration' => 96,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Taissa Farmiga, Demián Bichir, Jonas Bloquet',
            'director' => 'Corin Hardy',
            'poster' => 'https://image.tmdb.org/t/p/w500/sFC1ElvoKGdHJIWRpNB3xWJ9lJA.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/pzD9zGcUNrw',
        ]);

        Film::create([
            'genre_id' => $genreModels['Horror']->id,
            'title' => 'Insidious',
            'slug' => Str::slug('Insidious'),
            'synopsis' => 'Keluarga mencoba menyelamatkan putra mereka dari dunia roh jahat.',
            'rating' => 6.8,
            'release_year' => 2010,
            'duration' => 103,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Patrick Wilson, Rose Byrne, Ty Simpkins',
            'director' => 'James Wan',
            'poster' => 'https://upload.wikimedia.org/wikipedia/en/2/2d/Insidious_poster.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/zuZnRUcoWos',
        ]);

        Film::create([
            'genre_id' => $genreModels['Drama']->id,
            'title' => 'The Green Mile',
            'slug' => Str::slug('The Green Mile'),
            'synopsis' => 'Sipir penjara menemukan bahwa narapidana misterius memiliki kekuatan supranatural.',
            'rating' => 8.6,
            'release_year' => 1999,
            'duration' => 189,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Tom Hanks, Michael Clarke Duncan, David Morse',
            'director' => 'Frank Darabont',
            'poster' => 'https://image.tmdb.org/t/p/w500/velWPhVMQeQKcxggNEU8YmIo52R.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/Ki4haFrqSrw',
        ]);

        Film::create([
            'genre_id' => $genreModels['Drama']->id,
            'title' => 'Whiplash',
            'slug' => Str::slug('Whiplash'),
            'synopsis' => 'Seorang drummer muda menghadapi instruktur musik yang sangat keras.',
            'rating' => 8.5,
            'release_year' => 2014,
            'duration' => 106,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Miles Teller, J.K. Simmons, Melissa Benoist',
            'director' => 'Damien Chazelle',
            'poster' => 'https://image.tmdb.org/t/p/w500/7fn624j5lj3xTme2SgiLCeuedmO.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/7d_jQycdQGo',
        ]);

        Film::create([
            'genre_id' => $genreModels['Thriller']->id,
            'title' => 'Zodiac',
            'slug' => Str::slug('Zodiac'),
            'synopsis' => 'Kartunis surat kabar menjadi terobsesi mengungkap identitas pembunuh Zodiac.',
            'rating' => 7.7,
            'release_year' => 2007,
            'duration' => 157,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Jake Gyllenhaal, Robert Downey Jr., Mark Ruffalo',
            'director' => 'David Fincher',
            'poster' => 'https://image.tmdb.org/t/p/w500/6YmeO4pB7XTh8P8F960O1uA14JO.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/yNncHPl1UXg',
        ]);

        Film::create([
            'genre_id' => $genreModels['Thriller']->id,
            'title' => 'Nightcrawler',
            'slug' => Str::slug('Nightcrawler'),
            'synopsis' => 'Seorang pria masuk ke dunia jurnalisme kriminal malam di Los Angeles.',
            'rating' => 7.8,
            'release_year' => 2014,
            'duration' => 117,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Jake Gyllenhaal, Rene Russo, Riz Ahmed',
            'director' => 'Dan Gilroy',
            'poster' => 'https://image.tmdb.org/t/p/w500/j9HrX8f7GbZQm1BrBiR40uFQZSb.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/u1uP_8VJkDQ',
        ]);

        Film::create([
            'genre_id' => $genreModels['Animation']->id,
            'title' => 'Coco',
            'slug' => Str::slug('Coco'),
            'synopsis' => 'Anak laki-laki bercita-cita menjadi musisi dan memasuki dunia arwah.',
            'rating' => 8.4,
            'release_year' => 2017,
            'duration' => 105,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Anthony Gonzalez, Gael García Bernal, Benjamin Bratt',
            'director' => 'Lee Unkrich',
            'poster' => 'https://image.tmdb.org/t/p/w500/gGEsBPAijhVUFoiNpgZXqRVWJt2.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/Rvr68u6k5sI',
        ]);

        Film::create([
            'genre_id' => $genreModels['Animation']->id,
            'title' => 'Finding Nemo',
            'slug' => Str::slug('Finding Nemo'),
            'synopsis' => 'Ikan badut mencari putranya yang hilang di lautan luas.',
            'rating' => 8.2,
            'release_year' => 2003,
            'duration' => 100,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Albert Brooks, Ellen DeGeneres, Alexander Gould',
            'director' => 'Andrew Stanton',
            'poster' => 'https://image.tmdb.org/t/p/w500/eHuGQ10FUzK1mdOY69wF5pGgEf5.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/wZdpNglLbt8',
        ]);

        Film::create([
            'genre_id' => $genreModels['Adventure']->id,
            'title' => 'Pirates of the Caribbean: The Curse of the Black Pearl',
            'slug' => Str::slug('Pirates of the Caribbean The Curse of the Black Pearl'),
            'synopsis' => 'Kapten Jack Sparrow mencari kapal Black Pearl yang dicuri.',
            'rating' => 8.1,
            'release_year' => 2003,
            'duration' => 143,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Johnny Depp, Orlando Bloom, Keira Knightley',
            'director' => 'Gore Verbinski',
            'poster' => 'https://image.tmdb.org/t/p/w500/z8onk7LV9Mmw6zKz4hT6pzzvmvl.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/naQr0uTrH_s',
        ]);

        Film::create([
            'genre_id' => $genreModels['Fantasy']->id,
            'title' => 'Harry Potter and the Sorcerer\'s Stone',
            'slug' => Str::slug('Harry Potter and the Sorcerers Stone'),
            'synopsis' => 'Harry Potter menemukan bahwa dirinya adalah seorang penyihir.',
            'rating' => 7.6,
            'release_year' => 2001,
            'duration' => 152,
            'country' => 'UK',
            'language' => 'English',
            'cast' => 'Daniel Radcliffe, Emma Watson, Rupert Grint',
            'director' => 'Chris Columbus',
            'poster' => 'https://image.tmdb.org/t/p/w500/wuMc08IPKEatf9rnMNXvIDxqP4W.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/VyHV0BRtdxo',
        ]);

        Film::create([
            'genre_id' => $genreModels['Fantasy']->id,
            'title' => 'Doctor Strange',
            'slug' => Str::slug('Doctor Strange'),
            'synopsis' => 'Seorang ahli bedah mempelajari seni mistis setelah kecelakaan tragis.',
            'rating' => 7.5,
            'release_year' => 2016,
            'duration' => 115,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Benedict Cumberbatch, Chiwetel Ejiofor, Rachel McAdams',
            'director' => 'Scott Derrickson',
            'poster' => 'https://image.tmdb.org/t/p/w500/uGBVj3bEbCoZbDjjl9wTxcygko1.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/HSzx-zryEgM',
        ]);

        Film::create([
            'genre_id' => $genreModels['Sci-Fi']->id,
            'title' => 'Gravity',
            'slug' => Str::slug('Gravity'),
            'synopsis' => 'Dua astronot berusaha bertahan hidup setelah kecelakaan di luar angkasa.',
            'rating' => 7.7,
            'release_year' => 2013,
            'duration' => 91,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Sandra Bullock, George Clooney, Ed Harris',
            'director' => 'Alfonso Cuarón',
            'poster' => 'https://image.tmdb.org/t/p/w500/kZ2nZw8D681aphje8NJi8EfbL1U.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/OiTiKOy59o4',
        ]);

        Film::create([
            'genre_id' => $genreModels['Action']->id,
            'title' => 'Logan',
            'slug' => Str::slug('Logan'),
            'synopsis' => 'Wolverine tua melindungi mutan muda misterius dari ancaman berbahaya.',
            'rating' => 8.1,
            'release_year' => 2017,
            'duration' => 137,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Hugh Jackman, Patrick Stewart, Dafne Keen',
            'director' => 'James Mangold',
            'poster' => 'https://image.tmdb.org/t/p/w500/fnbjcRDYn6YviCcePDnGdyAkYsB.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/Div0iP65aZo',
        ]);

        Film::create([
            'genre_id' => $genreModels['Drama']->id,
            'title' => 'La La Land',
            'slug' => Str::slug('La La Land'),
            'synopsis' => 'Musisi jazz dan aktris muda jatuh cinta sambil mengejar mimpi mereka.',
            'rating' => 8.0,
            'release_year' => 2016,
            'duration' => 128,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Ryan Gosling, Emma Stone, John Legend',
            'director' => 'Damien Chazelle',
            'poster' => 'https://image.tmdb.org/t/p/w500/uDO8zWDhfWwoFdKS4fzkUJt0Rf0.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/0pdqf4P9MB8',
        ]);

        Film::create([
            'genre_id' => $genreModels['Thriller']->id,
            'title' => 'Black Swan',
            'slug' => Str::slug('Black Swan'),
            'synopsis' => 'Penari balet mengalami tekanan mental saat mempersiapkan pertunjukan besar.',
            'rating' => 8.0,
            'release_year' => 2010,
            'duration' => 108,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Natalie Portman, Mila Kunis, Vincent Cassel',
            'director' => 'Darren Aronofsky',
            'poster' => 'https://image.tmdb.org/t/p/w500/viWheBd44bouiLCHgNMvahLThqx.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/5jaI1XOB-bs',
        ]);

        Film::create([
            'genre_id' => $genreModels['Animation']->id,
            'title' => 'Up',
            'slug' => Str::slug('Up'),
            'synopsis' => 'Seorang kakek menerbangkan rumahnya dengan balon menuju Amerika Selatan.',
            'rating' => 8.3,
            'release_year' => 2009,
            'duration' => 96,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Ed Asner, Christopher Plummer, Jordan Nagai',
            'director' => 'Pete Docter',
            'poster' => 'https://image.tmdb.org/t/p/w500/vpbaStTMt8qqXaEgnOR2EE4DNJk.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/HWEW_qTLSEE',
        ]);

        Film::create([
            'genre_id' => $genreModels['Adventure']->id,
            'title' => 'Jumanji',
            'slug' => Str::slug('Jumanji'),
            'synopsis' => 'Permainan papan ajaib membawa petualangan liar ke dunia nyata.',
            'rating' => 7.1,
            'release_year' => 1995,
            'duration' => 104,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Robin Williams, Kirsten Dunst, Bonnie Hunt',
            'director' => 'Joe Johnston',
            'poster' => 'https://image.tmdb.org/t/p/w500/vgpXmVaVyUL7GGiDeiK1mKEKzcX.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/eTjDsENDZ6s',
        ]);

        Film::create([
            'genre_id' => $genreModels['Fantasy']->id,
            'title' => 'Pan\'s Labyrinth',
            'slug' => Str::slug('Pans Labyrinth'),
            'synopsis' => 'Seorang gadis muda menemukan dunia fantasi gelap di Spanyol pasca perang.',
            'rating' => 8.2,
            'release_year' => 2006,
            'duration' => 118,
            'country' => 'Spain',
            'language' => 'Spanish',
            'cast' => 'Ivana Baquero, Sergi López, Maribel Verdú',
            'director' => 'Guillermo del Toro',
            'poster' => 'https://upload.wikimedia.org/wikipedia/en/6/67/Pan%27s_Labyrinth.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/jVZRnnVSQ8k',
        ]);

        Film::create([
            'genre_id' => $genreModels['Sci-Fi']->id,
            'title' => 'Ex Machina',
            'slug' => Str::slug('Ex Machina'),
            'synopsis' => 'Programmer muda menguji kecerdasan buatan humanoid canggih.',
            'rating' => 7.7,
            'release_year' => 2014,
            'duration' => 108,
            'country' => 'UK',
            'language' => 'English',
            'cast' => 'Alicia Vikander, Domhnall Gleeson, Oscar Isaac',
            'director' => 'Alex Garland',
            'poster' => 'https://image.tmdb.org/t/p/w500/dmJW8IAKHKxFNiUnoDR7JfsK7Rp.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/EoQuVnKhxaM',
        ]);

        Film::create([
            'genre_id' => $genreModels['Action']->id,
            'title' => 'Casino Royale',
            'slug' => Str::slug('Casino Royale'),
            'synopsis' => 'James Bond menghadapi teroris finansial dalam misi pertamanya sebagai agen 007.',
            'rating' => 8.0,
            'release_year' => 2006,
            'duration' => 144,
            'country' => 'UK',
            'language' => 'English',
            'cast' => 'Daniel Craig, Eva Green, Mads Mikkelsen',
            'director' => 'Martin Campbell',
            'poster' => 'https://image.tmdb.org/t/p/w500/lMrxYKKhd4lqRzwUHAy5gcx9PSO.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/36mnx8dBbGE',
        ]);

        Film::create([
            'genre_id' => $genreModels['Horror']->id,
            'title' => 'Smile',
            'slug' => Str::slug('Smile'),
            'synopsis' => 'Psikiater mengalami kejadian menyeramkan setelah menyaksikan tragedi aneh.',
            'rating' => 6.5,
            'release_year' => 2022,
            'duration' => 115,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Sosie Bacon, Jessie T. Usher, Kyle Gallner',
            'director' => 'Parker Finn',
            'poster' => 'https://image.tmdb.org/t/p/w500/aPqcQwu4VGEewPhagWNncDbJ9Xp.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/BcDK7lkzzsU',
        ]);

        Film::create([
            'genre_id' => $genreModels['Drama']->id,
            'title' => 'The Pursuit of Happyness',
            'slug' => Str::slug('The Pursuit of Happyness'),
            'synopsis' => 'Ayah tunggal berjuang keluar dari kemiskinan demi masa depan anaknya.',
            'rating' => 8.0,
            'release_year' => 2006,
            'duration' => 117,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Will Smith, Jaden Smith, Thandiwe Newton',
            'director' => 'Gabriele Muccino',
            'poster' => 'https://image.tmdb.org/t/p/w500/oyG9TL7FcRP4EZ9Vid6uKzwdndz.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/89Kq8SDyvfg',
        ]);

        Film::create([
            'genre_id' => $genreModels['Thriller']->id,
            'title' => 'Source Code',
            'slug' => Str::slug('Source Code'),
            'synopsis' => 'Tentara masuk ke simulasi untuk mencegah serangan bom kereta.',
            'rating' => 7.5,
            'release_year' => 2011,
            'duration' => 93,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Jake Gyllenhaal, Michelle Monaghan, Vera Farmiga',
            'director' => 'Duncan Jones',
            'poster' => 'https://upload.wikimedia.org/wikipedia/en/e/e5/Source_Code_Poster.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/mnJegNyAb1w',
        ]);

        Film::create([
            'genre_id' => $genreModels['Animation']->id,
            'title' => 'How to Train Your Dragon',
            'slug' => Str::slug('How to Train Your Dragon'),
            'synopsis' => 'Remaja Viking berteman dengan naga yang seharusnya diburu.',
            'rating' => 8.1,
            'release_year' => 2010,
            'duration' => 98,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Jay Baruchel, Gerard Butler, America Ferrera',
            'director' => 'Chris Sanders, Dean DeBlois',
            'poster' => 'https://image.tmdb.org/t/p/w500/ygGmAO60t8GyqUo9xYeYxSZAR3b.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/oKiYuIsPxYk',
        ]);

        Film::create([
            'genre_id' => $genreModels['Adventure']->id,
            'title' => 'The Revenant',
            'slug' => Str::slug('The Revenant'),
            'synopsis' => 'Penjelajah bertahan hidup di alam liar setelah dikhianati rekannya.',
            'rating' => 8.0,
            'release_year' => 2015,
            'duration' => 156,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Leonardo DiCaprio, Tom Hardy, Domhnall Gleeson',
            'director' => 'Alejandro G. Iñárritu',
            'poster' => 'https://upload.wikimedia.org/wikipedia/en/b/b6/The_Revenant_2015_film_poster.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/LoebZZ8K5N0',
        ]);

        Film::create([
            'genre_id' => $genreModels['Fantasy']->id,
            'title' => 'Fantastic Beasts and Where to Find Them',
            'slug' => Str::slug('Fantastic Beasts and Where to Find Them'),
            'synopsis' => 'Penyihir eksentrik membawa makhluk ajaib ke New York.',
            'rating' => 7.2,
            'release_year' => 2016,
            'duration' => 133,
            'country' => 'UK',
            'language' => 'English',
            'cast' => 'Eddie Redmayne, Katherine Waterston, Dan Fogler',
            'director' => 'David Yates',
            'poster' => 'https://image.tmdb.org/t/p/w500/fLsaFKExQt05yqjoAvKsmOMYvJR.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/ViuDsy7yb8M',
        ]);

        Film::create([
            'genre_id' => $genreModels['Sci-Fi']->id,
            'title' => 'Ready Player One',
            'slug' => Str::slug('Ready Player One'),
            'synopsis' => 'Remaja ikut perlombaan virtual demi mewarisi dunia OASIS.',
            'rating' => 7.4,
            'release_year' => 2018,
            'duration' => 140,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Tye Sheridan, Olivia Cooke, Ben Mendelsohn',
            'director' => 'Steven Spielberg',
            'poster' => 'https://image.tmdb.org/t/p/w500/pU1ULUq8D3iRxl1fdX2lZIzdHuI.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/cSp1dM2Vj48',
        ]);

        Film::create([
            'genre_id' => $genreModels['Drama']->id,
            'title' => 'The Social Network',
            'slug' => Str::slug('The Social Network'),
            'synopsis' => 'Kisah berdirinya Facebook dan konflik hukum di baliknya.',
            'rating' => 7.8,
            'release_year' => 2010,
            'duration' => 120,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Jesse Eisenberg, Andrew Garfield, Justin Timberlake',
            'director' => 'David Fincher',
            'poster' => 'https://image.tmdb.org/t/p/w500/n0ybibhJtQ5icDqTp8eRytcIHJx.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/lB95KLmpLR4',
        ]);

        // ==========================================
        // BATCH 3: INDONESIAN BEST FILMS (FIXED TRAILERS)
        // ==========================================
        
        Film::create([
            'genre_id' => $genreModels['Action']->id,
            'title' => 'The Raid: Redemption',
            'slug' => Str::slug('The Raid Redemption'),
            'synopsis' => 'Pasukan elit kepolisian terperangkap di sebuah gedung apartemen kumuh yang dikuasai oleh gembong narkoba kejam.',
            'rating' => 7.6,
            'release_year' => 2012,
            'duration' => 101,
            'country' => 'Indonesia',
            'language' => 'Indonesian',
            'cast' => 'Iko Uwais, Joe Taslim, Yayan Ruhian',
            'director' => 'Gareth Evans',
            'poster' => 'https://image.tmdb.org/t/p/w500/xJUe2T9FqaNjsYoeAxtfZw2S80u.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/mkwz_O1P0X0',
        ]);

        Film::create([
            'genre_id' => $genreModels['Action']->id,
            'title' => 'Gundala',
            'slug' => Str::slug('Gundala'),
            'synopsis' => 'Sancaka, seorang yatim piatu jalanan yang keras, bangkit menjadi pahlawan berkekuatan petir bagi rakyat tertindas.',
            'rating' => 6.1,
            'release_year' => 2019,
            'duration' => 123,
            'country' => 'Indonesia',
            'language' => 'Indonesian',
            'cast' => 'Abimana Aryasatya, Tara Basro, Bront Palarae',
            'director' => 'Joko Anwar',
            'poster' => 'https://image.tmdb.org/t/p/w500/wZCo5qUz3IdIhs6466B9PpFglXU.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/8xXqY7rMB3A',
        ]);

        Film::create([
            'genre_id' => $genreModels['Action']->id,
            'title' => 'Wiro Sableng 212',
            'slug' => Str::slug('Wiro Sableng 212'),
            'synopsis' => 'Wiro Sableng diutus gurunya, Sinto Gendeng, untuk menangkap murid pengkhianat bernama Mahesa Birawa.',
            'rating' => 6.8,
            'release_year' => 2018,
            'duration' => 123,
            'country' => 'Indonesia',
            'language' => 'Indonesian',
            'cast' => 'Vino G. Bastian, Sherina Munaf, Marsha Timothy',
            'director' => 'Angga Dwimas Sasongko',
            'poster' => 'https://image.tmdb.org/t/p/w500/kt4Clr3qq4NIXU6ijhDaoXOQqOn.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/WqjH2k5zXkM',
        ]);

        Film::create([
            'genre_id' => $genreModels['Action']->id,
            'title' => 'Mencuri Raden Saleh',
            'slug' => Str::slug('Mencuri Raden Saleh'),
            'synopsis' => 'Sekelompok mahasiswa amatir merencanakan pencurian lukisan legendaris Raden Saleh di Istana Negara.',
            'rating' => 8.2,
            'release_year' => 2022,
            'duration' => 154,
            'country' => 'Indonesia',
            'language' => 'Indonesian',
            'cast' => 'Iqbaal Ramadhan, Angga Yunanda, Rachel Amanda',
            'director' => 'Angga Dwimas Sasongko',
            'poster' => 'https://image.tmdb.org/t/p/w500/1fdqRcgEYNkXCnnKAzz2JtFnUv7.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/DNj8oA2lQ9M',
        ]);

        Film::create([
            'genre_id' => $genreModels['Horror']->id,
            'title' => 'Pengabdi Setan',
            'slug' => Str::slug('Pengabdi Setan'),
            'synopsis' => 'Sepeninggal ibunya, sebuah keluarga mengalami rangkaian kejadian mistis dan menyadari ibu mereka kembali menjemput.',
            'rating' => 7.5,
            'release_year' => 2017,
            'duration' => 106,
            'country' => 'Indonesia',
            'language' => 'Indonesian',
            'cast' => 'Tara Basro, Bront Palarae, Ayu Laksmi',
            'director' => 'Joko Anwar',
            'poster' => 'https://image.tmdb.org/t/p/w500/AlE91MwxmMYD27y2OemZMr38tAk.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/0hShtjacEkw',
        ]);

        Film::create([
            'genre_id' => $genreModels['Horror']->id,
            'title' => 'Perempuan Tanah Jahanam',
            'slug' => Str::slug('Perempuan Tanah Jahanam'),
            'synopsis' => 'Maya mengunjungi desa asalnya mencari warisan, tanpa tahu desa itu mengutuk kehadirannya demi mengakhiri petaka.',
            'rating' => 6.6,
            'release_year' => 2019,
            'duration' => 106,
            'country' => 'Indonesia',
            'language' => 'Indonesian',
            'cast' => 'Tara Basro, Marissa Anita, Ario Bayu',
            'director' => 'Joko Anwar',
            'poster' => 'https://image.tmdb.org/t/p/w500/tAYHRuKxNa4arD32YTmDT1j46Mi.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/wR2qf-2Y26o',
        ]);

        Film::create([
            'genre_id' => $genreModels['Horror']->id,
            'title' => 'KKN di Desa Penari',
            'slug' => Str::slug('KKN di Desa Penari'),
            'synopsis' => 'Mahasiswa KKN di desa terpencil melanggar pantangan adat, mengundang teror mistis penari mistis.',
            'rating' => 5.8,
            'release_year' => 2022,
            'duration' => 130,
            'country' => 'Indonesia',
            'language' => 'Indonesian',
            'cast' => 'Tissa Biani, Adinda Thomas, Achmad Megantara',
            'director' => 'Awi Suryadi',
            'poster' => 'https://image.tmdb.org/t/p/w500/63InZxeGgfNQCoWkImR14fB99AY.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/5bKzQW3A6U0',
        ]);

        Film::create([
            'genre_id' => $genreModels['Horror']->id,
            'title' => 'Ratu Ilmu Hitam',
            'slug' => Str::slug('Ratu Ilmu Hitam'),
            'synopsis' => 'Tiga keluarga bernostalgia mengunjungi panti asuhan masa kecil mereka, yang perlahan dipenuhi siksaan santet mematikan.',
            'rating' => 6.5,
            'release_year' => 2019,
            'duration' => 99,
            'country' => 'Indonesia',
            'language' => 'Indonesian',
            'cast' => 'Ario Bayu, Hannah Al Rashid, Adhisty Zara',
            'director' => 'Kimo Stamboel',
            'poster' => 'https://image.tmdb.org/t/p/w500/kOyoznU5d6BKMrpUQbXjsCG3dMb.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/2oZJ_9N2gEE',
        ]);

        Film::create([
            'genre_id' => $genreModels['Horror']->id,
            'title' => 'Sewu Dino',
            'slug' => Str::slug('Sewu Dino'),
            'synopsis' => 'Sri diterima bekerja memandikan Dela Atmojo, korban santet 1000 hari yang terikat di gubuk misterius tengah hutan.',
            'rating' => 6.2,
            'release_year' => 2023,
            'duration' => 121,
            'country' => 'Indonesia',
            'language' => 'Indonesian',
            'cast' => 'Mikha Tambayong, Rio Dewanto, Givina Lukita',
            'director' => 'Kimo Stamboel',
            'poster' => 'https://image.tmdb.org/t/p/w500/fMaxCjekSd9g4qyyAEYm3cvckui.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/yGzQ4b_G7qM',
        ]);

        Film::create([
            'genre_id' => $genreModels['Horror']->id,
            'title' => 'Siksa Kubur',
            'slug' => Str::slug('Siksa Kubur'),
            'synopsis' => 'Sita tidak mempercayai agama pasca-ledakan bom, lalu ia masuk ke dalam liang kubur kriminal demi membuktikannya.',
            'rating' => 6.9,
            'release_year' => 2024,
            'duration' => 117,
            'country' => 'Indonesia',
            'language' => 'Indonesian',
            'cast' => 'Faradina Mufti, Reza Rahadian, Happy Salma',
            'director' => 'Joko Anwar',
            'poster' => 'https://image.tmdb.org/t/p/w500/aBNkuQxJuWiaMjgXfyoVCJC9Blc.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/34x7pD2j8sA',
        ]);

        Film::create([
            'genre_id' => $genreModels['Drama']->id,
            'title' => 'Ada Apa Dengan Cinta?',
            'slug' => Str::slug('Ada Apa Dengan Cinta'),
            'synopsis' => 'Gadis populer Cinta bergejolak perasaannya setelah mengenal Rangga, pemuda puitis yang idealis.',
            'rating' => 7.7,
            'release_year' => 2002,
            'duration' => 112,
            'country' => 'Indonesia',
            'language' => 'Indonesian',
            'cast' => 'Dian Sastrowardoyo, Nicholas Saputra, Titi Kamal',
            'director' => 'Rudi Soedjarwo',
            'poster' => 'https://image.tmdb.org/t/p/w500/gOiBEEK6C0ZB5r7SXt1zD1YV7rg.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/4w_bZkRkU1w',
        ]);

        Film::create([
            'genre_id' => $genreModels['Drama']->id,
            'title' => 'Dilan 1990',
            'slug' => Str::slug('Dilan 1990'),
            'synopsis' => 'Milea bernostalgia tentang romansa manisnya bersama Dilan, panglima tempur geng motor di Bandung.',
            'rating' => 7.1,
            'release_year' => 2018,
            'duration' => 109,
            'country' => 'Indonesia',
            'language' => 'Indonesian',
            'cast' => 'Iqbaal Ramadhan, Vanesha Prescilla, Giulio Parengkuan',
            'director' => 'Fajar Bustomi, Pidi Baiq',
            'poster' => 'https://image.tmdb.org/t/p/w500/eitRZXfbw6rO0CfP3lPaGgK63qr.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/VvQO2v0K2K0',
        ]);

        Film::create([
            'genre_id' => $genreModels['Drama']->id,
            'title' => 'Dua Garis Biru',
            'slug' => Str::slug('Dua Garis Biru'),
            'synopsis' => 'Bima dan Dara harus menghadapi konsekuensi berat, penghakiman, dan ujian kedewasaan ketika Dara hamil di luar nikah.',
            'rating' => 7.9,
            'release_year' => 2019,
            'duration' => 112,
            'country' => 'Indonesia',
            'language' => 'Indonesian',
            'cast' => 'Angga Yunanda, Adhisty Zara, Lulu Tobing',
            'director' => 'Gina S. Noer',
            'poster' => 'https://image.tmdb.org/t/p/w500/mSkrNJ6xjA8rcrR0hGEJzDl8C5V.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/G7Y-XyZ9Htc',
        ]);

        Film::create([
            'genre_id' => $genreModels['Drama']->id,
            'title' => 'Keluarga Cemara',
            'slug' => Str::slug('Keluarga Cemara'),
            'synopsis' => 'Keluarga Abah berjuang bertahan hidup di kampung halaman setelah rumah megah mereka disita akibat ditipu.',
            'rating' => 7.6,
            'release_year' => 2019,
            'duration' => 110,
            'country' => 'Indonesia',
            'language' => 'Indonesian',
            'cast' => 'Ringgo Agus Rahman, Nirina Zubir, Adhisty Zara',
            'director' => 'Yandy Laurens',
            'poster' => 'https://image.tmdb.org/t/p/w500/1fHxOly9EWy1cahwIsmcE7k7CT.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/0X3jGz1g7x8',
        ]);

        Film::create([
            'genre_id' => $genreModels['Drama']->id,
            'title' => 'Budi Pekerti',
            'slug' => Str::slug('Budi Pekerti'),
            'synopsis' => 'Bu Prani, guru BK, dikucilkan secara sosial setelah video adu mulutnya di pasar menjadi viral liar di media sosial.',
            'rating' => 7.8,
            'release_year' => 2023,
            'duration' => 110,
            'country' => 'Indonesia',
            'language' => 'Indonesian',
            'cast' => 'Sha Ine Febriyanti, Angga Yunanda, Prilly Latuconsina',
            'director' => 'Wregas Bhanuteja',
            'poster' => 'https://image.tmdb.org/t/p/w500/hHaYrp6kGhe9akB9AVAkMY43mvH.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/g_eP2h1XoM4',
        ]);

        Film::create([
            'genre_id' => $genreModels['Drama']->id,
            'title' => 'Habibie & Ainun',
            'slug' => Str::slug('Habibie & Ainun'),
            'synopsis' => 'Kisah cinta abadi B.J. Habibie dan belahan jiwanya, Ainun, yang mengawal takdir hingga ajal menjemput.',
            'rating' => 7.6,
            'release_year' => 2012,
            'duration' => 125,
            'country' => 'Indonesia',
            'language' => 'Indonesian',
            'cast' => 'Reza Rahadian, Bunga Citra Lestari, Tio Pakusadewo',
            'director' => 'Faozan Rizal',
            'poster' => 'https://image.tmdb.org/t/p/w500/eOdYhBFF7vE5v83KVVQfDEyLgEu.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/W0oZfK2g8_8',
        ]);

        Film::create([
            'genre_id' => $genreModels['Drama']->id,
            'title' => 'Sore: Istri dari Masa Depan',
            'slug' => Str::slug('Sore Istri dari Masa Depan'),
            'synopsis' => 'Jonathan terkejut didatangi wanita mandiri Sore, yang melintasi dimensi waktu mengaku sebagai istrinya.',
            'rating' => 8.5,
            'release_year' => 2025,
            'duration' => 119,
            'country' => 'Indonesia',
            'language' => 'Indonesian',
            'cast' => 'Dion Wiyoko, Tika Bravani',
            'director' => 'Yandy Laurens',
            'poster' => 'https://image.tmdb.org/t/p/w500/u4pNXPmBuYeTtksakUCZgJ1zpSB.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/K-X-wE6xHPE',
        ]);

        // ==========================================
        // BATCH 4: NEW UPLOADS & FIXES (FIXED TRAILERS)
        // ==========================================

        Film::create([
            'genre_id' => $genreModels['Drama']->id,
            'title' => 'Bila Esok Ibu Tiada',
            'slug' => Str::slug('Bila Esok Ibu Tiada'),
            'synopsis' => 'Kisah emosional seputar pengorbanan seorang ibu dalam menyatukan keempat anaknya sebelum ia wafat.',
            'rating' => 8.0,
            'release_year' => 2024,
            'duration' => 104,
            'country' => 'Indonesia',
            'language' => 'Indonesian',
            'cast' => 'Nungki Kusumastuti, Fedi Nuril, Amanda Manopo',
            'director' => 'Rudy Soedjarwo',
            'poster' => 'https://upload.wikimedia.org/wikipedia/id/7/7b/Poster_Bila_Esok_Ibu_Tiada.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/8_Q2L2498wQ',
        ]);

        Film::create([
            'genre_id' => $genreModels['Sci-Fi']->id,
            'title' => 'The Creator',
            'slug' => Str::slug('The Creator'),
            'synopsis' => 'Seorang mantan agen pasukan khusus ditugaskan memburu pencipta AI canggih yang dapat mengubah masa depan umat manusia.',
            'rating' => 7.0,
            'release_year' => 2023,
            'duration' => 133,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'John David Washington, Gemma Chan, Madeleine Yuna Voyles',
            'director' => 'Gareth Edwards',
            'poster' => 'https://image.tmdb.org/t/p/w500/vBZ0qvaRxqEhZwl6LWmruJqWE8Z.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/ex3C1-5Dhb8',
        ]);

        Film::create([
            'genre_id' => $genreModels['Sci-Fi']->id,
            'title' => 'Moon',
            'slug' => Str::slug('Moon'),
            'synopsis' => 'Seorang pekerja tambang bulan yang hampir menyelesaikan kontraknya menemukan rahasia mengejutkan tentang dirinya.',
            'rating' => 7.8,
            'release_year' => 2009,
            'duration' => 97,
            'country' => 'UK',
            'language' => 'English',
            'cast' => 'Sam Rockwell, Kevin Spacey, Dominique McElligott',
            'director' => 'Duncan Jones',
            'poster' => 'https://upload.wikimedia.org/wikipedia/en/b/b0/Moon_%282009%29_Film_Poster.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/twuScTcDP_Q',
        ]);

        Film::create([
            'genre_id' => $genreModels['Drama']->id,
            'title' => 'The Iron Claw',
            'slug' => Str::slug('The Iron Claw'),
            'synopsis' => 'Kisah nyata dari saudara-saudara Von Erich, yang mengukir sejarah luar biasa di dunia gulat profesional tahun 1980-an.',
            'rating' => 7.7,
            'release_year' => 2023,
            'duration' => 132,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Zac Efron, Jeremy Allen White, Harris Dickinson',
            'director' => 'Sean Durkin',
            'poster' => 'https://upload.wikimedia.org/wikipedia/en/8/87/The_Iron_Claw_%28film%29_poster.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/8KVsaoveTbw',
        ]);

        Film::create([
            'genre_id' => $genreModels['Animation']->id,
            'title' => 'Flow',
            'slug' => Str::slug('Flow'),
            'synopsis' => 'Seekor kucing harus bertahan hidup di dunia yang dilanda banjir besar bersama berbagai hewan lain.',
            'rating' => 8.0,
            'release_year' => 2024,
            'duration' => 85,
            'country' => 'Latvia',
            'language' => 'No Dialogue',
            'cast' => 'N/A',
            'director' => 'Gints Zilbalodis',
            'poster' => 'https://image.tmdb.org/t/p/w500/imKSymKBK7o73sajciEmndJoVkR.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/l5zSgSuIDU4',
        ]);

        Film::create([
            'genre_id' => $genreModels['Thriller']->id,
            'title' => 'Civil War',
            'slug' => Str::slug('Civil War'),
            'synopsis' => 'Perjalanan menegangkan sekelompok jurnalis militer melintasi Amerika Serikat yang sedang dilanda perang saudara brutal.',
            'rating' => 7.0,
            'release_year' => 2024,
            'duration' => 109,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Kirsten Dunst, Wagner Moura, Cailee Spaeny',
            'director' => 'Alex Garland',
            'poster' => 'https://upload.wikimedia.org/wikipedia/en/7/75/Civil_War_%282024_film%29_poster.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/aDyQxtg0V2w',
        ]);

        Film::create([
            'genre_id' => $genreModels['Thriller']->id,
            'title' => 'Trap',
            'slug' => Str::slug('Trap'),
            'synopsis' => 'Seorang ayah menemani putrinya ke konser musik pop besar, yang ternyata adalah perangkap polisi untuk menangkapnya.',
            'rating' => 6.2,
            'release_year' => 2024,
            'duration' => 105,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Josh Hartnett, Ariel Donoghue, Saleka Shyamalan',
            'director' => 'M. Night Shyamalan',
            'poster' => 'https://upload.wikimedia.org/wikipedia/en/2/25/Trap_%282024_film%29_poster.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/h74WX02_C8E',
        ]);

        Film::create([
            'genre_id' => $genreModels['Action']->id,
            'title' => 'Furiosa: A Mad Max Saga',
            'slug' => Str::slug('Furiosa A Mad Max Saga'),
            'synopsis' => 'Kisah asal usul prajurit pemberontak Furiosa sebelum ia bertemu dengan Mad Max di padang gurun tandus.',
            'rating' => 7.6,
            'release_year' => 2024,
            'duration' => 148,
            'country' => 'Australia',
            'language' => 'English',
            'cast' => 'Anya Taylor-Joy, Chris Hemsworth, Tom Burke',
            'director' => 'George Miller',
            'poster' => 'https://upload.wikimedia.org/wikipedia/en/9/90/Furiosa_A_Mad_Max_Saga_poster.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/XJMuhwVlca4',
        ]);

        Film::create([
            'genre_id' => $genreModels['Action']->id,
            'title' => 'Monkey Man',
            'slug' => Str::slug('Monkey Man'),
            'synopsis' => 'Seorang pemuda tanpa nama memulai kampanye balas dendam mematikan terhadap para pemimpin korup.',
            'rating' => 7.0,
            'release_year' => 2024,
            'duration' => 121,
            'country' => 'Canada',
            'language' => 'English',
            'cast' => 'Dev Patel, Sharlto Copley, Sobhita Dhulipala',
            'director' => 'Dev Patel',
            'poster' => 'https://upload.wikimedia.org/wikipedia/en/4/47/Monkey_Man_%28film%29_poster.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/adQhqytUBZI',
        ]);

        Film::create([
            'genre_id' => $genreModels['Horror']->id,
            'title' => 'The Substance',
            'slug' => Str::slug('The Substance'),
            'synopsis' => 'Seorang selebriti yang menua menggunakan obat terlarang untuk membelah dirinya menjadi versi yang lebih muda dan sempurna.',
            'rating' => 7.8,
            'release_year' => 2024,
            'duration' => 140,
            'country' => 'UK',
            'language' => 'English',
            'cast' => 'Demi Moore, Margaret Qualley, Dennis Quaid',
            'director' => 'Coralie Fargeat',
            'poster' => 'https://upload.wikimedia.org/wikipedia/en/3/36/The_Substance_poster.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/vR-n_f8h1oM',
        ]);

        Film::create([
            'genre_id' => $genreModels['Horror']->id,
            'title' => 'A Quiet Place: Day One',
            'slug' => Str::slug('A Quiet Place Day One'),
            'synopsis' => 'Kisah hari pertama ketika monster asing dengan pendengaran tajam menginvasi kota New York yang bising.',
            'rating' => 6.9,
            'release_year' => 2024,
            'duration' => 99,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Lupita Nyongo, Joseph Quinn, Alex Wolff',
            'director' => 'Michael Sarnoski',
            'poster' => 'https://image.tmdb.org/t/p/w500/7fn624j5lj3xTme2SgiLCeuedmO.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/YPY7J-flzE8',
        ]);

        Film::create([
            'genre_id' => $genreModels['Sci-Fi']->id,
            'title' => 'Looper',
            'slug' => Str::slug('Looper'),
            'synopsis' => 'Pembunuh bayaran yang bekerja untuk organisasi perjalanan waktu harus menghadapi versi dirinya dari masa depan.',
            'rating' => 7.4,
            'release_year' => 2012,
            'duration' => 119,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Joseph Gordon-Levitt, Bruce Willis, Emily Blunt',
            'director' => 'Rian Johnson',
            'poster' => 'https://image.tmdb.org/t/p/w500/sNjL6SqErDBE8OUZlrDLkexfsCj.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/2iQuhsmtfHw',
        ]);

        Film::create([
            'genre_id' => $genreModels['Sci-Fi']->id,
            'title' => 'Children of Men',
            'slug' => Str::slug('Children of Men'),
            'synopsis' => 'Di masa depan ketika manusia tidak lagi bisa bereproduksi, seorang pria harus melindungi wanita yang mungkin menjadi harapan terakhir umat manusia.',
            'rating' => 7.9,
            'release_year' => 2006,
            'duration' => 109,
            'country' => 'UK',
            'language' => 'English',
            'cast' => 'Clive Owen, Julianne Moore, Michael Caine',
            'director' => 'Alfonso Cuaron',
            'poster' => 'https://upload.wikimedia.org/wikipedia/en/d/d2/Children_of_Men_poster.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/2VT2apoX90o',
        ]);

        Film::create([
            'genre_id' => $genreModels['Action']->id,
            'title' => 'Bullet Train',
            'slug' => Str::slug('Bullet Train'),
            'synopsis' => 'Seorang pembunuh bayaran mendapati misinya terhubung dengan beberapa penjahat lain di kereta cepat Jepang.',
            'rating' => 7.3,
            'release_year' => 2022,
            'duration' => 126,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Brad Pitt, Joey King, Aaron Taylor-Johnson',
            'director' => 'David Leitch',
            'poster' => 'https://image.tmdb.org/t/p/w500/j8szC8OgrejDQjjMKSVXyaAjw3V.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/0IOsk2Vlc4o',
        ]);

        Film::create([
            'genre_id' => $genreModels['Action']->id,
            'title' => 'Nobody',
            'slug' => Str::slug('Nobody'),
            'synopsis' => 'Pria biasa yang diremehkan keluarganya mengungkap masa lalu kelamnya setelah rumahnya dirampok.',
            'rating' => 7.4,
            'release_year' => 2021,
            'duration' => 92,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Bob Odenkirk, Connie Nielsen, Aleksey Serebryakov',
            'director' => 'Ilya Naishuller',
            'poster' => 'https://image.tmdb.org/t/p/w500/oBgWY00bEFeZ9N25wWVyuQddbAo.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/wZti8QKBWPo',
        ]);

        Film::create([
            'genre_id' => $genreModels['Action']->id,
            'title' => 'The Fall Guy',
            'slug' => Str::slug('The Fall Guy'),
            'synopsis' => 'Seorang stuntman kembali bekerja dan terlibat dalam misteri hilangnya aktor terkenal.',
            'rating' => 7.0,
            'release_year' => 2024,
            'duration' => 126,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Ryan Gosling, Emily Blunt, Aaron Taylor-Johnson',
            'director' => 'David Leitch',
            'poster' => 'https://image.tmdb.org/t/p/w500/aBkqu7EddWK7qmY4grL4I6edx2h.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/j7jPnwVGdZ8',
        ]);

        Film::create([
            'genre_id' => $genreModels['Action']->id,
            'title' => 'Mission: Impossible - Dead Reckoning Part One',
            'slug' => Str::slug('Mission Impossible Dead Reckoning Part One'),
            'synopsis' => 'Ethan Hunt menghadapi ancaman kecerdasan buatan yang dapat menguasai dunia.',
            'rating' => 7.7,
            'release_year' => 2023,
            'duration' => 163,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Tom Cruise, Hayley Atwell, Ving Rhames',
            'director' => 'Christopher McQuarrie',
            'poster' => 'https://image.tmdb.org/t/p/w500/NNxYkU70HPurnNCSiCjYAmacwm.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/avz06PDqDbM',
        ]);

        Film::create([
            'genre_id' => $genreModels['Drama']->id,
            'title' => 'Green Book',
            'slug' => Str::slug('Green Book'),
            'synopsis' => 'Persahabatan antara pianis kulit hitam dan sopirnya tumbuh selama tur konser di Amerika Selatan.',
            'rating' => 8.2,
            'release_year' => 2018,
            'duration' => 130,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Viggo Mortensen, Mahershala Ali, Linda Cardellini',
            'director' => 'Peter Farrelly',
            'poster' => 'https://image.tmdb.org/t/p/w500/7BsvSuDQuoqhWmU2fL7W2GOcZHU.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/QkZxoko_HC0',
        ]);

        Film::create([
            'genre_id' => $genreModels['Drama']->id,
            'title' => 'CODA',
            'slug' => Str::slug('CODA'),
            'synopsis' => 'Remaja yang menjadi satu-satunya anggota keluarga yang bisa mendengar harus memilih antara keluarga dan mimpinya.',
            'rating' => 8.0,
            'release_year' => 2021,
            'duration' => 111,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Emilia Jones, Marlee Matlin, Troy Kotsur',
            'director' => 'Sian Heder',
            'poster' => 'https://image.tmdb.org/t/p/w500/BzVjmm8l23rPsijLiNLUzuQtyd.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/0pmfrE1YL4I',
        ]);

        Film::create([
            'genre_id' => $genreModels['Drama']->id,
            'title' => 'The Whale',
            'slug' => Str::slug('The Whale'),
            'synopsis' => 'Seorang guru yang mengalami obesitas berat berusaha memperbaiki hubungannya dengan putrinya.',
            'rating' => 7.7,
            'release_year' => 2022,
            'duration' => 117,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Brendan Fraser, Sadie Sink, Hong Chau',
            'director' => 'Darren Aronofsky',
            'poster' => 'https://image.tmdb.org/t/p/w500/jQ0gylJMxWSL490sy0RrPj1Lj7e.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/nWiQodhMvz4',
        ]);

        Film::create([
            'genre_id' => $genreModels['Drama']->id,
            'title' => 'The Fabelmans',
            'slug' => Str::slug('The Fabelmans'),
            'synopsis' => 'Kisah masa muda seorang pembuat film yang terinspirasi oleh pengalaman keluarganya.',
            'rating' => 7.5,
            'release_year' => 2022,
            'duration' => 151,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Gabriel LaBelle, Michelle Williams, Paul Dano',
            'director' => 'Steven Spielberg',
            'poster' => 'https://image.tmdb.org/t/p/w500/d2IywyOPS78vEnJvwVqkVRTiNC1.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/D1G2iLSzOe8',
        ]);

        Film::create([
            'genre_id' => $genreModels['Thriller']->id,
            'title' => 'The Menu',
            'slug' => Str::slug('The Menu'),
            'synopsis' => 'Pasangan muda menghadiri jamuan eksklusif yang ternyata menyimpan kejutan mengerikan.',
            'rating' => 7.2,
            'release_year' => 2022,
            'duration' => 107,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Ralph Fiennes, Anya Taylor-Joy, Nicholas Hoult',
            'director' => 'Mark Mylod',
            'poster' => 'https://image.tmdb.org/t/p/w500/v31MsWhF9WFh7Qooq6xSBbmJxoG.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/C_uTkUGcHv4',
        ]);

        Film::create([
            'genre_id' => $genreModels['Thriller']->id,
            'title' => 'Wind River',
            'slug' => Str::slug('Wind River'),
            'synopsis' => 'Agen FBI bekerja sama dengan pemburu lokal untuk menyelidiki pembunuhan di reservasi Indian.',
            'rating' => 7.7,
            'release_year' => 2017,
            'duration' => 107,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Jeremy Renner, Elizabeth Olsen, Graham Greene',
            'director' => 'Taylor Sheridan',
            'poster' => 'https://image.tmdb.org/t/p/w500/pySivdR845Hom4u4T2WNkJxe6Ad.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/s7gJsgI6k1I',
        ]);

        Film::create([
            'genre_id' => $genreModels['Thriller']->id,
            'title' => 'Nocturnal Animals',
            'slug' => Str::slug('Nocturnal Animals'),
            'synopsis' => 'Seorang wanita menerima naskah novel dari mantan suaminya yang membangkitkan masa lalu kelam.',
            'rating' => 7.5,
            'release_year' => 2016,
            'duration' => 116,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Amy Adams, Jake Gyllenhaal, Michael Shannon',
            'director' => 'Tom Ford',
            'poster' => 'https://upload.wikimedia.org/wikipedia/en/d/d4/Nocturnal_Animals.png',
            'trailer_url' => 'https://www.youtube.com/embed/-H1Ii1LjyFU',
        ]);

        Film::create([
            'genre_id' => $genreModels['Thriller']->id,
            'title' => 'The Killer',
            'slug' => Str::slug('The Killer'),
            'synopsis' => 'Seorang pembunuh profesional memburu orang-orang yang telah mengkhianatinya.',
            'rating' => 6.7,
            'release_year' => 2023,
            'duration' => 118,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Michael Fassbender, Tilda Swinton, Arliss Howard',
            'director' => 'David Fincher',
            'poster' => 'https://image.tmdb.org/t/p/w500/e7Jvsry47JJQruuezjU2X1Z6J77.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/vs1epO_zLG8',
        ]);

        Film::create([
            'genre_id' => $genreModels['Animation']->id,
            'title' => 'Soul',
            'slug' => Str::slug('Soul'),
            'synopsis' => 'Musisi jazz yang bercita-cita tinggi mengalami petualangan spiritual setelah kecelakaan tak terduga.',
            'rating' => 8.0,
            'release_year' => 2020,
            'duration' => 100,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Jamie Foxx, Tina Fey, Graham Norton',
            'director' => 'Pete Docter',
            'poster' => 'https://image.tmdb.org/t/p/w500/hm58Jw4Lw8OIeECIq5qyPYhAeRJ.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/xOsLIiBStEs',
        ]);

        Film::create([
            'genre_id' => $genreModels['Animation']->id,
            'title' => 'Klaus',
            'slug' => Str::slug('Klaus'),
            'synopsis' => 'Tukang pos yang malas menjalin persahabatan dengan pembuat mainan misterius.',
            'rating' => 8.2,
            'release_year' => 2019,
            'duration' => 96,
            'country' => 'Spain',
            'language' => 'English',
            'cast' => 'Jason Schwartzman, J.K. Simmons, Rashida Jones',
            'director' => 'Sergio Pablos',
            'poster' => 'https://image.tmdb.org/t/p/w500/q125RHUDgR4gjwh1QkfYuJLYkL.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/taE3PwurhYM',
        ]);

        Film::create([
            'genre_id' => $genreModels['Animation']->id,
            'title' => 'The Wild Robot',
            'slug' => Str::slug('The Wild Robot'),
            'synopsis' => 'Robot yang terdampar di pulau liar belajar bertahan hidup dan menjalin hubungan dengan hewan-hewan setempat.',
            'rating' => 8.3,
            'release_year' => 2024,
            'duration' => 102,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Lupita Nyongo, Pedro Pascal, Kit Connor',
            'director' => 'Chris Sanders',
            'poster' => 'https://image.tmdb.org/t/p/w500/wTnV3PCVW5O92JMrFvvrRcV39RU.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/67vbA5ZJdKQ',
        ]);

        Film::create([
            'genre_id' => $genreModels['Animation']->id,
            'title' => 'Kubo and the Two Strings',
            'slug' => Str::slug('Kubo and the Two Strings'),
            'synopsis' => 'Seorang anak laki-laki memulai perjalanan magis untuk mengungkap rahasia keluarganya.',
            'rating' => 7.7,
            'release_year' => 2016,
            'duration' => 101,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Art Parkinson, Charlize Theron, Matthew McConaughey',
            'director' => 'Travis Knight',
            'poster' => 'https://upload.wikimedia.org/wikipedia/en/c/c4/Kubo_and_the_Two_Strings_poster.png',
            'trailer_url' => 'https://www.youtube.com/embed/vex0gPFnBvM',
        ]);
        
        Film::create([
            'genre_id' => $genreModels['Adventure']->id,
            'title' => 'Life of Pi',
            'slug' => Str::slug('Life of Pi'),
            'synopsis' => 'Seorang remaja India bertahan hidup di tengah lautan bersama seekor harimau Bengal setelah kapal yang ditumpanginya tenggelam.',
            'rating' => 7.9,
            'release_year' => 2012,
            'duration' => 127,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Suraj Sharma, Irrfan Khan, Tabu',
            'director' => 'Ang Lee',
            'poster' => 'https://image.tmdb.org/t/p/w500/iLgRu4hhSr6V1uManX6ukDriiSc.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/j9Hjrs6WQ8M',
        ]);

        Film::create([
            'genre_id' => $genreModels['Adventure']->id,
            'title' => 'Uncharted',
            'slug' => Str::slug('Uncharted'),
            'synopsis' => 'Pemburu harta karun muda Nathan Drake memulai petualangan global untuk menemukan kekayaan legendaris yang hilang.',
            'rating' => 6.3,
            'release_year' => 2022,
            'duration' => 116,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Tom Holland, Mark Wahlberg, Sophia Ali',
            'director' => 'Ruben Fleischer',
            'poster' => 'https://image.tmdb.org/t/p/w500/rJHC1RUORuUhtfNb4Npclx0xnOf.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/eHp3MbsCbMg',
        ]);

        Film::create([
            'genre_id' => $genreModels['Fantasy']->id,
            'title' => 'Stardust',
            'slug' => Str::slug('Stardust'),
            'synopsis' => 'Seorang pemuda memasuki dunia sihir untuk mencari bintang jatuh yang ternyata berwujud manusia.',
            'rating' => 7.6,
            'release_year' => 2007,
            'duration' => 127,
            'country' => 'UK',
            'language' => 'English',
            'cast' => 'Charlie Cox, Claire Danes, Michelle Pfeiffer',
            'director' => 'Matthew Vaughn',
            'poster' => 'https://upload.wikimedia.org/wikipedia/en/0/06/Stardust_Theatrical_Poster.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/-wwv427DAvA',
        ]);

        Film::create([
            'genre_id' => $genreModels['Fantasy']->id,
            'title' => 'The Green Knight',
            'slug' => Str::slug('The Green Knight'),
            'synopsis' => 'Sir Gawain menerima tantangan misterius dari Ksatria Hijau yang akan menguji kehormatan dan keberaniannya.',
            'rating' => 6.6,
            'release_year' => 2021,
            'duration' => 130,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Dev Patel, Alicia Vikander, Joel Edgerton',
            'director' => 'David Lowery',
            'poster' => 'https://upload.wikimedia.org/wikipedia/en/1/1d/The_Green_Knight_poster.jpeg',
            'trailer_url' => 'https://www.youtube.com/embed/sS6ksY8xWCY',
        ]);

        Film::create([
            'genre_id' => $genreModels['Horror']->id,
            'title' => 'Talk to Me',
            'slug' => Str::slug('Talk to Me'),
            'synopsis' => 'Sekelompok remaja menemukan cara berkomunikasi dengan roh melalui tangan misterius yang dibalsem.',
            'rating' => 7.1,
            'release_year' => 2023,
            'duration' => 95,
            'country' => 'Australia',
            'language' => 'English',
            'cast' => 'Sophie Wilde, Alexandra Jensen, Joe Bird',
            'director' => 'Danny Philippou, Michael Philippou',
            'poster' => 'https://image.tmdb.org/t/p/w500/kdPMUMJzyYAc4roD52qavX0nLIC.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/aLAKJu9aJys',
        ]);

        Film::create([
            'genre_id' => $genreModels['Horror']->id,
            'title' => 'Smile 2',
            'slug' => Str::slug('Smile 2'),
            'synopsis' => 'Seorang penyanyi pop terkenal mulai mengalami kejadian mengerikan menjelang tur dunia yang menentukan kariernya.',
            'rating' => 6.9,
            'release_year' => 2024,
            'duration' => 127,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Naomi Scott, Rosemarie DeWitt, Lukas Gage',
            'director' => 'Parker Finn',
            'poster' => 'https://image.tmdb.org/t/p/w500/ht8Uv9QPv9y7K0RvUyJIaXOZTfd.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/F4nkZ4qIxyc',
        ]);

        Film::create([
            'genre_id' => $genreModels['Drama']->id,
            'title' => 'Past Lives',
            'slug' => Str::slug('Past Lives'),
            'synopsis' => 'Dua sahabat masa kecil yang terpisah bertahun-tahun bertemu kembali dan mempertanyakan pilihan hidup mereka.',
            'rating' => 7.8,
            'release_year' => 2023,
            'duration' => 106,
            'country' => 'USA',
            'language' => 'English',
            'cast' => 'Greta Lee, Teo Yoo, John Magaro',
            'director' => 'Celine Song',
            'poster' => 'https://image.tmdb.org/t/p/w500/k3waqVXSnvCZWfJYNtdamTgTtTA.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/kA244xewjcI',
        ]);

        Film::create([
            'genre_id' => $genreModels['Thriller']->id,
            'title' => 'Conclave',
            'slug' => Str::slug('Conclave'),
            'synopsis' => 'Seorang kardinal memimpin pemilihan paus baru dan menemukan rahasia besar yang dapat mengguncang Gereja.',
            'rating' => 7.5,
            'release_year' => 2024,
            'duration' => 120,
            'country' => 'UK',
            'language' => 'English',
            'cast' => 'Ralph Fiennes, Stanley Tucci, John Lithgow',
            'director' => 'Edward Berger',
            'poster' => 'https://upload.wikimedia.org/wikipedia/en/f/f6/Conclave_film_poster.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/JX9jasdi3ic',
        ]);
    }
}