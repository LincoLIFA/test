<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_pets extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'reference'
    ];

    public function pets()
    {
        return $this->hasMany('App\Pets');
    }
}
