<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FilmVault') }} - Auth Portal</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700;900&family=Montserrat:wght@800;900&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css">

    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        /* Latar Belakang menggunakan URL Online */
        body {
            font-family: 'Poppins', sans-serif;
            background: url('https://images.unsplash.com/photo-1517604931442-7e0c8ed2963c?q=80&w=2070&auto=format&fit=crop') no-repeat center center fixed;
            background-size: cover;
            color: #ffffff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(10, 5, 5, 0.65);
            z-index: 1;
        }

        /* PERBAIKAN 1: Kartu dibuat lebih luas (540px) */
        .auth-container { width: 100%; max-width: 540px; padding: 20px; position: relative; z-index: 10; }

        /* PERBAIKAN 3: Shadow luar digabungkan dengan bayangan hitam pekat agar menyatu */
        .auth-wrapper-outer {
            position: relative;
            padding: 8px;
            border: 1px solid rgba(229, 9, 20, 0.3);
            border-radius: 16px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.8), 0 0 40px rgba(229, 9, 20, 0.15);
            background: rgba(15, 15, 18, 0.2);
        }

        .auth-wrapper-outer::before, .auth-wrapper-outer::after {
            content: ''; position: absolute; border: 1px solid rgba(229, 9, 20, 0.8); border-radius: 4px; z-index: 0;
        }
        .auth-wrapper-outer::before {
            top: 20px; left: -10px; width: 20px; height: 60px; border-right: none; box-shadow: -5px 0 10px rgba(229, 9, 20, 0.3);
        }
        .auth-wrapper-outer::after {
            bottom: 20px; right: -10px; width: 20px; height: 60px; border-left: none; box-shadow: 5px 0 10px rgba(229, 9, 20, 0.3);
        }

        /* PERBAIKAN 3: Shadow dalam (inset) digelapkan agar glassmorphism lebih natural */
        .auth-card {
            background: rgba(18, 20, 25, 0.7); 
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            padding: 3rem 3.5rem; /* Padding diperlebar */
            position: relative;
            z-index: 2;
            box-shadow: inset 0 0 30px rgba(0, 0, 0, 0.5);
        }

        .brand-logo {
            font-family: 'Orbitron', sans-serif; font-size: 2.2rem; font-weight: 900; color: transparent; -webkit-text-stroke: 1.2px #e50914; text-align: center; letter-spacing: 4px; text-transform: uppercase; text-decoration: none; display: block; margin-bottom: 0.5rem; text-shadow: 0 0 15px rgba(229, 9, 20, 0.3); transition: all 0.3s;
        }
        .brand-logo:hover { color: #e50914; text-shadow: 0 0 20px rgba(229, 9, 20, 0.8); }

        .subtitle { text-align: center; color: #d0d0d0; font-size: 0.9rem; margin-bottom: 2rem; font-weight: 400; }

        .input-group-custom {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 6px;
            display: flex;
            align-items: center;
            width: 100%;
            transition: all 0.3s ease;
            position: relative; 
            margin-bottom: 1.2rem; 
        }
        .input-group-custom:focus-within {
            border-color: #e50914;
            background: rgba(229, 9, 20, 0.05);
            box-shadow: 0 0 10px rgba(229, 9, 20, 0.2);
        }

        .input-icon { color: #888; padding: 0 0 0 1.2rem; font-size: 1.1rem; }
        .input-group-custom:focus-within .input-icon { color: #e50914; }

        .input-field {
            background: transparent !important;
            border: none !important;
            color: #ffffff !important;
            padding: 1.1rem 1rem;
            font-size: 0.95rem;
            width: 100%;
            outline: none !important;
            box-shadow: none !important;
        }
        .input-field::placeholder { color: #777; font-weight: 300; }

        input:-webkit-autofill,
        input:-webkit-autofill:hover, 
        input:-webkit-autofill:focus, 
        input:-webkit-autofill:active {
            -webkit-box-shadow: 0 0 0 50px #18191c inset !important;
            -webkit-text-fill-color: #ffffff !important;
            transition: background-color 5000s ease-in-out 0s;
        }

        /* PERBAIKAN 2: Teks SHOW/HIDE dan Ikon diatur ukurannya serta diberi jarak */
        .toggle-password-btn {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px; /* Jarak antara teks SHOW/HIDE dan Ikon Mata */
            cursor: pointer;
            color: #888;
            font-size: 0.6rem; /* Ukuran teks diperkecil */
            letter-spacing: 1.5px;
            transition: color 0.3s;
            z-index: 10;
        }
        .toggle-password-btn:hover { color: #fff; }
        .toggle-password-btn i { font-size: 1.1rem; } /* Ikon diseimbangkan */

        .btn-glow {
            background: linear-gradient(135deg, #a10000, #e50914); 
            color: #ffffff; 
            font-weight: 600; 
            font-size: 1.05rem; 
            padding: 0.9rem; 
            border-radius: 6px; 
            width: 100%; 
            border: none; 
            cursor: pointer; 
            transition: all 0.3s ease; 
            box-shadow: 0 5px 15px rgba(229, 9, 20, 0.3); 
            margin-top: 1rem; 
            margin-bottom: 1.5rem;
            letter-spacing: 1px;
        }
        .btn-glow:hover { background: linear-gradient(135deg, #cc0000, #ff1a26); box-shadow: 0 8px 25px rgba(229, 9, 20, 0.6); transform: translateY(-2px); }

        .custom-checkbox { width: 15px; height: 15px; border-radius: 3px; border: 1px solid #777; background-color: transparent; cursor: pointer; accent-color: #e50914; }

        .auth-link { color: #e50914; text-decoration: none; font-weight: 600; transition: all 0.3s ease; }
        .auth-link:hover { color: #ff3333; text-shadow: 0 0 10px rgba(229, 9, 20, 0.5); }

        .invalid-feedback { display: block; color: #ff3333; font-size: 0.85rem; margin-top: -0.8rem; margin-bottom: 1rem; padding-left: 0.5rem; }
    </style>
</head>
<body>

    <div class="auth-container">
        <!-- Frame Luar Neon & Garis Sirkuit -->
        <div class="auth-wrapper-outer">
            <!-- Kartu Dalam Kaca Transparan -->
            <div class="auth-card">
                
                {{ $slot }}

            </div>
        </div>
    </div>

    <!-- Script Show/Hide Password -->
    <script>
        // PERBAIKAN: Menambahkan parameter ke-3 agar teks SHOW/HIDE berubah saat diklik
        function togglePassword(inputId, iconId, textId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            const text = document.getElementById(textId);
            
            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove("bi-eye-slash");
                icon.classList.add("bi-eye");
                if (text) text.innerText = "HIDE";
            } else {
                input.type = "password";
                icon.classList.remove("bi-eye");
                icon.classList.add("bi-eye-slash");
                if (text) text.innerText = "SHOW";
            }
        }
    </script>
</body>
</html>