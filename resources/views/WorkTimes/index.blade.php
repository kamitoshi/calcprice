@extends('layouts.main')

@section('sub_title', 'キャスト出勤一覧')
@section('title', 'CastWorkTimeIndex')


@section('main_container')

  <form action="/casts/{{$cast->id}}/work_times/find" method="post">
    @csrf
    <div class="form_field">
      <select name="inputYear" id="inputYear">
        @for($i=2000; $i<=2100; $i++)
          @if($i === $date->year)
            <option value="{{$i}}" selected>{{$i}}年</option>
          @else
            <option value="{{$i}}">{{$i}}年</option>
          @endif
        @endfor
      </select>
      <select name="inputMonth" id="inputMonth">
        @for($i=1; $i<=12; $i++)
          @if($i === $date->month)
            <option value="{{$i}}" selected>{{$i}}月</option>
          @else
            <option value="{{$i}}">{{$i}}月</option>
          @endif
        @endfor
      </select>
      <input type="submit" value="表示">
    </div>
  </form>

  <hr>

  <div class="cast_name_box">
    <p>{{$cast->name}}</p>
  </div>

  <div class="create_link_box">
    <a href="/casts/{{$cast->id}}/work_times/create">新規作成</a>
  </div>

  <hr>

  <table width="100%">
    <thead>
      <tr>
        <td width="20%">日付</td>
        <td width="20%">出勤</td>
        <td width="20%">休憩開始</td>
        <td width="20%">休憩終了</td>
        <td width="20%">退勤</td>
      </tr>
    </thead>
    <tbody>
      @if($workTimes !== [])
        @foreach($workTimes as $workTime)
          <tr>
            <td><a href="/casts/{{$cast->id}}/work_times/{{$workTime->id}}/edit">{{$workTime->target_date->format("Y年m月d日")}}</a></td>
            <td>{{$workTime->getWorkStartTime()}}</td>
            <td>{{$workTime->getRestStartTime()}}</td>
            <td>{{$workTime->getRestEndTime()}}</td>
            <td>{{$workTime->getWorkEndTime()}}</td>
          </tr>
        @endforeach
      @else
        <tr>
            <td></td>
            <td></td>
            <td>該当がありません</td>
            <td></td>
            <td></td>
          </tr>
      @endif
    </tbody>
  </table>
  
  

@endsection

@section('footer')
copyright 2020 tuyano.
@endsection