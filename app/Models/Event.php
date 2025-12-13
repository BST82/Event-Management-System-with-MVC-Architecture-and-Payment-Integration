<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // The fields that are mass assignable
    protected $fillable = [
        'title',
        'description',
        'date',
        'start_time',
        'end_time',
        'sangeet_details',
        'food_option',
        'price',
    ];

    // Cast attributes to native types for proper handling
    protected $casts = [
        'date' => 'date', // Casts 'date' to a Carbon instance
        'start_time' => 'datetime', // You might use 'datetime' if you want Carbon for time as well
        'end_time' => 'datetime',
    ];

    /**
     * Helper to format the time display (e.g., 10:00 AM)
     */
    public function getFormattedTimeAttribute()
    {
        // Assuming start_time and end_time are stored in a time format (e.g., 10:00:00)
        // You may need to adjust this if your database stores them differently.
        return \Carbon\Carbon::parse($this->start_time)->format('h:i A') . 
               ' - ' . 
               \Carbon\Carbon::parse($this->end_time)->format('h:i A');
    }
}