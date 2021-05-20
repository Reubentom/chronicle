<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipaddmodel extends Model
{
    use HasFactory;
    protected $table="shipping";
    public $timestamps = false; 

}
