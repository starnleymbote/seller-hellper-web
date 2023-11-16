<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;

use Auth;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Service\ShopService;
use App\Http\Resources\ShopResource;
use App\Http\Requests\StoreShopRequest;

class ShopController extends Controller
{
    public function __construct(ShopService $shopService)
    {
        $this->shopService = $shopService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Shop::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShopRequest $request)
    {

        $this->shopService->createShop(new Request(
            
            $request ->validated()
        
        ));

        $shop =  new ShopResource($request);

        $shop->additional([
            'status' => 201,
            'message' => 'Shop '. $request->input('name') .' created successfully',
        ]);

        return $shop;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
