<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferralLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'consultant_id', 'referrer_id'
    ];

    public function consultant()
    {
        return $this->belongsTo(Consultant::class, 'consultant_id');
    }

    public function referrer()
    {
        return $this->belongsTo(Consultant::class, 'referrer_id');
    }
} 
 