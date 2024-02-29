<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Catalog extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['item_id','name','name_fa','name_ar','pdf'];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
