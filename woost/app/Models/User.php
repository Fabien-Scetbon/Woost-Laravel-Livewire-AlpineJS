<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;
use App\Enums\UserStatus;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'postalcode',
        'status',
        'is_ban',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast (assigner un type a une propriété)
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // renvoie une date formatée de created_at
    public function formatDate($date)
    {
        return Carbon::parse($date)->translatedFormat('d M Y à H:i');
    }

    // renvoie le nom complet
    public function fullName()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    // verifie les roles (status)
    public function hasRole($role)
    {
        return UserStatus::getDescription($this->status) === $role;
    }
}
