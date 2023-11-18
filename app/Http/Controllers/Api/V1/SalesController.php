<?php

namespace App\Http\Controllers\Api\V1;

use App\Service\SaleService;
use Illuminate\Http\Request;
use App\Helper\UuidToIdParser;
use App\Http\Controllers\Controller;
use App\Http\Resources\ListSalesResource;

class SalesController extends Controller
{
    
    public function __construct(SaleService $saleService)
    {
        $this->saleService = $saleService;
    }

    /**
     * List all sales per shop
     */
    public function list($shop_uuid)
    {
        //Get the shop id from uuid
        $shop_id = UuidToIdParser::shopUuidToId($shop_uuid);
        
        $sales = $this ->saleService ->listSales($shop_id);

        $sales_resource =  new ListSalesResource($sales);

        $sales_resource ->additional([
            'status' => 200,
            'message' => 'Sales listed successfully',
        ]);

        return $sales_resource;
    }
}
