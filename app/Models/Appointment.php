<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    // Define the table name
    protected $table = 'appointments';

    // Mass assignable fields
    protected $fillable = [
        'user_id',
        'package_id',
        'date',
        'time',
        'gender',
        'consultation_filled',
        'payment_status',
        
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
}
