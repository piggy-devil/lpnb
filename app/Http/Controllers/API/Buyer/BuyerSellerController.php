<?php

namespace App\Http\Controllers\API\Buyer;

use App\Models\Buyer;
use Illuminate\Http\Request;
use App\Http\Controllers\API\ApiController;

class BuyerSellerController extends ApiController
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Buyer $buyer)
    {
        $sellers = $buyer->transactions()->with('product.seller')
            ->get()
            ->pluck('product.seller')
            ->unique('id')
            ->values();

        return $this->showAll($sellers);
    }
}
