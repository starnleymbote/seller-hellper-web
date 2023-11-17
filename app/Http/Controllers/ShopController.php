<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\User;
use App\Service\ShopService;
use App\Http\Requests\StoreShopRequest;
use App\Http\Requests\UpdateShopRequest;


class ShopController extends Controller
{

    public function __construct(ShopService $shopService)
    {
        $this ->shopService = $shopService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shops = Shop::Select('uuid', 'name', 'profile_image', 'description')->get();

        return view('shop.list')->with('shops', $shops);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
    * List all of the shops that are owned by a given user
    */
    public function ownersShop($owner_id)
    {
        $shops = $this->shopService->listShops($owner_id);
        
        $owners_name = User::select('first_name', 'last_name')->first();

        return view('shop.user_shop_list', compact('shops', 'owners_name'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShopRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShopRequest $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shop $shop)
    {
        //
    }
}
