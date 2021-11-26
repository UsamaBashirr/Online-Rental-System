<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shop extends Model
{
   protected $table="shop";
   protected $fillable=array('fname','lname','phoneno','cnic','email','password','shopname','shopaddress','approve','status');
}

