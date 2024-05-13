<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passport extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'passport_no',
        'issued_day',
        'issued_month',
        'issued_year',
        'data_page'
    ];
}
