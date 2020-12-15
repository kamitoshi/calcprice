@extends('layouts.main')

@section('title', 'Payment')

@section('menubar')
   @parent
   支払い確定ページ
@endsection

@section('main_container')
  <div class="payment">
    <h2 class="payment_title">支払い詳細</h2>
    <h3 class="payment_seat">{{$seat->name}}</h3>
    <hr>
    <div class="payment_detail">
      <h5>購入商品一覧</h5>
      <div class="payment_product_title flex_between">
        <p class="flex_child">商品名</p>
        <p class="flex_child">価格</p>
      </div>
      @foreach($seat->getProductAdjust() as $buyItem)
        @if($seat->getTotalCount($buyItem->getProductName()) > 1)
          <div class="payment_product flex_between">
            <p class="flex_child">{{$buyItem->getProductName()}}　x　{{$seat->getTotalCount($buyItem->getProductName())}}</p>
            <p class="flex_child">¥{{$buyItem->getSumPrice($seat->getTotalCount($buyItem->getProductName()))}}</p>
          </div>
        @else
          <div class="payment_product flex_between">
            <p class="flex_child">{{$buyItem->getProductName()}}</p>
            <p class="flex_child">¥{{$buyItem->getSumPrice($seat->getTotalCount($buyItem->getProductName()))}}</p>
          </div>
        @endif
      @endforeach
      <div class="payment_product_title flex_between">
        <p class="flex_child">小計</p>
        <p class="flex_child">¥{{$seat->getTotalPrice()}}</p>
      </div>
      <div class="payment_product_title flex_between">
        <p class="flex_child">サービス料（消費税含む）　15％</p>
        <p class="flex_child">¥{{$seat->getServicePrice()}}</p>
      </div>
      <hr>
      <div class="payment_product_title flex_between">
        <h4 class="flex_child">合計</h4>
        <h4 class="flex_child">¥{{$seat->getTotalPrice() + $seat->getServicePrice()}}</h4>
      </div>
    </div>
  </div>

  <div class="submit_btn">
    <input type="submit" value="支払い確定" class="btn">
  </div>

@endsection

@section('footer')
copyright 2020 circrest.
@endsection