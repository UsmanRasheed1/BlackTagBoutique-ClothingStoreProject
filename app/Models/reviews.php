<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reviews extends Model
{
    use HasFactory;
    protected $table = 'reviews';
    //protected $primaryKey = ['Clothesid', 'Color'];
    public $timestamps = false;
    protected $fillable = [

        'clothesid' ,
        'reviewtext' ,
        'sentiment',
        'email' 
    ];
}
