<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stocks_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'stock_id',
        'drug_id',
        'amount'
    ];
}
