<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet">
  @yield('css')
  <title>FashionablyLate</title>
</head>
<body>
  <header class="header">
    <div class="header__inner">
      <h1>
        <a href="/" class="header__logo">FashionablyLate</a>
      </h1>
    </div>
  </header>
  <main>
    @yield('content')
  </main>
  <footer class="footer"></footer>
</body>
</html>