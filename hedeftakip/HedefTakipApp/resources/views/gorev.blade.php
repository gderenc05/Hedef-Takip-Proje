<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hedef Takip Uygulaması</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @extends('layouts.app')
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
        }

        header {
            background-color: #000000;
            text-align: center;
            padding: 2rem 0;
            color: white;
        }



        header h1 {
            font-family: 'Pacifico', cursive;
            font-size: 4rem;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            margin: 0;
            padding: 1rem;
        }

        nav {
            display: flex;
            justify-content: center;
            gap: 1rem;
            background-color: #f4f4f4;
            padding: 0.5rem;
        }

        nav a {
            text-decoration: none;
            color: #333;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #ddd;
        }

        .main-container {
            width: 90%;
            max-width: 800px;
            margin: 2rem auto;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            padding: 2rem;
        }

        .section-container {
            margin-bottom: 2rem;
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 1.8rem;
            margin-bottom: 1rem;
        }

        .table-container {
            padding: 1rem;
            border-radius: 10px;
            background-color: #f8f9fa;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        table th {
            background-color: #000000;
            color: white;
        }

        table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .form-container {
            padding: 1.5rem;
            border-radius: 10px;
            background-color: #f8f9fa;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        form input, form textarea, form button {
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        form button {
            background-color: #000000;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        form button:hover {
            background-color: #0056b3;
        }
        footer {
            background-color: #333;
            color: white;
            padding: 1rem;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .social-media {
            display: flex;
            gap: 15px; /* İkonlar arasında boşluk */
        }

        .social-media a {
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .social-media a i {
            margin-right: 8px;
            font-size: 1.2rem;
        }

        .social-media a:hover {
            text-decoration: underline;
        }

        footer p {
            text-align: center;
            flex-grow: 1;
        }
    </style>
</head>
<body>

<header style="display: flex; align-items: center; justify-content: center; padding: 10px;">
    <div style="margin-right: 20px;">
        <img src="{{asset('Krem Minimalist Kırtasiye Kalem Logo (1)-Photoroom.png')}}" width="100px" alt="logo">
    </div>
    <div>
        <h1 style="margin: 0; text-align: center;">Hedef Takip Uygulaması</h1>
    </div>
</header>

<nav>
    <a href="{{ route('welcome') }}">Ana Sayfa</a>
    <a href="{{ route('categories') }}">Kategoriler</a>
    <a href="{{ route('statistics') }}">İstatistikler</a>
    <a href="{{ route('goal-management') }}">Hedef Yönetimi</a>
    <a href="{{ route('iletisim') }}">İletişim</a>
    <a href="{{ route('gorevler') }}">Görevler</a>
</nav>

<div class="main-container">
    <!-- Görevlerim Kısmı -->
    <div class="section-container table-container">
        <h1>Görevlerim</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($gorevler->isEmpty())
            <p>Henüz görev eklenmedi.</p>
        @else
            <table>
                <thead>
                <tr>
                    <th>#</th>
                    <th>Ad</th>
                    <th>Açıklama</th>
                    <th>Başlangıç Tarihi</th>
                    <th>Bitiş Tarihi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($gorevler as $gorev)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $gorev->ad }}</td>
                        <td>{{ $gorev->aciklama }}</td>
                        <td>{{ $gorev->baslangic_tarihi }}</td>
                        <td>{{ $gorev->bitis_tarihi }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <!-- Yeni Görev Ekleme Formu -->
    <div class="section-container form-container">
        <h1>Yeni Görev Ekle</h1>
        <form action="{{ route('gorevler.store') }}" method="POST">
            @csrf

            <!-- Görev Adı -->
            <div>
                <label for="ad">Görev Adı</label>
                <input type="text" id="ad" name="ad" placeholder="Görev Adını Girin" required>
            </div>

            <!-- Açıklama -->
            <div>
                <label for="aciklama">Açıklama</label>
                <textarea id="aciklama" name="aciklama" rows="3" placeholder="Görev Açıklamasını Girin"></textarea>
            </div>

            <!-- Başlangıç Tarihi -->
            <div>
                <label for="baslangic_tarihi">Başlangıç Tarihi</label>
                <input type="date" id="baslangic_tarihi" name="baslangic_tarihi" required>
            </div>

            <!-- Bitiş Tarihi -->
            <div>
                <label for="bitis_tarihi">Bitiş Tarihi</label>
                <input type="date" id="bitis_tarihi" name="bitis_tarihi" required>
            </div>

            <!-- Kaydet Butonu -->
            <button type="submit">Kaydet</button>
        </form>
    </div>
</div>

<footer>
    <div class="footer-content">
        <p>&copy; 2024 Hedef Takip Uygulaması. Tüm hakları saklıdır.</p>
        <div class="social-media">
            <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook"></i> Facebook</a>
            <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i> Twitter</a>
            <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i> Instagram</a>
        </div>
    </div>
</footer>

</body>
</html>
