@extends('layouts.main')

@section('title', 'Find')

@section('menubar')
   @parent
   商品検索ページ
@endsection

@section('content')
  <form action="/product/find" method="post">
    @csrf
    <div class="form_field">
      商品名：<input type="text" name="nameInput" value="{{$nameInput}}">
    </div>
    <div class="form_field">
      下限金額：<input type="text" name="minInput" value="{{$minInput}}">
      〜
      上限金額：<input type="text" name="maxInput" value="{{$maxInput}}">
    </div>
    
    <input type="submit" value="検索">
  </form>

  @if ($items != null)
    @foreach($items as $item)
      <table>
        <tr>
          <th >id:</th>
          <td >{{$item->id}}</td>
          <th >商品名</th>
          <td >{{$item->name}}</td>
          <th >値段</th>
          <td >{{$item->price}}</td>
          <th >在庫数</th>
          <td >{{$item->count}}</td>
          <th >短縮表示</th>
          <td >{{$item->getData()}}</td>
        </tr>
      </table>
    @endforeach
  @endif
  
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection