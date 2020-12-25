@extends('layouts.main')

@section('sub_title', 'キャスト給料詳細')
@section('title', 'CastSalaryShow')

@section('main_container')
  <div class="date_info">
    <h3>{{$salary->target_date->format("Y年m月")}}分（{{$salary->cast->name}}）</h3>
  </div>
  <hr>
  <div class="main_box">
    <div class="flex">
      <div class="flex_child">
        <p>基本給</p>
      </div>
      <div class="flex_child">
        <p>{{$salary->salary}}</p>
      </div>
    </div>
    <div class="flex">
      <div class="flex_child">
        <p>歩合給</p>
      </div>
      <div class="flex_child">
        <p>{{$salary->commission}}</p>
      </div>
    </div>
    <div class="flex">
      <div class="flex_child">
        <p>合計</p>
      </div>
      <div class="flex_child">
        <p>{{$salary->getTotalPrice()}}</p>
      </div>
    </div>
  </div>
  <div class="back_btn">
    <a href="/casts/{{$salary->cast->id}}/salary" class="back">戻る</a>
  </div>
@endsection

@section('footer')
copyright 2020 circrest.
@endsection