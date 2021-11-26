<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cartitem extends Model
{
    use HasFactory;
    protected $table="cartitem";
    protected $fillable=array('userid','proid','quantity', 'startdate', 'enddate', 'days', 'totalPrice');
}
