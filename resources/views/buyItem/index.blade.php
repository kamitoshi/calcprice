@extends('layouts.main')

@section('title', 'Index')

@section('menubar')
   @parent
   インデックスページ
@endsection

@section('content')
   @if ($buyItems != null)
    @foreach($buyItems as $item)
      <table>
        <tr>
          <th >id:</th>
          <td >{{$item->id}}</td>
          <th >商品名</th>
          <td >{{$item->product->name}}</td>
          <th >座席名</th>
          <td >{{$item->seat->name}}</td>
          <th >短縮表示</th>
          <td >{{$item->getName()}}</td>
        </tr>
      </table>
    @endforeach
  @endif
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection