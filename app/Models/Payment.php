<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'payment_mode',
        'receipt',
        'account_name',
        'bank_name',
        'account_number',
        'reference'
    ];
}
