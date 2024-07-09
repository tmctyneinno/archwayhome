<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultant extends Model
{
    use HasFactory;
    protected $fillable = [
        'fullname',
        'phone',
        'email',
        'date_of_birth',
        'gender',
        'city',
        'country',
        'state',
        'address',
        'account_name',
        'account_number',
        'bank',
    ];
}
