@extends('layouts.flex')

@section('title', 'Add')

@section('menubar')
   @parent
   購入商品登録ページ
@endsection


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

  <h4>席：{{$seat->name}}</h4>
    
@endsection


  @section('left_content')
    <form action="buy_item" method="post">
      @csrf
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
      <input type="hidden" name="seat_id" value={{$seat->id}}>
      <div class="submit_btn">
        <input type="submit" value="商品の追加">
      </div>
    </form>
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

  

@section('footer')
copyright 2020 tuyano.
@endsection