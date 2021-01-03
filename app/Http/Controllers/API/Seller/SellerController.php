<?php

namespace App\Http\Controllers\API\Seller;

use App\Models\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\ApiController;

class SellerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellers = Seller::has('products')->get();

        return $this->showAll($sellers);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function show(Seller $seller)
    {
        return $this->showOne($seller);
    }

}
