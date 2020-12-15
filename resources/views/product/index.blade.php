@extends('layouts.main')

@section('title', 'Index')

@section('menubar')
   @parent
   インデックスページ
@endsection

@section('content')
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
copyright 2020 circrest.
@endsection