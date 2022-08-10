<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patient_list extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'nickname',
        'tel',
        'address',
        'sex',
        'birthdate',
        'drug_allergy',
        'users_image',
        'line_id',
        'type',
        'status'
    ];

    public function sexname()
    {
        return $this->hasOne(sexes::class, 'id', 'sex');
    }
}
