<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class colors extends Model
{
    use HasFactory;
    protected $table = 'colors';
    //protected $primaryKey = ['Clothesid', 'Color'];
    public $timestamps = false;
    protected $fillable = [

        'Clothesid' ,
        'Color' ,
        'picture' , 
    ];
}
