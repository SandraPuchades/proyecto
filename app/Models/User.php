<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
    use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable {
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;

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
?>
