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
      <form class="admin__form" action="/search">
        <input name="keyword" type="text" placeholder="名前やメールアドレスを入力してください">
        <select name="gender" id="">
          <option value="">性別</option>
          <option value="1">男性</option>
          <option value="2">女性</option>
          <option value="3">その他</option>
        </select>
        <select name="category_id" id="">
          <option value="">お問い合わせの種類</option>
          @foreach ($categories as $category)
            <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
          @endforeach
        </select>
        <input name="date" type="date">
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
        @foreach ($contacts as $index => $contact)
        <tr>
          <td>{{$contact['first_name']}} {{$contact['last_name']}}</td>
          <td>{{$contact['genderText']}}</td>
          <td>{{$contact['email']}}</td>
          <td>{{$contact['categoryText']}}</td>
          <td><button class="open-modal" data-modal-id="modal-window-{{ $index }}">詳細</button></td>
        </tr>
        <div class="modal" id="modal-window-{{ $index }}" style="display:none;">
          <span class="modal__close">×</span>
          <div class="modal__inner">
            <div class="modal__content">
              <div class="modal__title">
                お名前
              </div>
              <div class="modal__text">
                {{$contact['first_name']}} {{$contact['last_name']}}
              </div>
            </div>
            <div class="modal__content">
              <div class="modal__title">
                性別
              </div>
              <div class="modal__text">
                {{$contact['genderText']}}
              </div>
            </div>
            <div class="modal__content">
              <div class="modal__title">
                メールアドレス
              </div>
              <div class="modal__text">
                {{$contact['email']}}
              </div>
            </div>
            <div class="modal__content">
              <div class="modal__title">
                電話番号
              </div>
              <div class="modal__text">
                {{$contact['tel']}}
              </div>
            </div>
            <div class="modal__content">
              <div class="modal__title">
                住所
              </div>
              <div class="modal__text">
                {{$contact['address']}}
              </div>
            </div>
            <div class="modal__content">
              <div class="modal__title">
                建物名
              </div>
              <div class="modal__text">
                {{$contact['building']}}
              </div>
            </div>
            <div class="modal__content">
              <div class="modal__title">
                お問い合わせの種類
              </div>
              <div class="modal__text">
                {{$contact['categoryText']}}
              </div>
            </div>
            <div class="modal__content">
              <div class="modal__title">
                お問い合わせ内容
              </div>
              <div class="modal__text">
                {{$contact['detail']}}
              </div>
            </div>
          </div>
            <div class="modal__form">
              <form action="/delete" method="POST">
              @method('DELETE')
              @csrf
              <input type="hidden" name="id" value="{{ $contact['id'] }}">
              <button class="modal__button" type="submit">削除</button>
              </form>
            </div>
        </div>
        </div>
        @endforeach

      </tbody>
    </table>
  </div>
</main>
<footer class="footer"></footer>
<script src="{{ asset('js/modal.js')}}"></script>
</body>
</html>