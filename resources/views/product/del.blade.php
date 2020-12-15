@extends('layouts.main')

@section('title', 'Delete')

@section('menubar')
   @parent
   商品削除ページ
@endsection

@section('content')
  <form action="/product/del" method="post">
    <table>
      @csrf
      <input type="hidden" name="id" value="{{$form->id}}">
      <tr>
        <th>商品名</th>
        <td>{{$form->name}}</td>
      </tr>
      <tr>
        <th>単価</th>
        <td>{{$form->price}}</td>
      </tr>
      <tr>
        <th>在庫</th>
        <td>{{$form->count}}</td>
      </tr>
      <tr>
        <th></th>
        <td><input type="submit" value="削除"></td>
      </tr>
    </table>
  </form>
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection