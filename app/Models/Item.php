<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['product_id','name','name_fa','name_ar','pdf'];

    public function catalogs()
    {
        return $this->hasMany(Catalog::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
