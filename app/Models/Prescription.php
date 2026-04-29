<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    protected $table = 'prescriptions';
    protected $fillable = [
        'appointmentid', 'medicine', 'suggestions', 'doctorid', 'doctorname', 'patientid', 'patientname', 'patientpicture', 'test'
    ];
}
