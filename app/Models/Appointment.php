<?php

namespace App\Models;

use App\Models\Message;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'appointmentstatus',
    ];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
