<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqsSubmitForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'phone_no',
        'property_type',
        'location',
        'message'
    ];

    public function projectMenu()
    {
        return $this->belongsTo(ProjectMenu::class, 'property_type');
    }
}
