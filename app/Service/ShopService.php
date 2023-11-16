<?php

namespace App\Service;

use Auth;
use App\Models\Shop;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ShopService{


    public function createShop(Request $request){

        $shop = new Shop;

        $shop ->uuid = Str::uuid();
        $shop ->name = $request ->input('name');
        $shop ->user_id = Auth::user()->id;
        $shop ->description = $request ->input('description');
        $shop ->profile_image = $request ->input('profile_image');

        $shop ->save();

    }

}