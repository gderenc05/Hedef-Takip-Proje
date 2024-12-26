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
        @import url('https://fonts.googleapis.com/css2?family=Modern+Love&display=swap');

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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

        .container {
            padding: 1rem;
        }

        .calendar, .categories-section, .statistics-section, .goal-management, .user-customization, .social-sharing {
            margin-bottom: 2rem;
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



        .category h3 {
            margin-top: 0;
        }



        .category-progress {
            margin-top: 1rem;
            height: 10px;
            background: #ddd;
            border-radius: 5px;
            overflow: hidden;
        }

        .category-progress-bar {
            height: 100%;
            background: #FFFFFF;
            width: 0;
            transition: width 0.3s;
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

        .filter-bar {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .filter-bar input {
            flex-grow: 1;
        }

        .recommended-categories {
            margin-top: 2rem;
            padding: 1rem;
            background-color: #e8f5e9;
            border-radius: 5px;
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
        .statistics-section {
            padding: 2rem;
        }

        .stat-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            padding: 1rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
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


        .quote-section {
            text-align: center;
            padding: 2rem;
            background: linear-gradient(135deg, #ffe4e1, #ffc1e3);
            border-radius: 10px;
            font-family: 'Modern Love', cursive;
            color: #333;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
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
        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 1rem;
            background-color: #f9f9f9;
            border-radius: 8px;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        label {
            font-weight: bold;
            margin-bottom: 0.5rem;
            display: block;
        }

        input {
            width: 100%;
            padding: 0.5rem;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 0.7rem 1.5rem;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
        .iletisimm {
            max-width: 600px;
            margin: 0 auto;
            text-align: center;
            padding: 40px;


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
    <a href="{{route('gorevler')}}">Görevler</a>


</nav>



<div class="iletisimm">
<h3>İLETİŞİM</h3>
<p>Herhangi bir sorunuz ya da geri bildiriminiz için lütfen aşağıdaki formu doldurun.</p>
</div>
<form action="{{ route('iletisim') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="ad">Ad:</label>
        <input type="text" id="ad" name="ad" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="soyad">Soyad:</label>
        <input type="text" id="soyad" name="soyad" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="email">E-posta:</label>
        <input type="email" id="email" name="email" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="mesaj">Mesajınız:</label>
        <input type="text" id="message" name="mesaj" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Gönder</button>
</form>


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
