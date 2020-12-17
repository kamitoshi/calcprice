@extends('layouts.main')

@section('sub_title', 'セット削除')
@section('title', 'SetMenuDelete')

@section('main_container')
  <div class="delete_form center">
    <p>本当に削除してもよろしいですか？</p>
    <p>{{$setMenu->name}}</p>
  </div>
  <form action="/set_menu/{{$setMenu->id}}/delete" method="post">
    @csrf
    <div class="submit_btn">
      <input type="submit" value="削除" class="btn">
    </div>
  </form>
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection