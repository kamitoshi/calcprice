@extends('layouts.main')

@section('sub_title', 'セット編集')
@section('title', 'SetMenuEdit')


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
  
  <form action="/set_menu/{{$setMenu->id}}/edit" method="post">
    @csrf
    <input type="hidden" name="id" value={{$setMenu->id}}>
    <div class="setMenu_form">
      <p>セット名</p>
      <input type="text" name="name" value={{$setMenu->name}} size="100">
    </div>
    <div class="setMenu_form">
      <p>単価</p>
      <input type="text" name="price" value={{$setMenu->price}} size="100">
    </div>
    <div class="ma-50">
      <input type="submit" value="編集" class="btn">
    </div>
  </form>
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection