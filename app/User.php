<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'created_at', 'updated_at'
    ];

    protected $appends = [
        'link'
    ];

     public function posts() {
         return $this->hasMany('App\Models\Post');
     }

    public function getLinkAttribute() {
        return url('profile/'. $this->id);
    }

    public function getEmailAttribute($value) {
        return strtoupper($value);
    }

    public function scopeDiegodev($query)
    {
        return $query->where('email', 'like', '%@diegodev.com');
    }

    public function scopeOfRole($query, $type)
    {
        return $query->whereRole($type);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords(strtolower($value));
    }

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }
}
