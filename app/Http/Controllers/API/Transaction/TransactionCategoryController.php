<?php

namespace App\Http\Controllers\API\Transaction;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\API\ApiController;

class TransactionCategoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Transaction $transaction)
    {
        $categories = $transaction->product->categories;

        return $this->showAll($categories);
    }
}
