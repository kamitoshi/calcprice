@extends('layouts.main')

@section('sub_title', 'キャスト詳細')
@section('title', 'CastShow')


@section('main_container')
  
  <table>
    <tr>
      <th>id:</th>
      <td>{{$cast->id}}</td>
    </tr>
    <tr>
      <th>名前</th>
      <td>{{$cast->name}}</td>
    </tr>
    <tr>
      <th>年齢</th>
      <td>{{$cast->getAge()}}</td>
    </tr>
    <tr>
      <th>性格</th>
      <td>{{$cast->character}}</td>
    </tr>
    <tr>
      <th>好きな物</th>
      <td>{{$cast->favorite}}</td>
    </tr>
  </table>
  <div class="btn_box flex">
    <div class="btn flex_child">
      <a href="/casts/{{$cast->id}}/edit">編集</a>
    </div>
    <div class="btn flex_child">
      <a href="/casts/{{$cast->id}}/delete">削除</a>
    </div>
  </div>
  

@endsection

@section('footer')
copyright 2020 tuyano.
@endsection