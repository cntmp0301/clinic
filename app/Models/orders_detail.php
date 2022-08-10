<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'drug_id',
        'amount',
        'price'
    ];

    public function dname()
    {
        return $this->hasOne(drugs_list::class, 'drug_id', 'drug_id');
    }
}
