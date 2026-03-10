<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    /** @use HasFactory<\Database\Factories\VolunteerFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'skills',
        'status',
        'joined_at',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'joined_at' => 'date',
        ];
    }
}
