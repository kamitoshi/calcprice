@extends('layouts.main')

@section('sub_title', 'キャスト給料登録')
@section('title', 'CastCreate')


@section('main_container')
  <form action="/casts/{{$cast->id}}/salary" method="post">
    @csrf
    @if(count($errors) > 0)
      <div class="error_message_field">
        <ul class="error_message">
          @foreach($errors as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <input type="hidden" name="cast_id" value="{{$cast->id}}">
    <input type="hidden" name="changed_salary" value=0 >
    <div class="salary_form">
      <p>該当月</p>
      <input type="text" name="target_date" value="{{$date->format('Y年m月')}}" size="100" readonly>
      <!-- <input type="text" name="target_date" value="" size="100"> -->
    </div>
    <div class="salary_form">
      <p>基本給</p>
      <input type="text" name="fixed_salary" value="{{old('fixed_salary')}}" size="100">
    </div>
    <div class="submit_btn">
      <input type="submit" value="作成" class="btn">
    </div>
  </form>

@endsection

@section('footer')
copyright 2020 tuyano.
@endsection