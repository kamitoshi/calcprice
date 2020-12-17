@extends('layouts.main')

@section('sub_title', '購入履歴')
@section('title', 'buyItemIndex')


@section('main_container')
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
          <th >支払状況</th>
          <td >{{$item->billed()}}</td>
        </tr>
      </table>
    @endforeach
  @endif
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection