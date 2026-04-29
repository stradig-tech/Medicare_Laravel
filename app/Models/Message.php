<?php

namespace App\Models;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;
    protected $table = 'messages';
    protected $fillable = [
        'appointmentid', 'message', 'doctorid', 'doctorname', 'patientid', 'patientname','doctorpicture'
    ];
    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}
