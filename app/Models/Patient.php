<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function appointment()
    {
        return $this->hasMany(Appointment::class);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getFormattedGenderAttribute()
    {
        return ucwords($this->gender);
    }

    public function getRoleAttribute()
    {
        return ucwords($this->user->getRoleNames()->first());
    }

    public function getFormattedBirthdayAttribute()
    {
        return date('F d, Y', strtotime($this->birthday));
    }
}
