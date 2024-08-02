<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultant extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
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
        'referralCode',
        'password',
    ];

    
    public function referralsMade()
    {
        return $this->hasMany(ReferralLog::class, 'referrer_id', 'id');
    }
 
    public function referralsReceived()
    {
        return $this->hasMany(ReferralLog::class, 'consultant_id', 'id');
    }

   

}
