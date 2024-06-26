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
        <span class="form__label-item">お名前</span>
        <span class="form__label-required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input-text">
          <input type="text" name="first_name" placeholder="例: 山田" value="{{ old('first_name') }}" /><span> </span>
          <input type="text" name="last_name" placeholder="例: 太郎" value="{{ old('last_name') }}" />
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
        <span class="form__label-item">性別</span>
        <span class="form__label-required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input-text">
          <label for="gender1"><input type="radio" id="gender1" class="gender" name="gender" value="1" checked="checked" />男性</label>
          <label for="gender2"><input type="radio" id="gender2" class="gender" name="gender" value="2" />女性</label>
          <label for="gender3"><input type="radio" id="gender3" class="gender" name="gender" value="3" />その他</label>
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
        <span class="form__label-item">メールアドレス</span>
        <span class="form__label-required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input-text">
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
        <span class="form__label-item">電話番号</span>
        <span class="form__label-required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input-text">
          <input type="text" name="areaNumber" placeholder="080"  value="{{ old('areaNumber') }}" /><span>-</span>
          <input type="text" name="localNumber" placeholder="1234"  value="{{ old('localNumber') }}" /><span>-</span>
          <input type="text" name="subscNumber" placeholder="5678"  value="{{ old('subscNumber') }}" />
        </div>
        <div class="form__error">
          @if ($errors->has('areaNumber') || $errors->has('localNumber') || $errors->has('subscNumber'))
              @if ($errors->first('areaNumber') == '電話番号は5桁までの数字で入力してください' ||
                $errors->first('localNumber') == '電話番号は5桁までの数字で入力してください' ||
                $errors->first('subscNumber') == '電話番号は5桁までの数字で入力してください')
                電話番号は5桁までの数字で入力してください
              @else
                電話番号を入力してください
              @endif
          @endif
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label-item">住所</span>
        <span class="form__label-required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input-text">
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
        <span class="form__label-item">建物名</span>
      </div>
      <div class="form__group-content">
        <div class="form__input-text">
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
        <span class="form__label-item">お問い合わせの種類</span>
        <span class="form__label-required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input-text form__input-select">
          <select name="category_id" id="">
            <option value="">選択してください</option>
            <option value="1">商品のお届けについて</option>
            <option value="2">商品の交換について</option>
            <option value="3">商品トラブル</option>
            <option value="4">ショップへのお問い合わせ</option>
            <option value="5">その他</option>
          </select>
        </div>
        <div class="form__error">
          @error('category_id')
              {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label-item">お問い合わせ内容</span>
        <span class="form__label-required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input-textarea">
          <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
        </div>
        <div class="form__error">
          @error('detail')
              {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__button">
      <button class="form__button-submit" type="submit">確認画面</button>
    </div>
  </form>
</div>


@endsection