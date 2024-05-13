<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'gender',
        'marital_status',
        'nationality',
        'state',
        'dob_day',
        'dob_month',
        'dob_year'
    ];
}
