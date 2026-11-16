<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Magyar keresztnevek</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('/') }}">Főoldal</a></li>
                <li><a>Keresztnevek</a></li>
            </ul>
        </nav>
        <hr>
    </header>
    <main>
    @yield('content')
    </main>
    <footer>
        Érsek Huba (C) 2026
    </footer>
</body>
</html>