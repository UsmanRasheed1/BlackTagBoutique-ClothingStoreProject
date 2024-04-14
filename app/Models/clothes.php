<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clothes extends Model
{
    use HasFactory;
    protected $table = 'clothes';
    protected $primaryKey = 'Clothesid';

    public $timestamps = false;

    protected $fillable = [

        'Clothesid' ,
        'clothes_name' ,
        'category',
        'Price' ,
        'picture' , 
    ];

}
