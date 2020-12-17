@extends('layouts.main')

@section('sub_title', '商品登録')
@section('title', 'ProductAdd')

@section('main_container')
  @if(count($errors) > 0)
    <div class="error_message_field">
      <ul class="error_message">
        @foreach($errors as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <form action="/product/add" method="post">
    @csrf
    <div class="product_form">
      <p>商品名</p>
      <input type="text" name="name" value="{{old('name')}}" size="100">
    </div>
    <div class="product_form">
      <p>単価</p>
      <input type="text" name="price" value="{{old('price')}}" size="100">
    </div>
    <div class="product_form">
      <p>在庫</p>
      <input type="text" name="count" value="{{old('count')}}" size="100">
    </div>
    <div class="submit_btn">
      <input type="submit" value="登録" class="btn">
    </div>
  </form>
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection