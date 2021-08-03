<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $table = 'seats';
    protected $fillable = [
        'position',
        'priviledge',
    ];

    public function candidateSeat(){
        return $this->hasMany('App\Candidate','seat');
    }

    public function priviledge(){
        return $this->hasOne('App\Priviledge','priviledge');
    }
}
