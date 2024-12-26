
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hedef Takip Uygulaması</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @extends('layouts.app')
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f6f9;
            color: #333;
            margin: 0;
            padding: 0;
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

        .statistics-container {
            isplay: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            min-height: 100vh;
            padding: 20px;
            box-sizing: border-box;
        }
        .overview {
            background-color: #ecf0f1;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 40px;
        }

        .overview ul {
            list-style: none;
            padding: 0;
        }

        .overview li {
            font-size: 18px;
            margin: 10px 0;
        }

        .overview li strong {
            color: #2980b9;
        }


        .chart-container {
            background-color: #ecf0f1;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 30px;
            max-width: 600px;
        }

        .chart-container canvas {
            max-width: 80%;
            height: 250px;
            margin: 0 auto;

        }
        .chart-container canvas {
            height: 200px;
            max-width: 90%;
        }




        .calendar table {
            width: 100%;
            border-collapse: collapse;
        }

        .calendar th, .calendar td {
            border: 1px solid #ddd;
            padding: 0.5rem;
            text-align: center;
        }

        .calendar th {
            background-color: #333;
            color: white;
        }




        .category:hover {
            transform: translateY(-5px);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .category h3 {
            margin-top: 0;
        }



        form {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        form input, form textarea, form button {
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        form button {
            background-color: #333;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        form button:hover {
            background-color: #45a049;
        }



        .filter-bar input {
            flex-grow: 1;
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
            gap: 15px;
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

        .stat-card h3 {
            margin-bottom: 0.5rem;
            color: #333;
        }

        .chart-container {
            margin: 2rem 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        canvas {
            max-width: 100%;
        }

        .chart-container {
            width: 80%;
            max-width: 600px;
            margin: 0 auto;
            padding: 1rem;
        }

        canvas {
            width: 75% !important;
            height: 300px !important; /* Yüksekliği belirle */
        }




        .quote-section blockquote {
            font-size: 1.5rem;
            margin: 0;
            font-style: italic;
        }

        .quote-section cite {
            display: block;
            margin-top: 1rem;
            font-size: 1rem;
            color: #555;
        }
    </style>
</head>
</body>
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
    <a href="{{route('gorevler')}}">Görevler</a>

</nav>





<div class="statistics-container">
    <h1>Hedef İstatistikleri</h1>

    <!-- Özet İstatistikler -->
    <div class="overview">
        <h3>Özet</h3>
        <ul>
            <li><strong>Toplam Hedef Sayısı:</strong> {{ $toplamHedefSayisi }}</li>
            <li><strong>Tamamlanan Hedefler:</strong> {{ $tamamlananHedefSayisi }}</li>
            <li><strong>Devam Eden Hedefler:</strong> {{ $devamEdenHedefSayisi }}</li>
            <li><strong>Yeni Hedefler (Bu Ay):</strong> {{ $yeniHedeflerAy }}</li>
        </ul>
    </div>

    <!-- Durum Grafiği (Doughnut Chart) -->
    <div class="chart-container">
        <h3>Hedef Durumları</h3>
        <canvas id="goal-status-chart"></canvas>
    </div>
</div>








<script>
    var ctx1 = document.getElementById('goal-status-chart').getContext('2d');
    var goalStatusChart = new Chart(ctx1, {
        type: 'doughnut',
        data: {
            labels: ['Başlangıç', 'Devam Ediyor', 'Bitti'],
            datasets: [{
                label: 'Hedef Durumları',
                data: [{{ $baslangicHedefleri }}, {{ $devamEdenHedefleri }}, {{ $bittiHedefleri }}],
                backgroundColor: ['#FF0000', '#FFA500', '#008000'],
            }]
        }
    });

</script>
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
