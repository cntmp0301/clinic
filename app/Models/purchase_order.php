<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purchase_order extends Model
{
    use HasFactory;
    protected $fillable = [
        'po_id',
        'po_date',
        'supplier_id'
    ];
}
