@extends('layouts.main')

@section('sub_title', 'その他（サービス）一覧')
@section('title', 'AtherMenuIndex')

@section('main_container')
  <div class="add_atherMenu_btn ma-b-30">
    <form action="/ather_menu/add" method="post">
    @csrf
    <div class="atherMenu_form">
      <p>商品名</p>
      <input type="text" name="name" value="{{old('name')}}" size="100">
    </div>
    <div class="atherMenu_form">
      <p>単価</p>
      <input type="text" name="price" value="{{old('price')}}" size="100">
    </div>
    <div class="ma-50">
      <input type="submit" value="登録" class="btn">
    </div>
  </form>
  </div>
  <hr>
  <h4 class="ma-l-30">一覧</h4>
  <table border="1" style="border-collapse: collapse">
    <tr>
      <th></th>
      <th width="200px">サービス名</th>
      <th width="100px">値段</th>
      <th></th>
      <th></th>
    </tr>
    @if ($atherMenus != null)
      @foreach($atherMenus as $atherMenu)
        <tr>
          <td>id:{{$atherMenu->id}}</td>
          <td>{{$atherMenu->name}}</td>
          <td>{{$atherMenu->price}}</td>
          <td><a href="/ather_menu/{{$atherMenu->id}}/edit">編集</a></td>
          <td><a href="/ather_menu/{{$atherMenu->id}}/delete">削除</a></td>
        </tr>
      @endforeach
    @endif
  </table>
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection