<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class drugs_list extends Model
{
    use HasFactory;
    protected $fillable = [
        'drug_id',
        'drug_name',
        'cost_price',
        'sell_price',
        'item_qty',
        'description'
    ];
}
