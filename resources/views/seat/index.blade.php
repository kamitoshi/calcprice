@extends('layouts.main')

@section('title', 'Index')

@section('menubar')
   @parent
   インデックスページ
@endsection

@section('content')
  @foreach($seats as $seat)
    <table style="margin:30px 50px">
      <tr>
        <th>座席</th>
        <td>{{$seat->name}}</td>
      </tr>
      <tr>
        <th>座席種類</th>
        <td>{{$seat->getType()}}</td>
      </tr>
      <tr>
        <th>人数</th>
        <td>{{$seat->getGuestCount()}}</td>
      </tr>
      <tr>
        <th>使用状況</th>
        <td>{{$seat->getUseStatus()}}</td>
      </tr>
    </table>
    <div class="add_item_btn" style="margin:30px 50px">
      <a href="/seat/{{$seat->id}}/buy_item" class="btn">商品追加</a>
    </div>
    <div class="buy_item_index" style="margin:30px 50px">
      <h5>購入商品一覧</h5>
      <ul>
        @if($seat->buyItems != [])
          @foreach($seat->getProductAdjust() as $buyItem)
            @if($seat->getTotalCount($buyItem->getProductName()) > 1)
              <li>{{$buyItem->getProductName()}}　x　{{$seat->getTotalCount($buyItem->getProductName())}}</li>
            @else
              <li>{{$buyItem->getProductName()}}</li>
            @endif
          @endforeach
          <div class="payment_btn">
            <a href="/seat/{{$seat->id}}/payment" class="btn">支払いページへ</a>
          </div>
        @else
          <li>購入した商品がありません。</li>
        @endif
      </ul>
      
    </div>
    <hr>
  @endforeach

@endsection

@section('footer')
copyright 2020 tuyano.
@endsection