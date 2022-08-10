<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patient_log extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'patient_id',
        'status',
        'created_at'
    ];

    public function patient_list()
    {   
        return $this->hasOne(patient_list::class, 'patient_id', 'patient_id');
    }
}

