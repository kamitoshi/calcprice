@extends('layouts.main')

@section('sub_title', 'キャスト登録')
@section('title', 'CastCreate')


@section('main_container')
  <form action="/casts" method="post">
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

    <div class="cast_form">
      <p>キャスト名</p>
      <input type="text" name="name" value="{{old('name')}}" size="100">
    </div>
    <div class="cast_form">
      <p>年齢</p>
      <input type="number" name="age" value="{{old('age')}}" size="100">
    </div>
    <div class="cast_form">
      <p>性格</p>
      <input type="text" name="character" value="{{old('character')}}" size="100">
    </div>
    <div class="cast_form">
      <p>好きな物</p>
      <input type="text" name="favorite" value="{{old('favorite')}}" size="100">
    </div>
    <div class="submit_btn">
      <input type="submit" value="登録" class="btn">
    </div>
  </form>

@endsection

@section('footer')
copyright 2020 tuyano.
@endsection