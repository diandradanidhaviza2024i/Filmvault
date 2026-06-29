-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2026 at 07:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filmvault`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `film_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `genre_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `synopsis` text NOT NULL,
  `rating` decimal(3,1) NOT NULL,
  `release_year` year(4) NOT NULL,
  `duration` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `cast` varchar(255) NOT NULL,
  `director` varchar(255) NOT NULL,
  `poster` varchar(255) NOT NULL,
  `trailer_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id`, `genre_id`, `title`, `slug`, `synopsis`, `rating`, `release_year`, `duration`, `country`, `language`, `cast`, `director`, `poster`, `trailer_url`, `created_at`, `updated_at`) VALUES
(1, 2, 'Interstellar', 'interstellar', 'Sekelompok penjelajah melintasi lubang cacing di luar angkasa dalam upaya untuk memastikan kelangsungan hidup umat manusia.', 8.6, '2014', 169, 'USA', 'English', 'Matthew McConaughey, Anne Hathaway, Jessica Chastain', 'Christopher Nolan', 'https://upload.wikimedia.org/wikipedia/en/b/bc/Interstellar_film_poster.jpg', 'https://www.youtube.com/embed/zSWdZVtXT7E', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(2, 2, 'The Matrix', 'the-matrix', 'Seorang peretas komputer belajar dari pemberontak misterius tentang sifat sebenarnya dari realitasnya dan perannya dalam perang melawan pengendalinya.', 8.7, '1999', 136, 'USA', 'English', 'Keanu Reeves, Laurence Fishburne, Carrie-Anne Moss', 'Lana Wachowski, Lilly Wachowski', 'https://image.tmdb.org/t/p/w500/f89U3ADr1oiB1s9GkdPOEpXUk5H.jpg', 'https://www.youtube.com/embed/vKQi3bBA1y8', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(3, 2, 'Inception', 'inception', 'Seorang pencuri yang mencuri rahasia perusahaan melalui penggunaan teknologi berbagi mimpi diberikan tugas sebaliknya: menanamkan ide ke dalam pikiran seorang CEO.', 8.8, '2010', 148, 'USA', 'English', 'Leonardo DiCaprio, Joseph Gordon-Levitt, Elliot Page', 'Christopher Nolan', 'https://image.tmdb.org/t/p/w500/oYuLEt3zVCKq57qu2F8dT7NIa6f.jpg', 'https://www.youtube.com/embed/YoHD9XEInc0', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(4, 2, 'Blade Runner 2049', 'blade-runner-2049', 'Seorang blade runner muda menemukan rahasia yang telah lama terkubur yang membawanya untuk melacak mantan blade runner, Rick Deckard.', 8.0, '2017', 164, 'USA', 'English', 'Ryan Gosling, Harrison Ford, Ana de Armas', 'Denis Villeneuve', 'https://image.tmdb.org/t/p/w500/gajva2L0rPYkEWjzgFlBXCAVBE5.jpg', 'https://www.youtube.com/embed/gCcx85zbxz4', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(5, 2, 'Dune', 'dune', 'Putra dari keluarga bangsawan yang dipercaya untuk melindungi aset paling berharga dan elemen paling vital di galaksi.', 8.0, '2021', 155, 'USA', 'English', 'Timothée Chalamet, Rebecca Ferguson, Zendaya', 'Denis Villeneuve', 'https://image.tmdb.org/t/p/w500/d5NXSklXo0qyIYkgV94XAgMIckC.jpg', 'https://www.youtube.com/embed/n9xhJrPXop4', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(6, 1, 'The Dark Knight', 'the-dark-knight', 'Ketika ancaman yang dikenal sebagai Joker mendatangkan kekacauan pada rakyat Gotham, Batman harus menerima ujian fisik dan psikologis terbesar.', 9.0, '2008', 152, 'USA', 'English', 'Christian Bale, Heath Ledger, Aaron Eckhart', 'Christopher Nolan', 'https://image.tmdb.org/t/p/w500/qJ2tW6WMUDux911r6m7haRef0WH.jpg', 'https://www.youtube.com/embed/EXeTwQWrcwY', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(7, 1, 'Mad Max: Fury Road', 'mad-max-fury-road', 'Di gurun pasca-apokaliptik, seorang wanita memberontak melawan penguasa tirani demi mencari tanah airnya.', 8.1, '2015', 120, 'Australia', 'English', 'Tom Hardy, Charlize Theron, Nicholas Hoult', 'George Miller', 'https://upload.wikimedia.org/wikipedia/en/6/6e/Mad_Max_Fury_Road.jpg', 'https://www.youtube.com/embed/hEJnMQG9ev8', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(8, 1, 'John Wick', 'john-wick', 'Seorang mantan pembunuh bayaran keluar dari masa pensiunnya untuk melacak para gangster yang membunuh anjingnya.', 7.4, '2014', 101, 'USA', 'English', 'Keanu Reeves, Michael Nyqvist, Alfie Allen', 'Chad Stahelski', 'https://image.tmdb.org/t/p/w500/fZPSd91yGE9fCcCe6OoQr6E3Bev.jpg', 'https://www.youtube.com/embed/C0BMx-qxsP4', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(9, 1, 'Avengers: Endgame', 'avengers-endgame', 'Para Avengers yang tersisa berkumpul sekali lagi untuk membalikkan tindakan Thanos dan mengembalikan keseimbangan.', 8.4, '2019', 181, 'USA', 'English', 'Robert Downey Jr., Chris Evans, Mark Ruffalo', 'Anthony Russo, Joe Russo', 'https://image.tmdb.org/t/p/w500/or06FN3Dka5tukK1e9sl16pB3iy.jpg', 'https://www.youtube.com/embed/TcMBFSGVi1c', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(10, 1, 'Spider-Man: No Way Home', 'spider-man-no-way-home', 'Identitas Spider-Man kini terungkap, Peter meminta bantuan Doctor Strange. Namun, saat mantra salah, musuh dari dunia lain bermunculan.', 8.2, '2021', 148, 'USA', 'English', 'Tom Holland, Zendaya, Benedict Cumberbatch', 'Jon Watts', 'https://upload.wikimedia.org/wikipedia/en/0/00/Spider-Man_No_Way_Home_poster.jpg', 'https://www.youtube.com/embed/JfVOs4VSpmA', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(11, 3, 'The Conjuring', 'the-conjuring', 'Penyelidik paranormal Ed dan Lorraine Warren bekerja untuk membantu keluarga yang diteror oleh kehadiran gelap di rumah pertanian.', 7.5, '2013', 112, 'USA', 'English', 'Patrick Wilson, Vera Farmiga, Ron Livingston', 'James Wan', 'https://image.tmdb.org/t/p/w500/wVYREutTvI2tmxr6ujrHT704wGF.jpg', 'https://www.youtube.com/embed/k10ETZ41q5o', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(12, 3, 'A Quiet Place', 'a-quiet-place', 'Dalam dunia pasca-apokaliptik, sebuah keluarga dipaksa untuk hidup dalam keheningan sambil bersembunyi dari monster dengan pendengaran ultra-sensitif.', 7.5, '2018', 90, 'USA', 'English', 'Emily Blunt, John Krasinski, Millicent Simmonds', 'John Krasinski', 'https://image.tmdb.org/t/p/w500/nAU74GmpUk7t5iklEp3bufwDq4n.jpg', 'https://www.youtube.com/embed/WR7cc5t7tv8', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(13, 3, 'Get Out', 'get-out', 'Seorang pemuda Afrika-Amerika mengunjungi orang tua pacarnya yang berkulit putih untuk akhir pekan, yang berujung pada teror psikologis.', 7.7, '2017', 104, 'USA', 'English', 'Daniel Kaluuya, Allison Williams, Bradley Whitford', 'Jordan Peele', 'https://upload.wikimedia.org/wikipedia/en/a/a3/Get_Out_poster.png', 'https://www.youtube.com/embed/DzfpyUB60YY', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(14, 3, 'Hereditary', 'hereditary', 'Keluarga Graham mulai mengungkap rahasia mengerikan tentang leluhur mereka setelah kematian nenek mereka yang tertutup.', 7.3, '2018', 127, 'USA', 'English', 'Toni Collette, Milly Shapiro, Gabriel Byrne', 'Ari Aster', 'https://upload.wikimedia.org/wikipedia/en/d/d9/Hereditary.png', 'https://www.youtube.com/embed/V6wWKNij_1M', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(15, 3, 'It', 'it', 'Sekelompok anak-anak yang di-bully bersatu untuk menghancurkan monster pengubah bentuk yang memangsa anak-anak.', 7.3, '2017', 135, 'USA', 'English', 'Bill Skarsgård, Jaeden Martell, Finn Wolfhard', 'Andy Muschietti', 'https://image.tmdb.org/t/p/w500/9E2y5Q7WlCVNEhP5GiVTjhEhx1o.jpg', 'https://www.youtube.com/embed/xKJmEC5ieOk', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(16, 4, 'The Shawshank Redemption', 'the-shawshank-redemption', 'Dua pria yang dipenjara menjalin ikatan selama beberapa tahun, menemukan pelipur lara dan penebusan akhir.', 9.3, '1994', 142, 'USA', 'English', 'Tim Robbins, Morgan Freeman, Bob Gunton', 'Frank Darabont', 'https://image.tmdb.org/t/p/w500/q6y0Go1tsGEsmtFryDOJo3dEmqu.jpg', 'https://www.youtube.com/embed/6hB3S9bIaco', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(17, 4, 'Forrest Gump', 'forrest-gump', 'Peristiwa sejarah terungkap melalui perspektif pria Alabama dengan IQ 75 yang luar biasa.', 8.8, '1994', 142, 'USA', 'English', 'Tom Hanks, Robin Wright, Gary Sinise', 'Robert Zemeckis', 'https://image.tmdb.org/t/p/w500/arw2vcBveWOVZr6pxd9XTd1TdQa.jpg', 'https://www.youtube.com/embed/bLvqoHBptjg', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(18, 4, 'Fight Club', 'fight-club', 'Seorang pekerja kantoran dan pembuat sabun membentuk klub pertarungan bawah tanah yang berevolusi.', 8.8, '1999', 139, 'USA', 'English', 'Brad Pitt, Edward Norton, Meat Loaf', 'David Fincher', 'https://image.tmdb.org/t/p/w500/pB8BM7pdSp6B6Ih7QZ4DrQ3PmJK.jpg', 'https://www.youtube.com/embed/qtRKdVHc-cE', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(19, 4, 'Parasite', 'parasite', 'Keserakahan dan diskriminasi kelas mengancam hubungan simbiosis antara keluarga kaya Park dan keluarga miskin Kim.', 8.5, '2019', 132, 'South Korea', 'Korean', 'Song Kang-ho, Lee Sun-kyun, Cho Yeo-jeong', 'Bong Joon Ho', 'https://image.tmdb.org/t/p/w500/7IiTTgloJzvGI1TAYymCfbfl3vT.jpg', 'https://www.youtube.com/embed/5xH0HfJHsaY', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(20, 4, 'Joker', 'joker', 'Di Kota Gotham, komedian Arthur Fleck perlahan turun ke kegilaan dan nihilisme.', 8.4, '2019', 122, 'USA', 'English', 'Joaquin Phoenix, Robert De Niro, Zazie Beetz', 'Todd Phillips', 'https://upload.wikimedia.org/wikipedia/en/e/e1/Joker_%282019_film%29_poster.jpg', 'https://www.youtube.com/embed/zAGVQLHvwOY', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(21, 5, 'Se7en', 'se7en', 'Dua detektif memburu pembunuh berantai yang menggunakan tujuh dosa mematikan sebagai motifnya.', 8.6, '1995', 127, 'USA', 'English', 'Morgan Freeman, Brad Pitt, Kevin Spacey', 'David Fincher', 'https://upload.wikimedia.org/wikipedia/en/6/68/Seven_%28movie%29_poster.jpg', 'https://www.youtube.com/embed/znmZoVkCjpI', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(22, 5, 'Shutter Island', 'shutter-island', 'Pada tahun 1954, seorang Marsekal A.S. menyelidiki hilangnya seorang pembunuh yang melarikan diri dari rumah sakit jiwa.', 8.2, '2010', 138, 'USA', 'English', 'Leonardo DiCaprio, Emily Mortimer, Mark Ruffalo', 'Martin Scorsese', 'https://image.tmdb.org/t/p/w500/kve20tXwUZpu4GUX8l6X7Z4jmL6.jpg', 'https://www.youtube.com/embed/5iaYLCiq5RM', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(23, 5, 'Gone Girl', 'gone-girl', 'Dengan hilangnya istrinya, seorang pria dicurigai membunuhnya.', 8.1, '2014', 149, 'USA', 'English', 'Ben Affleck, Rosamund Pike, Neil Patrick Harris', 'David Fincher', 'https://upload.wikimedia.org/wikipedia/en/0/05/Gone_Girl_Poster.jpg', 'https://www.youtube.com/embed/2-_-1nJf8Vg', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(24, 5, 'The Silence of the Lambs', 'the-silence-of-the-lambs', 'Taruni FBI muda menerima bantuan dari pembunuh kanibal untuk menangkap pembunuh berantai lain.', 8.6, '1991', 118, 'USA', 'English', 'Jodie Foster, Anthony Hopkins, Lawrence A. Bonney', 'Jonathan Demme', 'https://image.tmdb.org/t/p/w500/rplLJ2hPcOQmkFhTqUte0MkEaO2.jpg', 'https://www.youtube.com/embed/W6Mm8Sbe__o', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(25, 5, 'Prisoners', 'prisoners', 'Ketika putri Keller Dover hilang, ia mengambil tindakan sendiri saat polisi mengejar banyak petunjuk.', 8.1, '2013', 153, 'USA', 'English', 'Hugh Jackman, Jake Gyllenhaal, Viola Davis', 'Denis Villeneuve', 'https://upload.wikimedia.org/wikipedia/en/6/63/Prisoners2013Poster.jpg', 'https://www.youtube.com/embed/bpXfcTF6iVk', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(26, 6, 'Spirited Away', 'spirited-away', 'Seorang gadis cemberut berusia 10 tahun mengembara ke dunia yang dikuasai dewa, penyihir, dan roh.', 8.6, '2001', 125, 'Japan', 'Japanese', 'Rumi Hiiragi, Miyu Irino, Mari Natsuki', 'Hayao Miyazaki', 'https://upload.wikimedia.org/wikipedia/en/d/db/Spirited_Away_Japanese_poster.png', 'https://www.youtube.com/embed/ByXuk9QqQkk', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(27, 6, 'Spider-Man: Into the Spider-Verse', 'spider-man-into-the-spider-verse', 'Remaja Miles Morales menjadi Spider-Man dari dunianya, menyilang jalannya dengan rekan dari dimensi lain.', 8.4, '2018', 117, 'USA', 'English', 'Shameik Moore, Jake Johnson, Hailee Steinfeld', 'Bob Persichetti, Peter Ramsey', 'https://image.tmdb.org/t/p/w500/iiZZdoQBEYBv6id8su7ImL0oCbD.jpg', 'https://www.youtube.com/embed/g4Hbz2jLxvQ', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(28, 6, 'Toy Story', 'toy-story', 'Sebuah boneka koboi merasa terancam cemburu saat mainan astronot yang mengkilap menjadi barang favorit pemiliknya.', 8.3, '1995', 81, 'USA', 'English', 'Tom Hanks, Tim Allen, Don Rickles', 'John Lasseter', 'https://image.tmdb.org/t/p/w500/uXDfjJbdP4ijW5hWSBrPrlKpxab.jpg', 'https://www.youtube.com/embed/v-PjgYDrg70', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(29, 7, 'Jurassic Park', 'jurassic-park', 'Taman bermain pragmatis yang berisi dinosaurus-dinosaurus kloning runtuh, ketika hewan ini membebaskan diri.', 8.2, '1993', 127, 'USA', 'English', 'Sam Neill, Laura Dern, Jeff Goldblum', 'Steven Spielberg', 'https://image.tmdb.org/t/p/w500/oU7Oq2kFAAlGqbU4VoAE36g4hoI.jpg', 'https://www.youtube.com/embed/lc0UehYemQA', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(30, 8, 'The Lord of the Rings: The Fellowship of the Ring', 'the-lord-of-the-rings-the-fellowship-of-the-ring', 'Hobbit Frodo yang pemalu mewarisi sebuah Cincin. Bersama delapan rekannya ia harus menempuh perjalanan untuk menghancurkannya.', 8.8, '2001', 178, 'New Zealand', 'English', 'Elijah Wood, Ian McKellen, Orlando Bloom', 'Peter Jackson', 'https://upload.wikimedia.org/wikipedia/en/f/fb/Lord_Rings_Fellowship_Ring.jpg', 'https://www.youtube.com/embed/V75dMMIW2B4', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(31, 2, 'Arrival', 'arrival', 'Seorang ahli bahasa direkrut militer untuk berkomunikasi dengan makhluk luar angkasa yang tiba di Bumi.', 7.9, '2016', 116, 'USA', 'English', 'Amy Adams, Jeremy Renner, Forest Whitaker', 'Denis Villeneuve', 'https://image.tmdb.org/t/p/w500/x2FJsf1ElAgr63Y3PNPtJrcmpoe.jpg', 'https://www.youtube.com/embed/tFMo3UJ4B4g', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(32, 2, 'Edge of Tomorrow', 'edge-of-tomorrow', 'Seorang tentara terjebak dalam lingkaran waktu saat melawan invasi alien.', 7.9, '2014', 113, 'USA', 'English', 'Tom Cruise, Emily Blunt, Bill Paxton', 'Doug Liman', 'https://image.tmdb.org/t/p/w500/uUHvlkLavotfGsNtosDy8ShsIYF.jpg', 'https://www.youtube.com/embed/vw61gCe2oqI', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(33, 1, 'Gladiator', 'gladiator', 'Seorang jenderal Romawi dikhianati dan menjadi gladiator demi membalas dendam.', 8.5, '2000', 155, 'USA', 'English', 'Russell Crowe, Joaquin Phoenix, Connie Nielsen', 'Ridley Scott', 'https://image.tmdb.org/t/p/w500/ty8TGRuvJLPUmAR1H1nRIsgwvim.jpg', 'https://www.youtube.com/embed/owK1qxDselE', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(34, 1, 'Top Gun: Maverick', 'top-gun-maverick', 'Pete Maverick Mitchell kembali melatih generasi baru pilot tempur elit.', 8.2, '2022', 130, 'USA', 'English', 'Tom Cruise, Miles Teller, Jennifer Connelly', 'Joseph Kosinski', 'https://image.tmdb.org/t/p/w500/62HCnUTziyWcpDaBO2i1DX17ljH.jpg', 'https://www.youtube.com/embed/giXco2jaZ_4', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(35, 3, 'The Nun', 'the-nun', 'Seorang pastor dan novis menyelidiki bunuh diri misterius di biara terpencil.', 5.3, '2018', 96, 'USA', 'English', 'Taissa Farmiga, Demián Bichir, Jonas Bloquet', 'Corin Hardy', 'https://image.tmdb.org/t/p/w500/sFC1ElvoKGdHJIWRpNB3xWJ9lJA.jpg', 'https://www.youtube.com/embed/pzD9zGcUNrw', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(36, 3, 'Insidious', 'insidious', 'Keluarga mencoba menyelamatkan putra mereka dari dunia roh jahat.', 6.8, '2010', 103, 'USA', 'English', 'Patrick Wilson, Rose Byrne, Ty Simpkins', 'James Wan', 'https://upload.wikimedia.org/wikipedia/en/2/2d/Insidious_poster.jpg', 'https://www.youtube.com/embed/zuZnRUcoWos', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(37, 4, 'The Green Mile', 'the-green-mile', 'Sipir penjara menemukan bahwa narapidana misterius memiliki kekuatan supranatural.', 8.6, '1999', 189, 'USA', 'English', 'Tom Hanks, Michael Clarke Duncan, David Morse', 'Frank Darabont', 'https://image.tmdb.org/t/p/w500/velWPhVMQeQKcxggNEU8YmIo52R.jpg', 'https://www.youtube.com/embed/Ki4haFrqSrw', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(38, 4, 'Whiplash', 'whiplash', 'Seorang drummer muda menghadapi instruktur musik yang sangat keras.', 8.5, '2014', 106, 'USA', 'English', 'Miles Teller, J.K. Simmons, Melissa Benoist', 'Damien Chazelle', 'https://image.tmdb.org/t/p/w500/7fn624j5lj3xTme2SgiLCeuedmO.jpg', 'https://www.youtube.com/embed/7d_jQycdQGo', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(39, 5, 'Zodiac', 'zodiac', 'Kartunis surat kabar menjadi terobsesi mengungkap identitas pembunuh Zodiac.', 7.7, '2007', 157, 'USA', 'English', 'Jake Gyllenhaal, Robert Downey Jr., Mark Ruffalo', 'David Fincher', 'https://image.tmdb.org/t/p/w500/6YmeO4pB7XTh8P8F960O1uA14JO.jpg', 'https://www.youtube.com/embed/yNncHPl1UXg', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(40, 5, 'Nightcrawler', 'nightcrawler', 'Seorang pria masuk ke dunia jurnalisme kriminal malam di Los Angeles.', 7.8, '2014', 117, 'USA', 'English', 'Jake Gyllenhaal, Rene Russo, Riz Ahmed', 'Dan Gilroy', 'https://image.tmdb.org/t/p/w500/j9HrX8f7GbZQm1BrBiR40uFQZSb.jpg', 'https://www.youtube.com/embed/u1uP_8VJkDQ', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(41, 6, 'Coco', 'coco', 'Anak laki-laki bercita-cita menjadi musisi dan memasuki dunia arwah.', 8.4, '2017', 105, 'USA', 'English', 'Anthony Gonzalez, Gael García Bernal, Benjamin Bratt', 'Lee Unkrich', 'https://image.tmdb.org/t/p/w500/gGEsBPAijhVUFoiNpgZXqRVWJt2.jpg', 'https://www.youtube.com/embed/Rvr68u6k5sI', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(42, 6, 'Finding Nemo', 'finding-nemo', 'Ikan badut mencari putranya yang hilang di lautan luas.', 8.2, '2003', 100, 'USA', 'English', 'Albert Brooks, Ellen DeGeneres, Alexander Gould', 'Andrew Stanton', 'https://image.tmdb.org/t/p/w500/eHuGQ10FUzK1mdOY69wF5pGgEf5.jpg', 'https://www.youtube.com/embed/wZdpNglLbt8', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(43, 7, 'Pirates of the Caribbean: The Curse of the Black Pearl', 'pirates-of-the-caribbean-the-curse-of-the-black-pearl', 'Kapten Jack Sparrow mencari kapal Black Pearl yang dicuri.', 8.1, '2003', 143, 'USA', 'English', 'Johnny Depp, Orlando Bloom, Keira Knightley', 'Gore Verbinski', 'https://image.tmdb.org/t/p/w500/z8onk7LV9Mmw6zKz4hT6pzzvmvl.jpg', 'https://www.youtube.com/embed/naQr0uTrH_s', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(44, 8, 'Harry Potter and the Sorcerer\'s Stone', 'harry-potter-and-the-sorcerers-stone', 'Harry Potter menemukan bahwa dirinya adalah seorang penyihir.', 7.6, '2001', 152, 'UK', 'English', 'Daniel Radcliffe, Emma Watson, Rupert Grint', 'Chris Columbus', 'https://image.tmdb.org/t/p/w500/wuMc08IPKEatf9rnMNXvIDxqP4W.jpg', 'https://www.youtube.com/embed/VyHV0BRtdxo', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(45, 8, 'Doctor Strange', 'doctor-strange', 'Seorang ahli bedah mempelajari seni mistis setelah kecelakaan tragis.', 7.5, '2016', 115, 'USA', 'English', 'Benedict Cumberbatch, Chiwetel Ejiofor, Rachel McAdams', 'Scott Derrickson', 'https://image.tmdb.org/t/p/w500/uGBVj3bEbCoZbDjjl9wTxcygko1.jpg', 'https://www.youtube.com/embed/HSzx-zryEgM', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(46, 2, 'Gravity', 'gravity', 'Dua astronot berusaha bertahan hidup setelah kecelakaan di luar angkasa.', 7.7, '2013', 91, 'USA', 'English', 'Sandra Bullock, George Clooney, Ed Harris', 'Alfonso Cuarón', 'https://image.tmdb.org/t/p/w500/kZ2nZw8D681aphje8NJi8EfbL1U.jpg', 'https://www.youtube.com/embed/OiTiKOy59o4', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(47, 1, 'Logan', 'logan', 'Wolverine tua melindungi mutan muda misterius dari ancaman berbahaya.', 8.1, '2017', 137, 'USA', 'English', 'Hugh Jackman, Patrick Stewart, Dafne Keen', 'James Mangold', 'https://image.tmdb.org/t/p/w500/fnbjcRDYn6YviCcePDnGdyAkYsB.jpg', 'https://www.youtube.com/embed/Div0iP65aZo', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(48, 4, 'La La Land', 'la-la-land', 'Musisi jazz dan aktris muda jatuh cinta sambil mengejar mimpi mereka.', 8.0, '2016', 128, 'USA', 'English', 'Ryan Gosling, Emma Stone, John Legend', 'Damien Chazelle', 'https://image.tmdb.org/t/p/w500/uDO8zWDhfWwoFdKS4fzkUJt0Rf0.jpg', 'https://www.youtube.com/embed/0pdqf4P9MB8', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(49, 5, 'Black Swan', 'black-swan', 'Penari balet mengalami tekanan mental saat mempersiapkan pertunjukan besar.', 8.0, '2010', 108, 'USA', 'English', 'Natalie Portman, Mila Kunis, Vincent Cassel', 'Darren Aronofsky', 'https://image.tmdb.org/t/p/w500/viWheBd44bouiLCHgNMvahLThqx.jpg', 'https://www.youtube.com/embed/5jaI1XOB-bs', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(50, 6, 'Up', 'up', 'Seorang kakek menerbangkan rumahnya dengan balon menuju Amerika Selatan.', 8.3, '2009', 96, 'USA', 'English', 'Ed Asner, Christopher Plummer, Jordan Nagai', 'Pete Docter', 'https://image.tmdb.org/t/p/w500/vpbaStTMt8qqXaEgnOR2EE4DNJk.jpg', 'https://www.youtube.com/embed/HWEW_qTLSEE', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(51, 7, 'Jumanji', 'jumanji', 'Permainan papan ajaib membawa petualangan liar ke dunia nyata.', 7.1, '1995', 104, 'USA', 'English', 'Robin Williams, Kirsten Dunst, Bonnie Hunt', 'Joe Johnston', 'https://image.tmdb.org/t/p/w500/vgpXmVaVyUL7GGiDeiK1mKEKzcX.jpg', 'https://www.youtube.com/embed/eTjDsENDZ6s', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(52, 8, 'Pan\'s Labyrinth', 'pans-labyrinth', 'Seorang gadis muda menemukan dunia fantasi gelap di Spanyol pasca perang.', 8.2, '2006', 118, 'Spain', 'Spanish', 'Ivana Baquero, Sergi López, Maribel Verdú', 'Guillermo del Toro', 'https://upload.wikimedia.org/wikipedia/en/6/67/Pan%27s_Labyrinth.jpg', 'https://www.youtube.com/embed/jVZRnnVSQ8k', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(53, 2, 'Ex Machina', 'ex-machina', 'Programmer muda menguji kecerdasan buatan humanoid canggih.', 7.7, '2014', 108, 'UK', 'English', 'Alicia Vikander, Domhnall Gleeson, Oscar Isaac', 'Alex Garland', 'https://image.tmdb.org/t/p/w500/dmJW8IAKHKxFNiUnoDR7JfsK7Rp.jpg', 'https://www.youtube.com/embed/EoQuVnKhxaM', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(54, 1, 'Casino Royale', 'casino-royale', 'James Bond menghadapi teroris finansial dalam misi pertamanya sebagai agen 007.', 8.0, '2006', 144, 'UK', 'English', 'Daniel Craig, Eva Green, Mads Mikkelsen', 'Martin Campbell', 'https://image.tmdb.org/t/p/w500/lMrxYKKhd4lqRzwUHAy5gcx9PSO.jpg', 'https://www.youtube.com/embed/36mnx8dBbGE', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(55, 3, 'Smile', 'smile', 'Psikiater mengalami kejadian menyeramkan setelah menyaksikan tragedi aneh.', 6.5, '2022', 115, 'USA', 'English', 'Sosie Bacon, Jessie T. Usher, Kyle Gallner', 'Parker Finn', 'https://image.tmdb.org/t/p/w500/aPqcQwu4VGEewPhagWNncDbJ9Xp.jpg', 'https://www.youtube.com/embed/BcDK7lkzzsU', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(56, 4, 'The Pursuit of Happyness', 'the-pursuit-of-happyness', 'Ayah tunggal berjuang keluar dari kemiskinan demi masa depan anaknya.', 8.0, '2006', 117, 'USA', 'English', 'Will Smith, Jaden Smith, Thandiwe Newton', 'Gabriele Muccino', 'https://image.tmdb.org/t/p/w500/oyG9TL7FcRP4EZ9Vid6uKzwdndz.jpg', 'https://www.youtube.com/embed/89Kq8SDyvfg', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(57, 5, 'Source Code', 'source-code', 'Tentara masuk ke simulasi untuk mencegah serangan bom kereta.', 7.5, '2011', 93, 'USA', 'English', 'Jake Gyllenhaal, Michelle Monaghan, Vera Farmiga', 'Duncan Jones', 'https://upload.wikimedia.org/wikipedia/en/e/e5/Source_Code_Poster.jpg', 'https://www.youtube.com/embed/mnJegNyAb1w', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(58, 6, 'How to Train Your Dragon', 'how-to-train-your-dragon', 'Remaja Viking berteman dengan naga yang seharusnya diburu.', 8.1, '2010', 98, 'USA', 'English', 'Jay Baruchel, Gerard Butler, America Ferrera', 'Chris Sanders, Dean DeBlois', 'https://image.tmdb.org/t/p/w500/ygGmAO60t8GyqUo9xYeYxSZAR3b.jpg', 'https://www.youtube.com/embed/oKiYuIsPxYk', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(59, 7, 'The Revenant', 'the-revenant', 'Penjelajah bertahan hidup di alam liar setelah dikhianati rekannya.', 8.0, '2015', 156, 'USA', 'English', 'Leonardo DiCaprio, Tom Hardy, Domhnall Gleeson', 'Alejandro G. Iñárritu', 'https://upload.wikimedia.org/wikipedia/en/b/b6/The_Revenant_2015_film_poster.jpg', 'https://www.youtube.com/embed/LoebZZ8K5N0', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(60, 8, 'Fantastic Beasts and Where to Find Them', 'fantastic-beasts-and-where-to-find-them', 'Penyihir eksentrik membawa makhluk ajaib ke New York.', 7.2, '2016', 133, 'UK', 'English', 'Eddie Redmayne, Katherine Waterston, Dan Fogler', 'David Yates', 'https://image.tmdb.org/t/p/w500/fLsaFKExQt05yqjoAvKsmOMYvJR.jpg', 'https://www.youtube.com/embed/ViuDsy7yb8M', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(61, 2, 'Ready Player One', 'ready-player-one', 'Remaja ikut perlombaan virtual demi mewarisi dunia OASIS.', 7.4, '2018', 140, 'USA', 'English', 'Tye Sheridan, Olivia Cooke, Ben Mendelsohn', 'Steven Spielberg', 'https://image.tmdb.org/t/p/w500/pU1ULUq8D3iRxl1fdX2lZIzdHuI.jpg', 'https://www.youtube.com/embed/cSp1dM2Vj48', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(62, 4, 'The Social Network', 'the-social-network', 'Kisah berdirinya Facebook dan konflik hukum di baliknya.', 7.8, '2010', 120, 'USA', 'English', 'Jesse Eisenberg, Andrew Garfield, Justin Timberlake', 'David Fincher', 'https://image.tmdb.org/t/p/w500/n0ybibhJtQ5icDqTp8eRytcIHJx.jpg', 'https://www.youtube.com/embed/lB95KLmpLR4', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(63, 1, 'The Raid: Redemption', 'the-raid-redemption', 'Pasukan elit kepolisian terperangkap di sebuah gedung apartemen kumuh yang dikuasai oleh gembong narkoba kejam.', 7.6, '2012', 101, 'Indonesia', 'Indonesian', 'Iko Uwais, Joe Taslim, Yayan Ruhian', 'Gareth Evans', 'https://image.tmdb.org/t/p/w500/xJUe2T9FqaNjsYoeAxtfZw2S80u.jpg', 'https://www.youtube.com/embed/mkwz_O1P0X0', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(64, 1, 'Gundala', 'gundala', 'Sancaka, seorang yatim piatu jalanan yang keras, bangkit menjadi pahlawan berkekuatan petir bagi rakyat tertindas.', 6.1, '2019', 123, 'Indonesia', 'Indonesian', 'Abimana Aryasatya, Tara Basro, Bront Palarae', 'Joko Anwar', 'https://image.tmdb.org/t/p/w500/wZCo5qUz3IdIhs6466B9PpFglXU.jpg', 'https://www.youtube.com/embed/z1XqPnsY4z8', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(65, 1, 'Wiro Sableng 212', 'wiro-sableng-212', 'Wiro Sableng diutus gurunya, Sinto Gendeng, untuk menangkap murid pengkhianat bernama Mahesa Birawa.', 6.8, '2018', 123, 'Indonesia', 'Indonesian', 'Vino G. Bastian, Sherina Munaf, Marsha Timothy', 'Angga Dwimas Sasongko', 'https://image.tmdb.org/t/p/w500/kt4Clr3qq4NIXU6ijhDaoXOQqOn.jpg', 'https://www.youtube.com/embed/bQvjYvD2gKw', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(66, 1, 'Mencuri Raden Saleh', 'mencuri-raden-saleh', 'Sekelompok mahasiswa amatir merencanakan pencurian lukisan legendaris Raden Saleh di Istana Negara.', 8.2, '2022', 154, 'Indonesia', 'Indonesian', 'Iqbaal Ramadhan, Angga Yunanda, Rachel Amanda', 'Angga Dwimas Sasongko', 'https://image.tmdb.org/t/p/w500/1fdqRcgEYNkXCnnKAzz2JtFnUv7.jpg', 'https://www.youtube.com/embed/8A8iB-Ntc00', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(67, 3, 'Pengabdi Setan', 'pengabdi-setan', 'Sepeninggal ibunya, sebuah keluarga mengalami rangkaian kejadian mistis dan menyadari ibu mereka kembali menjemput.', 7.5, '2017', 106, 'Indonesia', 'Indonesian', 'Tara Basro, Bront Palarae, Ayu Laksmi', 'Joko Anwar', 'https://image.tmdb.org/t/p/w500/AlE91MwxmMYD27y2OemZMr38tAk.jpg', 'https://www.youtube.com/embed/0hShtjacEkw', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(68, 3, 'Perempuan Tanah Jahanam', 'perempuan-tanah-jahanam', 'Maya mengunjungi desa asalnya mencari warisan, tanpa tahu desa itu mengutuk kehadirannya demi mengakhiri petaka.', 6.6, '2019', 106, 'Indonesia', 'Indonesian', 'Tara Basro, Marissa Anita, Ario Bayu', 'Joko Anwar', 'https://image.tmdb.org/t/p/w500/tAYHRuKxNa4arD32YTmDT1j46Mi.jpg', 'https://www.youtube.com/embed/mKkR1gQ2t9E', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(69, 3, 'KKN di Desa Penari', 'kkn-di-desa-penari', 'Mahasiswa KKN di desa terpencil melanggar pantangan adat, mengundang teror mistis penari mistis.', 5.8, '2022', 130, 'Indonesia', 'Indonesian', 'Tissa Biani, Adinda Thomas, Achmad Megantara', 'Awi Suryadi', 'https://image.tmdb.org/t/p/w500/63InZxeGgfNQCoWkImR14fB99AY.jpg', 'https://www.youtube.com/embed/xKJmEC5ieOk', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(70, 3, 'Ratu Ilmu Hitam', 'ratu-ilmu-hitam', 'Tiga keluarga bernostalgia mengunjungi panti asuhan masa kecil mereka, yang perlahan dipenuhi siksaan santet mematikan.', 6.5, '2019', 99, 'Indonesia', 'Indonesian', 'Ario Bayu, Hannah Al Rashid, Adhisty Zara', 'Kimo Stamboel', 'https://image.tmdb.org/t/p/w500/kOyoznU5d6BKMrpUQbXjsCG3dMb.jpg', 'https://www.youtube.com/embed/V6wWKNij_1M', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(71, 3, 'Sewu Dino', 'sewu-dino', 'Sri diterima bekerja memandikan Dela Atmojo, korban santet 1000 hari yang terikat di gubuk misterius tengah hutan.', 6.2, '2023', 121, 'Indonesia', 'Indonesian', 'Mikha Tambayong, Rio Dewanto, Givina Lukita', 'Kimo Stamboel', 'https://image.tmdb.org/t/p/w500/fMaxCjekSd9g4qyyAEYm3cvckui.jpg', 'https://www.youtube.com/embed/zSWdZVtXT7E', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(72, 3, 'Siksa Kubur', 'siksa-kubur', 'Sita tidak mempercayai agama pasca-ledakan bom, lalu ia masuk ke dalam liang kubur kriminal demi membuktikannya.', 6.9, '2024', 117, 'Indonesia', 'Indonesian', 'Faradina Mufti, Reza Rahadian, Happy Salma', 'Joko Anwar', 'https://image.tmdb.org/t/p/w500/aBNkuQxJuWiaMjgXfyoVCJC9Blc.jpg', 'https://www.youtube.com/embed/2Dkw1nJf8Vg', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(73, 4, 'Ada Apa Dengan Cinta?', 'ada-apa-dengan-cinta', 'Gadis populer Cinta bergejolak perasaannya setelah mengenal Rangga, pemuda puitis yang idealis.', 7.7, '2002', 112, 'Indonesia', 'Indonesian', 'Dian Sastrowardoyo, Nicholas Saputra, Titi Kamal', 'Rudi Soedjarwo', 'https://image.tmdb.org/t/p/w500/gOiBEEK6C0ZB5r7SXt1zD1YV7rg.jpg', 'https://www.youtube.com/embed/bLvqoHBptjg', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(74, 4, 'Dilan 1990', 'dilan-1990', 'Milea bernostalgia tentang romansa manisnya bersama Dilan, panglima tempur geng motor di Bandung.', 7.1, '2018', 109, 'Indonesia', 'Indonesian', 'Iqbaal Ramadhan, Vanesha Prescilla, Giulio Parengkuan', 'Fajar Bustomi, Pidi Baiq', 'https://image.tmdb.org/t/p/w500/eitRZXfbw6rO0CfP3lPaGgK63qr.jpg', 'https://www.youtube.com/embed/qtRKdVHc-cE', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(75, 4, 'Dua Garis Biru', 'dua-garis-biru', 'Bima dan Dara harus menghadapi konsekuensi berat, penghakiman, dan ujian kedewasaan ketika Dara hamil di luar nikah.', 7.9, '2019', 112, 'Indonesia', 'Indonesian', 'Angga Yunanda, Adhisty Zara, Lulu Tobing', 'Gina S. Noer', 'https://image.tmdb.org/t/p/w500/mSkrNJ6xjA8rcrR0hGEJzDl8C5V.jpg', 'https://www.youtube.com/embed/dlnmQbPGuls', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(76, 4, 'Keluarga Cemara', 'keluarga-cemara', 'Keluarga Abah berjuang bertahan hidup di kampung halaman setelah rumah megah mereka disita akibat ditipu.', 7.6, '2019', 110, 'Indonesia', 'Indonesian', 'Ringgo Agus Rahman, Nirina Zubir, Adhisty Zara', 'Yandy Laurens', 'https://image.tmdb.org/t/p/w500/1fHxOly9EWy1cahwIsmcE7k7CT.jpg', 'https://www.youtube.com/embed/TEN-2uTi2c0', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(77, 4, 'Budi Pekerti', 'budi-pekerti', 'Bu Prani, guru BK, dikucilkan secara sosial setelah video adu mulutnya di pasar menjadi viral liar di media sosial.', 7.8, '2023', 110, 'Indonesia', 'Indonesian', 'Sha Ine Febriyanti, Angga Yunanda, Prilly Latuconsina', 'Wregas Bhanuteja', 'https://image.tmdb.org/t/p/w500/hHaYrp6kGhe9akB9AVAkMY43mvH.jpg', 'https://www.youtube.com/embed/WFJgUm7iOKw', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(78, 4, 'Habibie & Ainun', 'habibie-ainun', 'Kisah cinta abadi B.J. Habibie dan belahan jiwanya, Ainun, yang mengawal takdir hingga ajal menjemput.', 7.6, '2012', 125, 'Indonesia', 'Indonesian', 'Reza Rahadian, Bunga Citra Lestari, Tio Pakusadewo', 'Faozan Rizal', 'https://image.tmdb.org/t/p/w500/eOdYhBFF7vE5v83KVVQfDEyLgEu.jpg', 'https://www.youtube.com/embed/gG22XNhtnoY', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(79, 4, 'Sore: Istri dari Masa Depan', 'sore-istri-dari-masa-depan', 'Jonathan terkejut didatangi wanita mandiri Sore, yang melintasi dimensi waktu mengaku sebagai istrinya.', 8.5, '2025', 119, 'Indonesia', 'Indonesian', 'Dion Wiyoko, Tika Bravani', 'Yandy Laurens', 'https://image.tmdb.org/t/p/w500/u4pNXPmBuYeTtksakUCZgJ1zpSB.jpg', 'https://www.youtube.com/embed/d2m2vU2ZofY', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(80, 4, 'Bila Esok Ibu Tiada', 'bila-esok-ibu-tiada', 'Kisah emosional seputar pengorbanan seorang ibu dalam menyatukan keempat anaknya sebelum ia wafat.', 8.0, '2024', 104, 'Indonesia', 'Indonesian', 'Nungki Kusumastuti, Fedi Nuril, Amanda Manopo', 'Rudy Soedjarwo', 'https://upload.wikimedia.org/wikipedia/id/d/dc/Poster_BEIT.jpg', 'https://www.youtube.com/embed/TEN-2uTi2c0', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(81, 2, 'The Creator', 'the-creator', 'Seorang mantan agen pasukan khusus ditugaskan memburu pencipta AI canggih yang dapat mengubah masa depan umat manusia.', 7.0, '2023', 133, 'USA', 'English', 'John David Washington, Gemma Chan, Madeleine Yuna Voyles', 'Gareth Edwards', 'https://image.tmdb.org/t/p/w500/vBZ0qvaRxqEhZwl6LWmruJqWE8Z.jpg', 'https://www.youtube.com/embed/ex3C1-5Dhb8', '2026-05-29 22:28:03', '2026-05-29 22:28:03'),
(82, 2, 'Moon', 'moon', 'Seorang pekerja tambang bulan yang hampir menyelesaikan kontraknya menemukan rahasia mengejutkan tentang dirinya.', 7.8, '2009', 97, 'UK', 'English', 'Sam Rockwell, Kevin Spacey, Dominique McElligott', 'Duncan Jones', 'https://upload.wikimedia.org/wikipedia/en/a/af/Moon_%282009_film%29.jpg', 'https://www.youtube.com/embed/H2eY_5F6EFE', '2026-05-29 22:28:04', '2026-05-29 22:28:04'),
(83, 4, 'The Iron Claw', 'the-iron-claw', 'Kisah nyata dari saudara-saudara Von Erich, yang mengukir sejarah luar biasa di dunia gulat profesional tahun 1980-an.', 7.7, '2023', 132, 'USA', 'English', 'Zac Efron, Jeremy Allen White, Harris Dickinson', 'Sean Durkin', 'https://upload.wikimedia.org/wikipedia/en/3/3a/Iron_claw_film_posterjpg.jpg', 'https://www.youtube.com/embed/8KVsaoveTbw', '2026-05-29 22:28:04', '2026-05-29 22:28:04'),
(84, 6, 'Flow', 'flow', 'Seekor kucing harus bertahan hidup di dunia yang dilanda banjir besar bersama berbagai hewan lain.', 8.0, '2024', 85, 'Latvia', 'No Dialogue', 'N/A', 'Gints Zilbalodis', 'https://image.tmdb.org/t/p/w500/imKSymKBK7o73sajciEmndJoVkR.jpg', 'https://www.youtube.com/embed/l5zSgSuIDU4', '2026-05-29 22:28:04', '2026-05-29 22:28:04'),
(85, 5, 'Civil War', 'civil-war', 'Perjalanan menegangkan sekelompok jurnalis militer melintasi Amerika Serikat yang sedang dilanda perang saudara brutal.', 7.0, '2024', 109, 'USA', 'English', 'Kirsten Dunst, Wagner Moura, Cailee Spaeny', 'Alex Garland', 'https://upload.wikimedia.org/wikipedia/en/0/0d/Civil_War_2024_film_poster.jpeg', 'https://www.youtube.com/embed/aDyQxtg0V2w', '2026-05-29 22:28:04', '2026-05-29 22:28:04'),
(86, 5, 'Trap', 'trap', 'Seorang ayah menemani putrinya ke konser musik pop besar, yang ternyata adalah perangkap polisi untuk menangkapnya.', 6.2, '2024', 105, 'USA', 'English', 'Josh Hartnett, Ariel Donoghue, Saleka Shyamalan', 'M. Night Shyamalan', 'https://upload.wikimedia.org/wikipedia/en/5/5e/Trap_2024_%28film_poster%29.jpg', 'https://www.youtube.com/embed/eX3C1-5Dhb8', '2026-05-29 22:28:04', '2026-05-29 22:28:04'),
(87, 1, 'Furiosa: A Mad Max Saga', 'furiosa-a-mad-max-saga', 'Kisah asal usul prajurit pemberontak Furiosa sebelum ia bertemu dengan Mad Max di padang gurun tandus.', 7.6, '2024', 148, 'Australia', 'English', 'Anya Taylor-Joy, Chris Hemsworth, Tom Burke', 'George Miller', 'https://upload.wikimedia.org/wikipedia/en/3/34/Furiosa_A_Mad_Max_Saga.jpg', 'https://www.youtube.com/embed/XJMuhwVlca4', '2026-05-29 22:28:04', '2026-05-29 22:28:04'),
(88, 1, 'Monkey Man', 'monkey-man', 'Seorang pemuda tanpa nama memulai kampanye balas dendam mematikan terhadap para pemimpin korup.', 7.0, '2024', 121, 'Canada', 'English', 'Dev Patel, Sharlto Copley, Sobhita Dhulipala', 'Dev Patel', 'https://upload.wikimedia.org/wikipedia/en/2/2b/Monkey_Man_film.jpg', 'https://www.youtube.com/embed/gCcx85zbxz4', '2026-05-29 22:28:04', '2026-05-29 22:28:04'),
(89, 3, 'The Substance', 'the-substance', 'Seorang selebriti yang menua menggunakan obat terlarang untuk membelah dirinya menjadi versi yang lebih muda dan sempurna.', 7.8, '2024', 140, 'UK', 'English', 'Demi Moore, Margaret Qualley, Dennis Quaid', 'Coralie Fargeat', 'https://cdn.moviefone.com/image-assets/933260/lqoMzCcZYEFK729d6qzt349fB4o.jpg?d=360x540&q=80', 'https://www.youtube.com/embed/gajva2L0rPY', '2026-05-29 22:28:04', '2026-05-29 22:28:04'),
(90, 3, 'A Quiet Place: Day One', 'a-quiet-place-day-one', 'Kisah hari pertama ketika monster asing dengan pendengaran tajam menginvasi kota New York yang bising.', 6.9, '2024', 99, 'USA', 'English', 'Lupita Nyongo, Joseph Quinn, Alex Wolff', 'Michael Sarnoski', 'https://image.tmdb.org/t/p/w500/7fn624j5lj3xTme2SgiLCeuedmO.jpg', 'https://www.youtube.com/embed/WR7cc5t7tv8', '2026-05-29 22:28:04', '2026-05-29 22:28:04'),
(91, 2, 'Looper', 'looper', 'Pembunuh bayaran yang bekerja untuk organisasi perjalanan waktu harus menghadapi versi dirinya dari masa depan.', 7.4, '2012', 119, 'USA', 'English', 'Joseph Gordon-Levitt, Bruce Willis, Emily Blunt', 'Rian Johnson', 'https://image.tmdb.org/t/p/w500/sNjL6SqErDBE8OUZlrDLkexfsCj.jpg', 'https://www.youtube.com/embed/2iQuhsmtfHw', '2026-05-29 22:28:04', '2026-05-29 22:28:04'),
(92, 2, 'Children of Men', 'children-of-men', 'Di masa depan ketika manusia tidak lagi bisa bereproduksi, seorang pria harus melindungi wanita yang mungkin menjadi harapan terakhir umat manusia.', 7.9, '2006', 109, 'UK', 'English', 'Clive Owen, Julianne Moore, Michael Caine', 'Alfonso Cuaron', 'https://facts.net/wp-content/uploads/2023/06/40-facts-about-the-movie-children-of-men-1687514422.jpg', 'https://www.youtube.com/embed/2VT2apoX90o', '2026-05-29 22:28:04', '2026-05-29 22:28:04'),
(93, 1, 'Bullet Train', 'bullet-train', 'Seorang pembunuh bayaran mendapati misinya terhubung dengan beberapa penjahat lain di kereta cepat Jepang.', 7.3, '2022', 126, 'USA', 'English', 'Brad Pitt, Joey King, Aaron Taylor-Johnson', 'David Leitch', 'https://image.tmdb.org/t/p/w500/j8szC8OgrejDQjjMKSVXyaAjw3V.jpg', 'https://www.youtube.com/embed/0IOsk2Vlc4o', '2026-05-29 22:28:04', '2026-05-29 22:28:04'),
(94, 1, 'Nobody', 'nobody', 'Pria biasa yang diremehkan keluarganya mengungkap masa lalu kelamnya setelah rumahnya dirampok.', 7.4, '2021', 92, 'USA', 'English', 'Bob Odenkirk, Connie Nielsen, Aleksey Serebryakov', 'Ilya Naishuller', 'https://image.tmdb.org/t/p/w500/oBgWY00bEFeZ9N25wWVyuQddbAo.jpg', 'https://www.youtube.com/embed/wZti8QKBWPo', '2026-05-29 22:28:04', '2026-05-29 22:28:04'),
(95, 1, 'The Fall Guy', 'the-fall-guy', 'Seorang stuntman kembali bekerja dan terlibat dalam misteri hilangnya aktor terkenal.', 7.0, '2024', 126, 'USA', 'English', 'Ryan Gosling, Emily Blunt, Aaron Taylor-Johnson', 'David Leitch', 'https://image.tmdb.org/t/p/w500/aBkqu7EddWK7qmY4grL4I6edx2h.jpg', 'https://www.youtube.com/embed/j7jPnwVGdZ8', '2026-05-29 22:28:04', '2026-05-29 22:28:04'),
(96, 1, 'Mission: Impossible - Dead Reckoning Part One', 'mission-impossible-dead-reckoning-part-one', 'Ethan Hunt menghadapi ancaman kecerdasan buatan yang dapat menguasai dunia.', 7.7, '2023', 163, 'USA', 'English', 'Tom Cruise, Hayley Atwell, Ving Rhames', 'Christopher McQuarrie', 'https://image.tmdb.org/t/p/w500/NNxYkU70HPurnNCSiCjYAmacwm.jpg', 'https://www.youtube.com/embed/avz06PDqDbM', '2026-05-29 22:28:04', '2026-05-29 22:28:04'),
(97, 4, 'Green Book', 'green-book', 'Persahabatan antara pianis kulit hitam dan sopirnya tumbuh selama tur konser di Amerika Selatan.', 8.2, '2018', 130, 'USA', 'English', 'Viggo Mortensen, Mahershala Ali, Linda Cardellini', 'Peter Farrelly', 'https://image.tmdb.org/t/p/w500/7BsvSuDQuoqhWmU2fL7W2GOcZHU.jpg', 'https://www.youtube.com/embed/QkZxoko_HC0', '2026-05-29 22:28:04', '2026-05-29 22:28:04'),
(98, 4, 'CODA', 'coda', 'Remaja yang menjadi satu-satunya anggota keluarga yang bisa mendengar harus memilih antara keluarga dan mimpinya.', 8.0, '2021', 111, 'USA', 'English', 'Emilia Jones, Marlee Matlin, Troy Kotsur', 'Sian Heder', 'https://image.tmdb.org/t/p/w500/BzVjmm8l23rPsijLiNLUzuQtyd.jpg', 'https://www.youtube.com/embed/0pmfrE1YL4I', '2026-05-29 22:28:04', '2026-05-29 22:28:04'),
(99, 4, 'The Whale', 'the-whale', 'Seorang guru yang mengalami obesitas berat berusaha memperbaiki hubungannya dengan putrinya.', 7.7, '2022', 117, 'USA', 'English', 'Brendan Fraser, Sadie Sink, Hong Chau', 'Darren Aronofsky', 'https://image.tmdb.org/t/p/w500/jQ0gylJMxWSL490sy0RrPj1Lj7e.jpg', 'https://www.youtube.com/embed/nWiQodhMvz4', '2026-05-29 22:28:04', '2026-05-29 22:28:04'),
(100, 4, 'The Fabelmans', 'the-fabelmans', 'Kisah masa muda seorang pembuat film yang terinspirasi oleh pengalaman keluarganya.', 7.5, '2022', 151, 'USA', 'English', 'Gabriel LaBelle, Michelle Williams, Paul Dano', 'Steven Spielberg', 'https://image.tmdb.org/t/p/w500/d2IywyOPS78vEnJvwVqkVRTiNC1.jpg', 'https://www.youtube.com/embed/D1G2iLSzOe8', '2026-05-29 22:28:04', '2026-05-29 22:28:04'),
(101, 5, 'The Menu', 'the-menu', 'Pasangan muda menghadiri jamuan eksklusif yang ternyata menyimpan kejutan mengerikan.', 7.2, '2022', 107, 'USA', 'English', 'Ralph Fiennes, Anya Taylor-Joy, Nicholas Hoult', 'Mark Mylod', 'https://image.tmdb.org/t/p/w500/v31MsWhF9WFh7Qooq6xSBbmJxoG.jpg', 'https://www.youtube.com/embed/C_uTkUGcHv4', '2026-05-29 22:28:04', '2026-05-29 22:28:04'),
(102, 5, 'Wind River', 'wind-river', 'Agen FBI bekerja sama dengan pemburu lokal untuk menyelidiki pembunuhan di reservasi Indian.', 7.7, '2017', 107, 'USA', 'English', 'Jeremy Renner, Elizabeth Olsen, Graham Greene', 'Taylor Sheridan', 'https://image.tmdb.org/t/p/w500/pySivdR845Hom4u4T2WNkJxe6Ad.jpg', 'https://youtu.be/W7V9Fsll5qM?si=NeOyiZle0vGeHojY', '2026-05-29 22:28:04', '2026-05-29 22:28:04'),
(103, 5, 'Nocturnal Animals', 'nocturnal-animals', 'Seorang wanita menerima naskah novel dari mantan suaminya yang membangkitkan masa lalu kelam.', 7.5, '2016', 116, 'USA', 'English', 'Amy Adams, Jake Gyllenhaal, Michael Shannon', 'Tom Ford', 'https://upload.wikimedia.org/wikipedia/en/b/b0/Nocturnal_Animals_Poster.jpg', 'https://www.youtube.com/embed/-H1Ii1LjyFU', '2026-05-29 22:28:04', '2026-05-29 22:28:04'),
(104, 5, 'The Killer', 'the-killer', 'Seorang pembunuh profesional memburu orang-orang yang telah mengkhianatinya.', 6.7, '2023', 118, 'USA', 'English', 'Michael Fassbender, Tilda Swinton, Arliss Howard', 'David Fincher', 'https://image.tmdb.org/t/p/w500/e7Jvsry47JJQruuezjU2X1Z6J77.jpg', 'https://www.youtube.com/embed/vs1epO_zLG8', '2026-05-29 22:28:04', '2026-05-29 22:28:04'),
(105, 6, 'Soul', 'soul', 'Musisi jazz yang bercita-cita tinggi mengalami petualangan spiritual setelah kecelakaan tak terduga.', 8.0, '2020', 100, 'USA', 'English', 'Jamie Foxx, Tina Fey, Graham Norton', 'Pete Docter', 'https://image.tmdb.org/t/p/w500/hm58Jw4Lw8OIeECIq5qyPYhAeRJ.jpg', 'https://www.youtube.com/embed/xOsLIiBStEs', '2026-05-29 22:28:04', '2026-05-29 22:28:04'),
(106, 6, 'Klaus', 'klaus', 'Tukang pos yang malas menjalin persahabatan dengan pembuat mainan misterius.', 8.2, '2019', 96, 'Spain', 'English', 'Jason Schwartzman, J.K. Simmons, Rashida Jones', 'Sergio Pablos', 'https://image.tmdb.org/t/p/w500/q125RHUDgR4gjwh1QkfYuJLYkL.jpg', 'https://www.youtube.com/embed/taE3PwurhYM', '2026-05-29 22:28:05', '2026-05-29 22:28:05'),
(107, 6, 'The Wild Robot', 'the-wild-robot', 'Robot yang terdampar di pulau liar belajar bertahan hidup dan menjalin hubungan dengan hewan-hewan setempat.', 8.3, '2024', 102, 'USA', 'English', 'Lupita Nyongo, Pedro Pascal, Kit Connor', 'Chris Sanders', 'https://image.tmdb.org/t/p/w500/wTnV3PCVW5O92JMrFvvrRcV39RU.jpg', 'https://www.youtube.com/embed/67vbA5ZJdKQ', '2026-05-29 22:28:05', '2026-05-29 22:28:05'),
(108, 6, 'Kubo and the Two Strings', 'kubo-and-the-two-strings', 'Seorang anak laki-laki memulai perjalanan magis untuk mengungkap rahasia keluarganya.', 7.7, '2016', 101, 'USA', 'English', 'Art Parkinson, Charlize Theron, Matthew McConaughey', 'Travis Knight', 'https://upload.wikimedia.org/wikipedia/en/c/c4/Kubo_and_the_Two_Strings_poster.png', 'https://www.youtube.com/embed/vex0gPFnBvM', '2026-05-29 22:28:05', '2026-05-29 22:28:05'),
(109, 7, 'Life of Pi', 'life-of-pi', 'Seorang remaja India bertahan hidup di tengah lautan bersama seekor harimau Bengal setelah kapal yang ditumpanginya tenggelam.', 7.9, '2012', 127, 'USA', 'English', 'Suraj Sharma, Irrfan Khan, Tabu', 'Ang Lee', 'https://image.tmdb.org/t/p/w500/iLgRu4hhSr6V1uManX6ukDriiSc.jpg', 'https://www.youtube.com/embed/j9Hjrs6WQ8M', '2026-05-29 22:28:05', '2026-05-29 22:28:05'),
(110, 7, 'Uncharted', 'uncharted', 'Pemburu harta karun muda Nathan Drake memulai petualangan global untuk menemukan kekayaan legendaris yang hilang.', 6.3, '2022', 116, 'USA', 'English', 'Tom Holland, Mark Wahlberg, Sophia Ali', 'Ruben Fleischer', 'https://image.tmdb.org/t/p/w500/rJHC1RUORuUhtfNb4Npclx0xnOf.jpg', 'https://www.youtube.com/embed/eHp3MbsCbMg', '2026-05-29 22:28:05', '2026-05-29 22:28:05'),
(111, 8, 'Stardust', 'stardust', 'Seorang pemuda memasuki dunia sihir untuk mencari bintang jatuh yang ternyata berwujud manusia.', 7.6, '2007', 127, 'UK', 'English', 'Charlie Cox, Claire Danes, Michelle Pfeiffer', 'Matthew Vaughn', 'https://upload.wikimedia.org/wikipedia/en/6/6f/Stardust_promo_poster.jpg', 'https://www.youtube.com/embed/-wwv427DAvA', '2026-05-29 22:28:05', '2026-05-29 22:28:05'),
(112, 8, 'The Green Knight', 'the-green-knight', 'Sir Gawain menerima tantangan misterius dari Ksatria Hijau yang akan menguji kehormatan dan keberaniannya.', 6.6, '2021', 130, 'USA', 'English', 'Dev Patel, Alicia Vikander, Joel Edgerton', 'David Lowery', 'https://m.media-amazon.com/images/M/MV5BMjMxNTdiNWMtOWY0My00MjM4LTkwNzMtOGI0YThhN2Q4M2I4XkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_.jpg', 'https://www.youtube.com/embed/sS6ksY8xWCY', '2026-05-29 22:28:05', '2026-05-29 22:28:05'),
(113, 3, 'Talk to Me', 'talk-to-me', 'Sekelompok remaja menemukan cara berkomunikasi dengan roh melalui tangan misterius yang dibalsem.', 7.1, '2023', 95, 'Australia', 'English', 'Sophie Wilde, Alexandra Jensen, Joe Bird', 'Danny Philippou, Michael Philippou', 'https://image.tmdb.org/t/p/w500/kdPMUMJzyYAc4roD52qavX0nLIC.jpg', 'https://www.youtube.com/embed/aLAKJu9aJys', '2026-05-29 22:28:05', '2026-05-29 22:28:05'),
(114, 3, 'Smile 2', 'smile-2', 'Seorang penyanyi pop terkenal mulai mengalami kejadian mengerikan menjelang tur dunia yang menentukan kariernya.', 6.9, '2024', 127, 'USA', 'English', 'Naomi Scott, Rosemarie DeWitt, Lukas Gage', 'Parker Finn', 'https://image.tmdb.org/t/p/w500/ht8Uv9QPv9y7K0RvUyJIaXOZTfd.jpg', 'https://www.youtube.com/embed/F4nkZ4qIxyc', '2026-05-29 22:28:05', '2026-05-29 22:28:05'),
(115, 4, 'Past Lives', 'past-lives', 'Dua sahabat masa kecil yang terpisah bertahun-tahun bertemu kembali dan mempertanyakan pilihan hidup mereka.', 7.8, '2023', 106, 'USA', 'English', 'Greta Lee, Teo Yoo, John Magaro', 'Celine Song', 'https://image.tmdb.org/t/p/w500/k3waqVXSnvCZWfJYNtdamTgTtTA.jpg', 'https://www.youtube.com/embed/kA244xewjcI', '2026-05-29 22:28:05', '2026-05-29 22:28:05'),
(116, 5, 'Conclave', 'conclave', 'Seorang kardinal memimpin pemilihan paus baru dan menemukan rahasia besar yang dapat mengguncang Gereja.', 7.5, '2024', 120, 'UK', 'English', 'Ralph Fiennes, Stanley Tucci, John Lithgow', 'Edward Berger', 'https://www.buffalorising.com/wp-content/uploads/2024/10/conclave-box-1-scaled.jpg', 'https://www.youtube.com/embed/JX9jasdi3ic', '2026-05-29 22:28:05', '2026-05-29 22:28:05');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Action', 'action', '2026-05-29 22:28:02', '2026-05-29 22:28:02'),
(2, 'Sci-Fi', 'sci-fi', '2026-05-29 22:28:02', '2026-05-29 22:28:02'),
(3, 'Horror', 'horror', '2026-05-29 22:28:02', '2026-05-29 22:28:02'),
(4, 'Drama', 'drama', '2026-05-29 22:28:02', '2026-05-29 22:28:02'),
(5, 'Thriller', 'thriller', '2026-05-29 22:28:02', '2026-05-29 22:28:02'),
(6, 'Animation', 'animation', '2026-05-29 22:28:02', '2026-05-29 22:28:02'),
(7, 'Adventure', 'adventure', '2026-05-29 22:28:02', '2026-05-29 22:28:02'),
(8, 'Fantasy', 'fantasy', '2026-05-29 22:28:02', '2026-05-29 22:28:02');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_05_27_084211_create_genres_table', 1),
(5, '2026_05_27_084221_create_films_table', 1),
(6, '2026_05_27_084249_create_favorites_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('9rUaUN0Hfjx9Nrc5ThKDK8gO7gZstTD64SLbxQZQ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaGFqWUhlOGxhdkhJbXBCU0RGNWZ1eTZGTlRVU2dVek9MbDB6NG00WiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC8/cGFnZT0xIjtzOjU6InJvdXRlIjtzOjQ6ImhvbWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1780299891),
('GgXAzbkBdPCSMexA6TOvUYDQPWgitTgMpDt50yLp', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZmRDN0hNOUJYa0dDSVA1RWVRSUtYMWNRa1drSWphU1o4S1VPVUltQiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC8/cGFnZT0xMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1780288624),
('t8JkJUZMtF5ce3gPzEzxKQD08WPID3zI4KstarXn', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidTZiY2JibWZpVHptMUpnOWUwRlh1SERuRmdoU1B3WGtRa2phN040ZCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi91c2VycyI7czo1OiJyb3V0ZSI7czoxMToiYWRtaW4udXNlcnMiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1780122855),
('Vu7as8q9PKvwE580Ph1ForBvrghXTkslhlypjtOT', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNzFZaXVTVnJyVWVHVFUybFJOSDRLTnRQUEFPRTNjUXZCT0tKalJ1bCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9mYXZvcml0ZXMtbG9nIjtzOjU6InJvdXRlIjtzOjE4OiJhZG1pbi5mYXZvcml0ZXNMb2ciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1780307835);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin FilmVault', 'admin@filmvault.com', NULL, '$2y$12$SUZz9Nn4Jso0f/JTPx1knOv/3OvA29Ghz2S3y07lT1tU.TsgFANVa', 'admin', NULL, '2026-05-29 22:28:01', '2026-05-29 22:28:01'),
(2, 'Guest User', 'user@filmvault.com', NULL, '$2y$12$/JELk23Md6A7fY8PPlN85.9TteLJ0hmAucs4Rlokd3zI.LpUGIlr.', 'user', NULL, '2026-05-29 22:28:02', '2026-05-29 22:28:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `favorites_user_id_film_id_unique` (`user_id`,`film_id`),
  ADD KEY `favorites_film_id_foreign` (`film_id`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `films_slug_unique` (`slug`),
  ADD KEY `films_genre_id_foreign` (`genre_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `genres_slug_unique` (`slug`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `films`
--
ALTER TABLE `films`
  ADD CONSTRAINT `films_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
