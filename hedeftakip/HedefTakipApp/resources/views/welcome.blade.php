

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




<div class="container">
    @section('content')
        <div class="container">


            <div class="quote-section">
                @foreach($sozler as $soz)
                    <blockquote>{{ $soz->soz }}</blockquote>
                    <cite>- {{ $soz->yazar }}</cite>


                @endforeach
            </div>



    <!-- Takvim Bölümü -->
    <div class="calendar" id="home">
        <h2>2025 Takvimi</h2>
        <div class="month-navigation">
            <button onclick="previousMonth()">Önceki</button>
            <span id="current-month">Ocak</span>
            <button onclick="nextMonth()">Sonraki</button>
        </div>
        <table class="calendar-table" id="calendar-table">

        </table>
        <div class="event-details" id="event-details">

        </div>
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
        const firstDay = (new Date(2025, monthIndex, 1).getDay() + 6) % 7;


        calendarTable.innerHTML = "";


        let headerRow = calendarTable.insertRow();
        daysOfWeek.forEach(day => {
            const headerCell = headerRow.insertCell();
            headerCell.textContent = day;
            headerCell.style.fontWeight = "bold";
            headerCell.style.textAlign = "center";
        });


        let row = calendarTable.insertRow();

        for (let i = 0; i < firstDay; i++) {
            row.insertCell();
        }

        for (let day = 1; day <= daysInMonth; day++) {
            const cell = row.insertCell();
            const isSpecial = specialDays[month]?.find(e => e.day === day);

            // Gün sayısını hücreye yaz
            cell.innerHTML = isSpecial
                ? `<span style="color: red;">${day} *</span>` // Özel gün kırmızı yıldız ile
                : day;

            // Hücreyi ortala
            cell.style.textAlign = "center";

            // Tıklama olayını ekle
            cell.addEventListener("click", () => {
                const event = isSpecial ? isSpecial.event : "Özel gün yok";
                eventDetails.textContent = `${day} ${month}: ${event}`;
            });

            // Haftanın son günü ise yeni satır başlat
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
        });




    });
</script>

</body>
</html>
