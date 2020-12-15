@extends('layouts.main')

@section('title', 'Edit')

@section('menubar')
   @parent
   商品編集ページ
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
  
  <form action="/product/edit" method="post">
    <table>
      @csrf
      <input type="hidden" name="id" value="{{$form->id}}">
      <tr>
        <th>商品名</th>
        <td><input type="text" name="name" value="{{$form->name}}"></td>
      </tr>
      <tr>
        <th>単価</th>
        <td><input type="text" name="price" value="{{$form->price}}"></td>
      </tr>
      <tr>
        <th>在庫</th>
        <td><input type="text" name="count" value="{{$form->count}}"></td>
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