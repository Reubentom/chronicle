<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderproductsmodel extends Model
{
    use HasFactory;
    protected $table="order_products";
    public $timestamps = false; 
}
