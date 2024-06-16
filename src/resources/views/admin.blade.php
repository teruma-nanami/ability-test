<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/admin.css')}}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet">
  @yield('css')
  <title>FashionablyLate</title>
  <script src="{{ asset('js/modal.js')}}"></script>
</head>
<body>
  <header class="header">
    <div class="header__inner">
      <h1>
        <a href="/" class="header__logo">FashionablyLate</a>
      </h1>
      <div class="header__link">
        @if (Auth::check())
          <form action="/logout" method="post">
          @csrf
            <button class="header-nav__button">logout</button>
          </form>
        @endif
      </div>
    </div>
  </header>
  <main>
    <div class="admin__heading">
      <h2>Admin</h2>
    </div>
    <div class="admin__inner">
      <form class="admin__form" action="/">
        <input type="text" placeholder="名前やメールアドレスを入力してください">
        <select name="" id="">
          <option value="">性別</option>
          <option value="1">男性</option>
          <option value="2">女性</option>
          <option value="3">その他</option>
        </select>
        <select name="category_id" id="">
          <option value="">お問い合わせの種類</option>
          <option value="1">商品のお届けについて</option>
          <option value="2">商品の交換について</option>
          <option value="3">商品トラブル</option>
          <option value="4">ショップへのお問い合わせ</option>
          <option value="5">その他</option>
        </select>
        <input type="date">
        <button>検索</button>
        <a href="./admin">リセット</a>
      </form>
      <div class="admin__export">
        <form action="">
          <button>エクスポート</button>
        </form>
        <div class="paginate">
          {{ $contacts->links() }}
        </div>
      </div>
    <table>
      <tbody>
        <tr>
          <th>お名前</th>
          <th>性別</th>
          <th>メールアドレス</th>
          <th>お問い合わせの種類</th>
          <th> </th>
        </tr>
        @foreach ($contacts as $contact)
        
        <tr>
          <td>{{$contact['first_name']}} {{$contact['last_name']}}</td>
          <td>{{$contact['genderText']}}</td>
          <td>{{$contact['email']}}</td>
          <td>{{$contact['categoryText']}}</td>
          <td><button>詳細</button></td>
        </tr>
        
        @endforeach

      </tbody>
    </table>
  </div>
</main>
<footer class="footer"></footer>
</body>
</html>