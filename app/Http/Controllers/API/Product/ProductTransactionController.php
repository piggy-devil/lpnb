<?php

namespace App\Http\Controllers\API\Product;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\API\ApiController;

class ProductTransactionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $transactions = $product->transactions;

        return $this->showAll($transactions);
    }
}
