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
          <th width="50">id:</th>
          <td width="50"><a href="casts/{{$cast->id}}">{{$cast->id}}</a></td>
          <th width="100">名前</th>
          <td width="100"><a href="casts/{{$cast->id}}">{{$cast->name}}</a></td>
          <th width="100">年齢</th>
          <td width="100">{{$cast->getAge()}}</td>
          <th width="100">性格</th>
          <td width="100">{{$cast->character}}</td>
          <th width="100">好きな物</th>
          <td width="100">{{$cast->favorite}}</td>
          <th width="100">当月の給料</th>
          <td width="100">{{$cast->getCurrentMonthSalary()}}</td>
        </tr>
      </table>
    @endforeach
  @endif

@endsection

@section('footer')
copyright 2020 tuyano.
@endsection