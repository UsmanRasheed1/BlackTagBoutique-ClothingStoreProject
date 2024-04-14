<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer_receipts extends Model
{
    use HasFactory;
    protected $table = 'customer_receipts';
    public $timestamps = false;
}
