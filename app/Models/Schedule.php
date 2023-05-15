<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;

class Schedule extends Model
{
    use HasFactory, Searchable;

    protected $guarded = [];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function appointment()
    {
        return $this->hasMany(Schedule::class);
    }

    public function getFormattedDateAttribute()
    {
        return date('F d, Y', strtotime($this->date));
    }

    public function getFormattedStartTimeAttribute()
    {
        return date("g:i A", strtotime($this->start_time));
    }

    public function getFormattedEndTimeAttribute()
    {
        return date("g:i A", strtotime($this->end_time));
    }

    public function toSearchableArray()
    {
        return [
            'day' => $this->day,
        ];
    }
}
