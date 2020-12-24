@extends('layouts.flex_use')

@section('sub_title', '商品購入')
@section('title', 'BuyItemAdd')

@section('content')
  @if(count($errors) > 0)
    <div class="error_message_field">
      <ul class="error_message">
        @foreach($errors as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <h2 class="ma-x-30">{{$seat->name}}</h2>
    
@endsection

@section('main_box') 
  <form action="buy_item" method="post">
    @csrf
    <div class="flex">
      <div class="flex_child">
        <h3 class="text_center">Bottle〜ボトル〜</h3>
        <table>
          <tr>
            <th>商品名</th>
            <th>在庫</th>
          </tr>
          @foreach($products as $product)
            <tr>
              <td>{{$product->name}}</td>
              <td Style="text-align:center">{{$product->count}}</td>
              <td>
                <select name="{{$product->name}}">
                  <option value="">個数を選択</option>
                  @for($i=1; $i<=$product->count; $i++)
                    <option value={{$i}}>{{$i}}</option>
                  @endfor
                </select>
              </td>
            </tr>
          @endforeach
        </table>
      </div>
      <div class="flex_child">
        <h3 class="text_center">Set〜セット〜</h3>
        <table>
          @foreach($setMenus as $setMenu)
            <tr>
              <td>{{$setMenu->name}}</td>
              <td width="100px">¥{{$setMenu->price}}</td>
              <td>
                <select name="{{$setMenu->name}}">
                  <option value="">-</option>
                  <option value={{$setMenu->id}}>追加</option>
                </select>
              </td>
            </tr>
          @endforeach
        </table>
      </div>
      <div class="flex_child">
        <h3 class="text_center">Cast〜キャスト〜</h3>
        <table>
          @foreach($casts as $cast)
            <tr>
              <td>{{$cast->name}}</td>
              <td>
                <select name="{{$cast->name}}">
                  <option value="">-</option>
                  <option value={{$cast->id}}>指名</option>
                </select>
              </td>
            </tr>
          @endforeach
        </table>
        <h3 class="text_center">Ather〜その他〜</h3>
        <table>
          @foreach($atherMenus as $atherMenu)
            <tr>
              <td>{{$atherMenu->name}}</td>
              <td>
                <select name="{{$atherMenu->name}}">
                  <option value="">-</option>
                  <option value={{$atherMenu->id}}>追加</option>
                </select>
              </td>
            </tr>
          @endforeach
        </table>
      </div>
    </div>
    <input type="hidden" name="seat_id" value={{$seat->id}}>
    <div class="submit_btn">
      <input type="submit" value="追加" class="btn">
    </div>
  </form>
@endsection 

@section('footer')
copyright 2020 tuyano.
@endsection