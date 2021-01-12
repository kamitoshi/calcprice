@extends('layouts.main')

@section('sub_title', 'キャスト給料一覧')
@section('title', 'CastSalaryIndex')

@section('main_container')
  <div class="add_salary_btn ma-b-30">
    <form action="/casts/{{$cast->id}}/salary" method="post">
      @csrf
      <input type="submit" value="今月分の給料を作成する">
    </form>
  </div>
  <hr>
  <div class="date_info">
    @if($salaries !== null)
      @foreach($salaries as $salary)
        <p><a href="/casts/{{$cast->id}}/salary/{{$salary->id}}">{{$salary->target_date->format("Y年m月")}}分</a></p>
      @endforeach
    @else
      <p>まだ給料が存在しません</p>
    @endif
  </div>
@endsection

@section('footer')
copyright 2020 circrest.
@endsection