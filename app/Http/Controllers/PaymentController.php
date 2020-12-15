<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\BuyItem;

class PaymentController extends Controller
{
    public function detail(Request $request, $id){
        $payment = BuyItem::find($id);
        return view("payment.detail", ["payment" => $payment]);
    }
}
