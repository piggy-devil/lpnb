<?php

namespace App\Http\Controllers\API\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\API\ApiController;

class CategorySellerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $sellers = $category->products()
            ->with('seller')
            ->get()
            ->pluck('seller')
            ->unique()
            ->values();

        return $this->showAll($sellers);
    }
}
