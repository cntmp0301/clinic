<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item_list extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_item',
        'item_name',
        'cost_price',
        'item_qty',
        'description'
    ];
}
