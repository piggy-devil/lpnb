<?php

namespace App\Http\Controllers\API\Transaction;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\API\ApiController;

class TransactionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tramsactions = Transaction::all();

        return $this->showAll($tramsactions);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        return $this->showOne($transaction);
    }
}
