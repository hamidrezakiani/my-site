<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class History extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['year','year_fa','year_ar','text','text_fa','text_ar'];
}
