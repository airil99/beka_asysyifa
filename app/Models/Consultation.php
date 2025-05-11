<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'medical_conditions',
        'allergies',
        'reason_for_appointment',
        'acknowledgment_risks',
        'terms_agreement',
    ];
}
