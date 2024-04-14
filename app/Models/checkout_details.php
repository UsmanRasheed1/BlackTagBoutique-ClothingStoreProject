<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checkout_details extends Model
{
    use HasFactory;
    protected $table = 'checkout_details';
    public $timestamps = false;

    protected $fillable = [

        'email' ,
        'phonenum' ,
        'Address' ,
        'Comments' , 
    ];
}
