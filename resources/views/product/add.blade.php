@extends('layouts.main')

@section('title', 'Add')

@section('menubar')
   @parent
   商品新規登録ページ
@endsection

@section('content')
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
    <table>
      @csrf
      <tr>
        <th>商品名</th>
        <td><input type="text" name="name" value="{{old('name')}}"></td>
      </tr>
      <tr>
        <th>単価</th>
        <td><input type="text" name="price" value="{{old('price')}}"></td>
      </tr>
      <tr>
        <th>在庫</th>
        <td><input type="text" name="count" value="{{old('count')}}"></td>
      </tr>
      <tr>
        <th></th>
        <td><input type="submit" value="登録"></td>
      </tr>
    </table>
  </form>
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection