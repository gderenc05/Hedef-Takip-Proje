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





    .stat-card h3 {
    margin-bottom: 0.5rem;
    color: #333;
    }



    canvas {
    max-width: 100%;
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

    .update-status-form {
        margin: 0 auto;
        max-width: 500px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        background-color: #f9f9f9;
    }

    .update-status-form h3 {
        margin-bottom: 20px;
    }

    .update-status-form label {
        display: block;
        margin-bottom: 5px;
    }

    .update-status-form select,
    .update-status-form button {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
    }

    .goal-management {
        text-align: center;
        margin: 0 auto;
        padding: 20px;
    }

    .goal-management h1, .goal-management h3 {
        margin-bottom: 20px;
    }

    .goals-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .goal-item {
        width: 18%;
        margin-bottom: 20px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        background-color: #f9f9f9;
    }

    .goal-item p {
        margin: 5px 0;
    }

    .goal-item form {
        margin-top: 10px;
    }

    .goal-item button {
        padding: 5px 10px;
    }

    .add-goal-form, .update-status-form {
        margin: 0 auto;
        max-width: 500px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        background-color: #f9f9f9;
    }

    .add-goal-form h3, .update-status-form h3 {
        margin-bottom: 20px;
    }

    .add-goal-form label, .update-status-form label {
        display: block;
        margin-bottom: 5px;
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





<!-- Hedef Yönetimi Bölümü -->
<div class="goal-management" id="goal-management" style="text-align: center; margin: 0 auto; padding: 20px;">
    <h1>Hedef Yönetimi</h1>
    <h3>Hedeflerim</h3>
    <div class="goals-container" style="display: flex; flex-wrap: wrap; justify-content: space-between;">
        @foreach($hedefler as $hedef)
            <div class="goal-item" style="width: 18%; margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9;">
                <strong>{{ $hedef->ad }}</strong>
                (Kategori: {{ $hedef->kategori ? $hedef->kategori->ad : 'Kategori Yok' }})
                <p>Başlangıç: {{ $hedef->baslangic_tarihi }} | Bitiş: {{ $hedef->bitis_tarihi }}</p>

                <!-- Hedefin durumu -->
                <p>Durum: {{ $hedef->durum_id ? \App\Models\Durum::find($hedef->durum_id)->ad : 'Durum Belirtilmemiş' }}</p>

                <!-- Hedefi silmek için form -->
                <form action="{{ route('goal-management.destroy', $hedef->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Sil</button>
                </form>
            </div>
        @endforeach
    </div>
</div>

<div class="add-goal-form">
    <h3>Yeni Hedef Ekle</h3>
    <form action="{{ route('goal-management.store') }}" method="POST">
        @csrf
        <label for="goal-name">Hedef Adı:</label>
        <input type="text" id="goal-name" name="ad" required>

        <label for="goal-category">Kategori:</label>
        <select id="goal-category" name="kategori_id" required>
            @foreach($kategoriler as $kategori)
                <option value="{{ $kategori->id }}">{{ $kategori->ad }}</option>
            @endforeach
        </select>

        <label for="goal-desc">Açıklama:</label>
        <textarea id="goal-desc" name="aciklama"></textarea>

        <label for="start-date">Başlangıç Tarihi:</label>
        <input type="date" id="start-date" name="baslangic_tarihi" required>

        <label for="end-date">Bitiş Tarihi:</label>
        <input type="date" id="end-date" name="bitis_tarihi" required>

        <button type="submit">Ekle</button>
    </form>
</div>


<div class="update-status-form" style="text-align: center; margin-top: 20px;">
    <h3>Durum Güncelle</h3>

        <form action="{{ route('hedef.durumGuncelle', $hedef->id) }}" method="POST">

            @csrf
            @method('PUT')

            <label for="hedef">Hedef:</label>
            <select name="hedef_id" id="hedef" style="width: 100%; margin-bottom: 10px;">
                @foreach($hedefler as $hedef)
                    <option value="{{ $hedef->id }}">{{ $hedef->ad }}</option>
                @endforeach
            </select>

            <label for="durum">Durum:</label>
            <select name="durum_id" id="durum">
                <option value="1" {{ $hedef->durum_id == 1 ? 'selected' : '' }}>Devam Ediyor</option>
                <option value="2" {{ $hedef->durum_id == 2 ? 'selected' : '' }}>Bitti</option>
                <option value="3" {{ $hedef->durum_id == 3 ? 'selected' : '' }}>Başlamadı</option>
            </select>

            <button type="submit">Güncelle</button>
        </form>







<script>
    const months = ["Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran", "Temmuz", "Ağustos", "Eylül", "Ekim", "Kasım", "Aralık"];
    const daysOfWeek = ["Pzt", "Sal", "Çar", "Per", "Cum", "Cmt", "Paz"];
    const specialDays = {
        "Ocak": [{ day: 1, event: "Yeni Yıl" }],
        "Şubat": [{ day: 9, event: "Dünya Sigarayı Bırakma Günü" }],
        "Mart": [{ day: 18, event: "Çanakkale Zaferi" }],
        "Nisan": [{ day: 23, event: "Ulusal Egemenlik ve Çocuk Bayramı" }],
        "Mayıs": [{ day: 19, event: "Atatürk'ü Anma, Gençlik ve Spor Bayramı" }],
        "Haziran":[{ day:21,event: "En Uzun Gün"}],
        "Eylül":[{day:21,event:"Dünya Barış Günü"}],
        "Ağustos":[{ day:30,event:"Zafer Bayramı"}],
        "Temmuz": [{ day: 15, event: "Demokrasi ve Milli Birlik Günü" }],
        "Ekim": [{ day: 29, event: "Cumhuriyet Bayramı" }],
        "Kasım":[{day:10,event:"Atatürk’ün Ölüm Yıldönümü"}],
        "Aralık":[{day:31,event:"Yılbaşı Akşamı"}]
    };

    let currentMonthIndex = 0;

    function renderCalendar(monthIndex) {
        const month = months[monthIndex];
        const calendarTable = document.getElementById("calendar-table");
        const eventDetails = document.getElementById("event-details");
        document.getElementById("current-month").textContent = month;

        const daysInMonth = new Date(2025, monthIndex + 1, 0).getDate();
        const firstDay = (new Date(2025, monthIndex, 1).getDay() + 6) % 7; // Pzt'den başlat

        // Takvim tablosunu sıfırla
        calendarTable.innerHTML = "";

        // Gün isimlerini ekle
        let headerRow = calendarTable.insertRow();
        daysOfWeek.forEach(day => {
            const headerCell = headerRow.insertCell();
            headerCell.textContent = day;
            headerCell.style.fontWeight = "bold";
            headerCell.style.textAlign = "center";
        });

        // Boş hücreler ve günleri ekle
        let row = calendarTable.insertRow();

        for (let i = 0; i < firstDay; i++) {
            row.insertCell();
        }

        for (let day = 1; day <= daysInMonth; day++) {
            const cell = row.insertCell();
            const isSpecial = specialDays[month]?.find(e => e.day === day);


            cell.innerHTML = isSpecial
                ? `<span style="color: red;">${day} *</span>` // Özel gün kırmızı yıldız ile
                : day;


            cell.style.textAlign = "center";


            cell.addEventListener("click", () => {
                const event = isSpecial ? isSpecial.event : "Özel gün yok";
                eventDetails.textContent = `${day} ${month}: ${event}`;
            });


            if ((firstDay + day) % 7 === 0) {
                row = calendarTable.insertRow();
            }
        }
    }


    function previousMonth() {
        currentMonthIndex = (currentMonthIndex - 1 + 12) % 12;
        renderCalendar(currentMonthIndex);
    }

    function nextMonth() {
        currentMonthIndex = (currentMonthIndex + 1) % 12;
        renderCalendar(currentMonthIndex);
    }


    document.addEventListener("DOMContentLoaded", () => {
        renderCalendar(currentMonthIndex);

        // Tamamlanma durumu pasta grafiği
        const completionPieCtx = document.getElementById('completionPieChart').getContext('2d');
        new Chart(completionPieCtx, {
            type: 'pie',
            data: {
                labels: ['Tamamlanan', 'Devam Eden', 'Başarısız'],
                datasets: [{
                    data: [75, 20, 5],
                    backgroundColor: ['#4caf50', '#ffeb3b', '#f44336'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                }
            }
        });        // Haftalık performans çizgi grafiği

        const weeklyLineCtx = document.getElementById('weeklyLineChart').getContext('2d');
        new Chart(weeklyLineCtx, {
            type: 'line',
            data: {
                labels: ['1. Hafta', '2. Hafta', '3. Hafta', '4. Hafta'],
                datasets: [{
                    label: 'Tamamlanan Hedefler',
                    data: [5, 3, 7, 4],
                    borderColor: '#42a5f5',
                    backgroundColor: '#42a5f580',
                    fill: true,
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                }
            }
        });

        // Aylık performans çubuk grafiği
        const monthlyBarCtx = document.getElementById('monthlyBarChart').getContext('2d');
        new Chart(monthlyBarCtx, {
            type: 'bar',
            data: {
                labels: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs'],
                datasets: [{
                    label: 'Tamamlanan Hedefler',
                    data: [12, 9, 15, 7, 10],
                    backgroundColor: ['#4caf50', '#ff9800', '#2196f3', '#ff5722', '#8e44ad'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });




    });
</script>
<br>
<br>
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
</html>
