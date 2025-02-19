<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Worksheet extends Model
{
    protected $fillable = [
        'created_by',
        'title',
        'content',
    ];

    public function professor()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function studentWorksheets()
    {
        return $this->hasMany(StudentWorksheet::class);
    }
}


