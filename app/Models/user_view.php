<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_view extends Model
{
    use HasFactory;
    protected $table = 'user-view';
    public $timestamps = false;
}
