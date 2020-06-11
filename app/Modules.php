<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modules extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'parameters', 'tag', 'icon'
    ];

    public function user()
    {
        return $this->belongsToMany('App\User', 'user_modules');
    }
}
