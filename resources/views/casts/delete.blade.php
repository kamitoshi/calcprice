@extends('layouts.main')

@section('sub_title', 'キャスト削除')
@section('title', 'CastDelete')

@section('main_container')
  <div class="delete_form center">
    <p>本当に削除してもよろしいですか？</p>
    <p>キャスト名：{{$cast->name}}</p>
  </div>
  <form action="/casts/{{$cast->id}}" method="post">
    @method("delete")
    @csrf
    <div class="submit_btn">
      <input type="submit" value="削除" class="btn" onclick='return confirm("本当に削除してよろしいですか？")'>
    </div>
  </form>
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection