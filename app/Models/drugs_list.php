<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class drugs_list extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_drug',
        'item_name',
        'cost_price',
        'item_qty',
        'description'
    ];
}
