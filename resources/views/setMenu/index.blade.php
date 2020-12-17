@extends('layouts.main')

@section('sub_title', 'セット一覧')
@section('title', 'SetMenuIndex')

@section('main_container')
  <div class="add_setMenu_btn ma-b-30">
    <form action="/set_menu/add" method="post">
    @csrf
    <div class="setMenu_form">
      <p>商品名</p>
      <input type="text" name="name" value="{{old('name')}}" size="100">
    </div>
    <div class="setMenu_form">
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
      <th width="200px">セット名</th>
      <th width="100px">値段</th>
      <th></th>
      <th></th>
    </tr>
    @if ($setMenus != null)
      @foreach($setMenus as $setMenu)
        <tr>
          <td>id:{{$setMenu->id}}</td>
          <td>{{$setMenu->name}}</td>
          <td>{{$setMenu->price}}</td>
          <td><a href="/set_menu/{{$setMenu->id}}/edit">編集</a></td>
          <td><a href="/set_menu/{{$setMenu->id}}/delete">削除</a></td>
        </tr>
      @endforeach
    @endif
  </table>
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection