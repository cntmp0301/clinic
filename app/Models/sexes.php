<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sexes extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'sex_name'
    ];
}
