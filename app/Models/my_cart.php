<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class my_cart extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'my_cart';

    protected $fillable = [
        'email' ,
        'Clothes_Name' ,
        'Clothesid' ,
        'Color' ,
        'Clothesize' ,
        'Quantity' ,
        'Price' ,
        'Picture' ,
        // Other fillable attributes...
    ];

}
