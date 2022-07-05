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
        'status'
    ];

    public function patient_list()
    {   
        return $this->hasOne(patient_list::class, 'patient_id', 'id');
    }
    public function sexname()
    {   
        return $this->hasOne(sexes::class, 'id', 'sex');
    }
}

