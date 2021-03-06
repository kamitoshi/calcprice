@extends('layouts.main')

@section('sub_title', '商品削除')
@section('title', 'ProductDelete')

@section('main_container')
  <div class="delete_form center">
    <p>本当に削除してもよろしいですか？</p>
    <p>{{$product->name}}</p>
  </div>
  <form action="/product/{{$product->id}}/del" method="post">
    @csrf
    <div class="submit_btn">
      <input type="submit" value="削除" class="btn">
    </div>
  </form>
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection