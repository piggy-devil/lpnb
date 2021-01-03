<?php

namespace App\Http\Controllers\API\Buyer;

use App\Models\Buyer;
use Illuminate\Http\Request;
use App\Http\Controllers\API\ApiController;

class BuyerProductController extends ApiController
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Buyer $buyer)
    {
        $products = $buyer->transactions()->with('product')
            ->get()
            ->pluck('product');

        return $this->showAll($products);
    }
}
