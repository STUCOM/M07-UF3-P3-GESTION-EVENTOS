<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'location',
        'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);

    }
    public function attendees()
    {
        return $this->belongsToMany(User::class, 'user_events_attendees')->withPivot('name', 'email');
    }
    
}
