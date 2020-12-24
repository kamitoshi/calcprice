@extends('layouts.main')

@section('sub_title', 'キャスト一覧')
@section('title', 'CastIndex')


@section('main_container')

  <div class="create_cast_btn ma-b-30">
    <a href="/casts/create">キャスト新規登録</a>
  </div>
  
  @if ($casts != null)
    @foreach($casts as $cast)
      <table>
        <tr>
          <th>id:</th>
          <td><a href="casts/{{$cast->id}}">{{$cast->id}}</a></td>
          <th>名前</th>
          <td><a href="casts/{{$cast->id}}">{{$cast->name}}</a></td>
          <th>年齢</th>
          <td>{{$cast->getAge()}}</td>
          <th>性格</th>
          <td>{{$cast->character}}</td>
          <th>好きな物</th>
          <td>{{$cast->favorite}}</td>
        </tr>
      </table>
    @endforeach
  @endif

@endsection

@section('footer')
copyright 2020 tuyano.
@endsection