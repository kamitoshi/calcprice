@extends('layouts.main')

@section('sub_title', '座席一覧')
@section('title', 'seatIndex')

@section('main_container')
  @foreach($seats as $seat)
    <div class="flex">
      <div class="flex_child">
        <h2 class="ma-x-30">{{$seat->name}}</h2>
        <div class="seat_name flex ma-x-30">
          <div class="flex_child">
            <p>座席種類</p>
          </div>
          <div class="flex_child">
            <p>{{$seat->getType()}}</p>
          </div>
        </div>
        <div class="seat_name flex ma-x-30">
          <div class="flex_child">
            <p>人数</p>
          </div>
          <div class="flex_child">
            <p>{{$seat->getGuestCount()}}</p>
          </div>
        </div>
        <div class="seat_name flex ma-x-30 ma-t-50">
          <div class="flex_child">
            <p>使用状況</p>
          </div>
          <div class="flex_child">
            <p>{{$seat->getUseStatus()}}</p>
          </div>
        </div>
      </div>
      <div class="flex_child">
        @if($seat->hasUse == false)
          <div class="coming_btn" style="margin:30px 50px">
            <form action="/seat/coming" method="post">
              @csrf
              <div class="form_area">
                <div class="select_box center">
                  <select name="guest_count">
                    <option value="">人数を選択</option>
                    @for($i=1; $i<=10; $i++)
                      <option value={{$i}}>{{$i}}</option>
                    @endfor
                  </select>
                </div>
                <input type="hidden" name="seat_id" value={{$seat->id}}>
                <div class="submit_btn">
                  <input type="submit" value="確定" class="btn">
                </div>
              </div>
            </form>
          </div>
        @else
          <div class="buy_item_index_box">
            <h4 class="ma-b-20">購入商品一覧</h4>
            <div class="buy_item_index">
              @foreach($seat->getNotBilledProductAdjust() as $buyItem)
                @if($seat->getNotBilledTotalCount($buyItem->getProductName()) > 1)
                  <p>{{$buyItem->getProductName()}}　x　{{$seat->getNotBilledTotalCount($buyItem->getProductName())}}</p>
                @else
                  <p>{{$buyItem->getProductName()}}</p>
                @endif
              @endforeach
              <h4 class="ma-b-20">セット一覧</h4>
              @foreach($seat->getSetMenuAdjust() as $setMenu)
                <p>{{$setMenu->name}}　x　{{$seat->getSetMenuAdjustCount($setMenu->name)}}</p>
              @endforeach
              <h4 class="ma-b-20">その他一覧</h4>
              @foreach($seat->getAtherMenuAdjust() as $atherMenu)
                <p>{{$atherMenu->name}}　x　{{$seat->getAtherMenuAdjustCount($atherMenu->name)}}</p>
              @endforeach
              
              <div class="add_item_btn ma-30 right">
                <a href="/seat/{{$seat->id}}/buy_item" class="btn">商品追加</a>
              </div>
              <div class="payment_btn right ma-t-50 ma-r-30">
                <a href="/seat/{{$seat->id}}/payment">支払いページへ</a>
              </div>
              
            </div>
          </div>
        @endif
      </div>
    </div>
    <hr>
  @endforeach

@endsection

@section('footer')
copyright 2020 tuyano.
@endsection