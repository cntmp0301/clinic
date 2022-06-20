<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patient_history extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_id',
        'order_id',
        'patient_symptoms',
        'date_history',
        'next_check'
    ];
}
