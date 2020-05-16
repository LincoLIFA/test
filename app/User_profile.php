<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_profile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'profile_id'];

    /**
     * Asocia los los usuarios
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }


    /**
     * Asocia los perfiles
     */
    public function profile()
    {
        return $this->belongsTo('App\Profile', 'profile_id');
    }
}
