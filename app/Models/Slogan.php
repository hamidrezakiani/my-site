<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slogan extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['title','title_fa','title_ar','text','text_fa','text_ar','image'];
}
