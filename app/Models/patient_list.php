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
        'contact',
        'sex',
        'age',
        'drug_allergy',
        'users_image',
        'line_id',
        'type',
        'status'
    ];

    public function sexname()
    {
        return $this->hasOne(sex::class, 'id', 'sex');
    }
}
