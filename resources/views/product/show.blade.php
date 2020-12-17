@extends('layouts.main')

@section('sub_title', '商品詳細')
@section('title', 'ProductShow')

@section('main_container')
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