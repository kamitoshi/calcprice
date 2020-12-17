@extends('layouts.flex')

@section('sub_title', '購入商品追加')
@section('title', 'BuyItemAdd')

<form action="/buy_item/add" method="post">
  @csrf
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
    
      <table>
        <tr>
          <th>商品ID</th>
          <td><input type="number" name="product_id" value="{{old('product_id')}}"></td>
        </tr>
        <tr>
          <th>座席ID</th>
          <td><input type="number" name="seat_id" value="{{old('seat_id')}}"></td>
        </tr>
        <tr>
          <th></th>
          <td></td>
        </tr>
      </table>
      <hr>
  @endsection

  @section('left_content')
    <h5 class="text_center">Bottle〜ボトル〜</h5>
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
            
            <select name="buy{{$product->id}}">
              <option value="no_data">個数を選択</option>
              @for($i=1; $i<=$product->count; $i++)
                <option value="{{$i}}">{{$i}}</option>
              @endfor
          </td>
        </tr>
      @endforeach
    </table>
  @endsection
  @section('center_content')
    <h5 class="text_center">Set〜セット〜</h5>
    <table>

    </table>
  @endsection
  @section('right_content')
    <h5 class="text_center">Ather〜その他〜</h5>
    <table>

    </table>
  @endsection

  <div class="submit_btn">
    <input type="submit" value="登録">
  </div>
</form>
@section('footer')
copyright 2020 tuyano.
@endsection