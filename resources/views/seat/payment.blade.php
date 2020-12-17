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
      <h4>■購入商品一覧</h4>
      @if($seat->getHasNotBilled())
        @foreach($seat->getNotBilledProductAdjust() as $buyItem)
          @if($seat->getNotBilledTotalCount($buyItem->getProductName()) > 1)
            <div class="payment_product flex_between">
              <p class="flex_child">　{{$buyItem->getProductName()}}　x　{{$seat->getNotBilledTotalCount($buyItem->getProductName())}}</p>
              <p class="flex_child">¥{{$buyItem->getSumPrice($seat->getNotBilledTotalCount($buyItem->getProductName()))}}</p>
            </div>
          @else
            <div class="payment_product flex_between">
              <p class="flex_child">　{{$buyItem->getProductName()}}</p>
              <p class="flex_child">¥{{$buyItem->getSumPrice($seat->getNotBilledTotalCount($buyItem->getProductName()))}}</p>
            </div>
          @endif
        @endforeach
      @endif
      <hr>
      <h4>■セット</h4>
      @if($seat->setMenus !== null)
        @foreach($seat->getSetMenuAdjust() as $setMenu)
          <div class="payment_product flex_between">
            <p class="flex_child">　{{$setMenu->name}}　x　{{$seat->getSetMenuAdjustCount($setMenu->name)}}</p>
            <p class="flex_child">¥{{$setMenu->getSumPrice($seat->getSetMenuAdjustCount($setMenu->name))}}</p>
          </div>
        @endforeach
      @endif
      <hr>
      <h4>■その他（サービス）</h4>
      @if($seat->atherMenus !== null)
        @foreach($seat->getAtherMenuAdjust() as $atherMenu)
          <div class="payment_product flex_between">
            <p class="flex_child">　{{$atherMenu->name}}　x　{{$seat->getAtherMenuAdjustCount($atherMenu->name)}}</p>
            <p class="flex_child">¥{{$atherMenu->getSumPrice($seat->getAtherMenuAdjustCount($atherMenu->name))}}</p>
          </div>
        @endforeach
      @endif
      <hr>
      <div class="payment_product_title flex_between">
        <p class="flex_child">　　　小計</p>
        <p class="flex_child">¥{{$seat->getNotBilledTotalPrice()}}</p>
      </div>
      <div class="payment_product_title flex_between">
        <p class="flex_child">　　　サービス料（消費税含む）　15％</p>
        <p class="flex_child">¥{{$seat->getNotBilledServicePrice()}}</p>
      </div>
      <hr>
      <div class="payment_product_title flex_between">
        <h4 class="flex_child">合計</h4>
        <h4 class="flex_child">¥{{$seat->getNotBilledTotalPrice() + $seat->getNotBilledServicePrice()}}</h4>
      </div>
    </div>
  </div>

  <div class="submit_btn">
    <form action="/seat/{{$seat->id}}/pay" method="post">
      @csrf
      <input type="submit" value="支払い確定" class="btn">
    </form>
  </div>

@endsection

@section('footer')
copyright 2020 circrest.
@endsection