@extends('layouts.main')

@section('title', 'Show')

@section('menubar')
   @parent
   インデックスページ
@endsection

@section('content')
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
    </tr>
  </table>
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection