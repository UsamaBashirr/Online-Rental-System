<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $table="products";
    protected $fillable=array('name','price','details','subcatid','quantity','img1','img2','shopid');
}
