<?php

namespace App\Http\Controllers\API\Transaction;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\API\ApiController;

class TransactionSellerController extends ApiController
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Transaction $transaction)
    {
        $seller = $transaction->product->seller;

        return $this->showOne($seller);
    }
}
