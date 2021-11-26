<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rentproducts extends Model
{
    use HasFactory;
    protected $table = "rentproducts";
    protected $fillable = array('customerid', 'TxnRefNo', 'description', 'status', 'amount');
}
