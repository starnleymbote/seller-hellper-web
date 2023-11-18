<?php

namespace App\Http\Controllers\Api\V1;

use App\Service\SaleService;
use Illuminate\Http\Request;
use App\Helper\UuidToIdParser;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSalesRequest;
use App\Http\Resources\SalesResource;
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSalesRequest $request)
    {

        $this->saleService ->store(new Request(
        
            $request ->validated()
        
        ));

        $store_sale_resource = new SalesResource(['Data inserted']);

        $store_sale_resource ->additional([
            'status' => 200,
            'message' => 'Sales stored successfully',
        ]);

        return $store_sale_resource;
    }
}
