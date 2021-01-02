@extends('layouts.main')

@section('sub_title', '勤怠編集')
@section('title', 'WorkTimeEdit')

@section('main_container')
  <div class="cast_name_box">
    <p>{{$cast->name}}</p>
  </div>
  <hr>
  @if(count($errors) > 0)
    <div class="error_message_field">
      <ul class="error_message">
        @foreach($errors as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <form action="/casts/{{$cast->id}}/work_times/{{$workTime->id}}" method="post">
    @csrf
    @method("put")
    <input type="hidden" name="cast_id" value="{{$cast->id}}">
    <div class="work_time_form">
      <p>{{$workTime->target_date->format('Y年m月d日')}}</p>
    </div>
    <div class="work_time_form">
      <p>出勤時間</p>
      <input type="time" name="work_start" value="{{$workTime->getWorkStartTime()}}" size="100">
    </div>
    <div class="work_time_form">
      <p>休憩開始時間</p>
      <input type="time" name="rest_start" value="{{$workTime->getRestStartTime()}}" size="100">
    </div>
    <div class="work_time_form">
      <p>休憩終了時間</p>
      <input type="time" name="rest_end" value="{{$workTime->getRestEndTime()}}" size="100">
    </div>
    <div class="work_time_form">
      <p>退勤時間</p>
      <input type="time" name="work_end" value="{{$workTime->getWorkEndTime()}}" size="100">
    </div>
    <div class="submit_btn">
      <input type="submit" value="登録" class="btn">
    </div>
  </form>
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection