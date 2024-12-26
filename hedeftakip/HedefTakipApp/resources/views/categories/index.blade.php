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
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    }
    .page-container {
        width: 80%;
        max-width: 1200px;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin: 0 auto;
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

    .highlight {
    background-color: #ffeb3b;
    font-weight: bold;
    }

    .categories {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
    }

    .category {
    padding: 1rem;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #f9f9f9;
    transition: transform 0.3s;
    position: relative;
    }


    .category:hover {
    transform: translateY(-5px);
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .category h3 {
    margin-top: 0;
    }

    .category-icon {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 1.5rem;
    color: #FFFFFF;
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


        justify-content: center;
        margin-bottom: 20px;
    }

    .filter-bar input {
        width: 50%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
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






<div class="page-container">
    <!-- Kategoriler Bölümü -->
    <div class="categories-section" id="categories">
        <h2>Kategoriler</h2>
        <div class="filter-bar">
            <input type="text" id="category-search" placeholder="Kategori ara..." oninput="filterCategories()">
            <button onclick="resetCategories()">Sıfırla</button>
        </div>
        <ul id="category-list">
            @foreach($kategoriler as $kategori)
                <li>{{ $kategori->ad }}</li>
            @endforeach
        </ul>
    </div>

    <div class="categories" id="categories-list">
        <div class="category" data-name="Kişisel Gelişim">
            <h3>Kişisel Gelişim</h3>
            <span class="category-icon">📘</span>
            <p>Kitap okuma, beceriler geliştirme</p>
            <div class="category-progress">
                <div class="category-progress-bar" style="width: 40%;"></div>
            </div>
        </div>
        <div class="category" data-name="Sağlık ve Fitness">
            <h3>Sağlık ve Fitness</h3>
            <span class="category-icon">💪</span>
            <p>Spor, diyet, sağlık hedefleri</p>
            <div class="category-progress">
                <div class="category-progress-bar" style="width: 60%;"></div>
            </div>
        </div>
        <div class="category" data-name="Finans">
            <h3>Finans</h3>
            <span class="category-icon">💰</span>
            <p>Tasarruf, bütçe planlama</p>
            <div class="category-progress">
                <div class="category-progress-bar" style="width: 80%;"></div>
            </div>
        </div>
        <div class="category" data-name="Kariyer ve Eğitim">
            <h3>Kariyer ve Eğitim</h3>
            <span class="category-icon">🎓</span>
            <p>Yeni dil öğrenme, projeler</p>
            <div class="category-progress">
                <div class="category-progress-bar" style="width: 50%;"></div>
            </div>
        </div>
        <div class="category" data-name="Hobi ve Eğlence">
            <h3>Hobi ve Eğlence</h3>
            <span class="category-icon">🎨</span>
            <p>Hobiler ve seyahat planları</p>
            <div class="category-progress">
                <div class="category-progress-bar" style="width: 30%;"></div>
            </div>
        </div>
    </div>
<br>
    <div class="categories">
        @foreach($kategoriler as $kategori)
            <div class="category" data-name="{{ $kategori->ad }}">
                <h3>{{ $kategori->ad }}</h3>
                <span class="category-icon">📘</span>
                <p>{{ $kategori->aciklama }}</p>
                <div class="category-progress">
                    <div class="category-progress-bar" style="width: 40%;"></div>
                </div>
            </div>
        @endforeach
    </div>
<br>
    <!-- Yeni kategori ekleme formu -->
    <form action="{{ route('categories.store') }}" method="POST" class="add-category-form">
        @csrf
        <input type="text" name="ad" id="category-name" placeholder="Kategori Adı" required />
        <textarea name="aciklama" id="category-description" placeholder="Açıklama" required></textarea>
        <button type="submit">Ekle</button>
    </form>

    <!-- Önerilen kategoriler bölümü -->
    <div class="recommended-categories">
        <h3>Önerilen Kategoriler</h3>
        <p>Yoga, Meditasyon, Kısa Seyahatler</p>
    </div>
</div>

<script>
    function filterCategories() {
        // Kullanıcının arama kutusuna yazdığı değeri alın
        const searchInput = document.getElementById('category-search').value.toLowerCase();

        // Kategori listesindeki tüm <li> öğelerini seçin
        const categories = document.querySelectorAll('#category-list li');

        // Her bir kategori elemanını kontrol edin
        categories.forEach(category => {
            const categoryName = category.textContent.toLowerCase();

            // Arama terimi kategori isminde varsa göster, yoksa gizle
            if (categoryName.includes(searchInput)) {
                category.style.display = 'list-item';
            } else {
                category.style.display = 'none';
            }
        });
    }

</script>
</body>
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
