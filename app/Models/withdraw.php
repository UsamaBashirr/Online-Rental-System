<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class withdraw extends Model
{
    use HasFactory;
    protected $table="withdraw";
    protected $fillable=array('shopid', 'withdrawto', 'phonenumber', 'withdrawamount','AmountStatus');
}
