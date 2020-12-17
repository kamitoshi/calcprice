@extends('layouts.main')

@section('sub_title', '商品一覧')
@section('title', 'ProductIndex')

@section('main_container')
  <div class="add_product_btn ma-b-30">
    <a href="/product/add">商品新規登録</a>
  </div>
  <table border="1" style="border-collapse: collapse">
    <tr>
      <th></th>
      <th width="200px">商品名</th>
      <th width="100px">値段</th>
      <th width="50px">在庫数</th>
      <th></th>
      <th></th>
    </tr>
    @if ($items != null)
      @foreach($items as $item)
        <tr>
          <td>id:{{$item->id}}</td>
          <td><a href="/product/{{$item->id}}/edit">{{$item->name}}</a></td>
          <td>{{$item->price}}</td>
          <td>{{$item->count}}</td>
          <td><a href="/product/{{$item->id}}/edit">編集</a></td>
          <td><a href="/product/{{$item->id}}/del">削除</a></td>
        </tr>
      @endforeach
    @endif
  </table>
@endsection

@section('footer')
copyright 2020 circrest.
@endsection