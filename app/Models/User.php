<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
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
        'stripe_token'
    ]; // add here all fields that must not be exposed to the client when serializing
    //if these data are needed must be explicitly included in the endpoint response
//    protected $visible = ['name', 'email', ...]; the opposite of hidden, here we put only the data to be serialized and exposed to the client
// protected $visible = ['*']; equivalent to overriding the toArray method and returning []
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

//    public function toArray()
//    {
//        return [];
//    } it can be useful when migrating to SPA from a standard server side web app to remove all data exposed to the client
// with this in place, the data from the user model to be sent to the client must be manually selected for the endpoint response
}
