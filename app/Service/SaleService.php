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
        $sales = Sales::select('uuid', 'quantity', 'amount', 'sold_by', 'shop_id')->where('id', $shop_id)->get();

        return $sales;
    }

}