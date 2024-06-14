<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  @yield('css')
  <title>FashionablyLate</title>
</head>
<body>
  <header class="header">
    <div class="header__inner">
      <a href="/" class="header__logo">FashionablyLate</a>
    </div>
  </header>
  <main>
    @yield('content')
  </main>
  <footer class="footer"></footer>
</body>
</html>