<?php

namespace App\Models;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'city',
        'logo',
        'postal_code',
        'status',
        'is_admin',
    ];

    public function appointments()
    {
        return $this->hasMany(appointment::class, 'user_id');
    }

   

    // The $hidden array specifies which fields should be hidden from JSON serialization
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // The following methods are required by the Authenticatable interface

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}
