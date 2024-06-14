@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css')}}">
@endsection

@section('content')
<div class="contact-form__content">
  <div class="contact-form__heading">
    <h2>Contact</h2>
  </div>
  <form action="/confirm" class="form" method="post">
    @csrf
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お名前</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group--content">
        <div class="form__input--text">
          <input type="text" name="first_name" placeholder="例: 山田" value="{{ old('first_name') }}" />
          <input type="text" name="last_name" placeholder="例: 太郎" value="{{ old('lastname') }}" />
        </div>
        <div class="form__error">
          @error('first_name')
              {{ $message }}
          @enderror
          @error('last_name')
              {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">性別</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group--content">
        <div class="form__input--text">
          <input type="radio" name="gender" value="1" checked /><label for="1">男性</label>
          <input type="radio" name="gender" value="2" /><label for="2">女性</label>
          <input type="radio" name="gender" value="3" /><label for="3">その他</label>
        </div>
        <div class="form__error">
          @error('gender')
              {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">メールアドレス</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group--content">
        <div class="form__input--text">
          <input type="text" name="email" placeholder="例: test@example.com" value="{{ old('email') }}" />
        </div>
        <div class="form__error">
          @error('email')
              {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">電話番号</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group--content">
        <div class="form__input--text">
          <input type="text" name="areaNumber" placeholder="080"  value="{{ old('tel') }}" /><span>-</span>
          <input type="text" name="localNumber" placeholder="1234"  value="{{ old('tel') }}" /><span>-</span>
          <input type="text" name="subscNumber" placeholder="5678"  value="{{ old('tel') }}" />
        </div>
        <div class="form__error">
          @error('tel')
              {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">住所</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group--content">
        <div class="form__input--text">
          <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3"  value="{{ old('address') }}" />
        </div>
        <div class="form__error">
          @error('address')
              {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">建物名</span>
      </div>
      <div class="form__group--content">
        <div class="form__input--text">
          <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101"  value="{{ old('building') }}" />
        </div>
        <div class="form__error">
          @error('building')
              {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お問い合わせの種類</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group--content">
        <div class="form__input--text">
          <select name="category" id="">
            <option value="">選択してください</option>
            <option value="1">商品のお届けについて</option>
            <option value="2">商品の交換について</option>
            <option value="3">商品トラブル</option>
            <option value="4">ショップへのお問い合わせ</option>
            <option value="5">その他</option>
          </select>
        </div>
        <div class="form__error">
          @error('address')
              {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お問い合わせ内容</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group--content">
        <div class="form__input--textarea">
          <textarea name="content" placeholder="お問い合わせ内容をご記載ください"></textarea>
        </div>
      </div>
    </div>
    <div class="form__button">
      <button class="form__button-submit" type="submit">確認画面</button>
    </div>
  </form>
</div>


@endsection