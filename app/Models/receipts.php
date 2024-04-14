<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class receipts extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'receipts';

    protected $fillable = [
        'Email' ,
        'ReceiptText' ,
        'TotalPrice' 
        
        // Other fillable attributes...
    ];
}
