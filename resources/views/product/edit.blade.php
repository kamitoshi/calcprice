@extends('layouts.main')

@section('sub_title', '商品変更')
@section('title', 'ProductEdit')


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
  
  <form action="/product/{{$product->id}}/edit" method="post">
    @csrf
    <input type="hidden" name="id" value={{$product->id}}>
    <div class="product_form">
      <p>商品名</p>
      <input type="text" name="name" value={{$product->name}} size="100">
    </div>
    <div class="product_form">
      <p>単価</p>
      <input type="text" name="price" value={{$product->price}} size="100">
    </div>
    <div class="product_form">
      <p>在庫</p>
      <input type="text" name="count" value={{$product->count}} size="100">
    </div>
    <div class="submit_btn">
      <input type="submit" value="編集" class="btn">
    </div>
  </form>
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection