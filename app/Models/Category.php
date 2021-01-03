<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $hidden = [
        'pivot'
    ];
    
    protected $dates = ['deleted_at'];
    public $incrementing = false;

    protected $fillable = [
        'id',
    	'name',
    	'description',
    ];

    public function products()
    {
    	return $this->belongsToMany(Product::class);
    }
}
