<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purchase_order_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'po_id',
        'id_drug',
        'drug_amount',
        'cost_price'
    ];
}
