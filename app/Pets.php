<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pets extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'type_id', 'name', 'edad', 'sexo'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function type_pets()
    {
        return $this->belongsTo('App\Type_pets', 'type_id');
    }
}
