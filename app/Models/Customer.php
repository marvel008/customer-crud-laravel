<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory , SoftDeletes;


    protected $fillable=[
        'image',
            'first_name',
            'last_name',
            'phone',
            'email',
            'bank_account_number',
            'about',
    ];
}
