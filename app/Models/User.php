<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable {
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;

    protected $fillable = [
        'user_name',
        'fullname',
        'email',
        'password',
        'confirm_password',
        'date_birth',
        'operations',
        'whereoperation',
        'description',
    ];

    protected $hidden = [
        'password',
        'confirm_password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
        'confirm_password' => 'hashed',
    ];
}
