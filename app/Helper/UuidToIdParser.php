<?php

namespace App\Helper;

use App\Models\Shop;

class UUIDToIdParser{

    public static function shopUuidToId($shop_uuid)
    {

        $shop_id = Shop::select('id')->where('uuid', $shop_uuid)->first();

        return $shop_id ->id; 
    }

}