<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'location',
        'land_size',
        'content',
        'brochure',
        'land_payment_plan',
        'subscription_form',
        'video_link',
        'image',
    ];
}
