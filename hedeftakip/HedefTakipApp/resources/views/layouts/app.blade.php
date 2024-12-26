<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Uygulaması</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<nav>
    <style>
        nav ul {
            display: flex;
            list-style: none;
            gap: 1rem;
            position: absolute;
            top: 10px;
            right: 10px;
            margin: 0;
            padding: 0;
        }

        nav a, nav button {
            text-decoration: none;
            padding: 0.5rem 1rem;
            background-color: #333;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        nav button:hover, nav a:hover {
            background-color: #45a049;
        }

        }
        .auth-buttons {
            position: absolute;
            top: 10px;
            right: 10px;
            display: flex;
            gap: 10px;
        }

        .auth-buttons button {
            padding: 0.5rem 1rem;
            border: none;
            background-color: #333;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .auth-buttons button:hover {
            background-color: #45a049;
        }



    </style>

    <ul>
        @guest
            <li><a href="{{ route('login') }}">Giriş Yap</a></li>
            <li><a href="{{ route('register') }}">Kayıt Ol</a></li>
        @else
            <li>Hoşgeldin, {{ Auth::user()->name }}</li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Çıkış Yap</button>
                </form>
            </li>
        @endguest
    </ul>
</nav>

<div class="container">
    @yield('content')
</div>
</body>
</html>
