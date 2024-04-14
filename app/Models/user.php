<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Contracts\Auth\MustVerifyEmail;


class user extends Model
{
    use HasFactory;
    protected $table = 'user';
    public $timestamps = false;

    protected $fillable = [

        'Email' ,
        'First_Name' ,
        'Last_Name' ,
        'password' , 
    ];
}
