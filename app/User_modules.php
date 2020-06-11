<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_modules extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'modules_id'];

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
    public function modules()
    {
        return $this->belongsTo('App\Modules', 'modules_id');
    }
}
