<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Priviledges extends Model
{
    protected $table = 'priviledges';
    protected $fillable = [
        'type',
    ];

    public function seat(){
        return $this->hasMany('App\Seat');
    }

}
