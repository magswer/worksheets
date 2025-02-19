<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function worksheets()
    {
        return $this->hasMany(Worksheet::class, 'created_by');
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class, 'student_id');
    }

    public function studentWorksheets()
    {
        return $this->hasMany(StudentWorksheet::class, 'student_id');
    }
}
