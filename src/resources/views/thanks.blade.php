@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/thanks.css')}}">
@endsection

@section('content')
    <div class="thanks__content">
      <div class="thanks__header">
        <h2>お問い合わせありがとうございました</h2>
      </div>
    </div>
    <a href="/">HOME</a>
@endsection