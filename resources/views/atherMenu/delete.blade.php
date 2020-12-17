@extends('layouts.main')

@section('sub_title', 'その他（サービス）削除')
@section('title', 'AtherMenuDelete')

@section('main_container')
  <div class="delete_form center">
    <p>本当に削除してもよろしいですか？</p>
    <p>{{$atherMenu->name}}</p>
  </div>
  <form action="/ather_menu/{{$atherMenu->id}}/delete" method="post">
    @csrf
    <div class="submit_btn">
      <input type="submit" value="削除" class="btn">
    </div>
  </form>
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection