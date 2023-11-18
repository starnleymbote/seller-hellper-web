<?php

namespace App\Service;

use Auth;
use App\Models\User;
use App\Models\Sales;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SaleService{

    /**
     * List Sales per shop
     */
    public function listSales($shop_id)
    {
        $sales = Sales::select('uuid', 'quantity', 'amount', 'sold_by', 'shop_id')->where('shop_id', $shop_id)->get();

        return $sales;
    }


    /**
     * Store a sales record
     */
    public function store(Request $request)
    {

        $store_sale = new Sales;

        $store_sale ->uuid = Str::uuid();
        $store_sale ->quantity = $request ->input('quantity');
        $store_sale ->amount = $request ->input('amount');
        $store_sale ->sold_by = Auth::user()->id;
        $store_sale ->shop_id = $request ->input('shop_id');

        $save = $store_sale ->save(); 


    }

}