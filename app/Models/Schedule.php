<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
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
}
