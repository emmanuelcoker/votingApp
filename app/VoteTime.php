<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoteTime extends Model
{
    protected $table = 'voting_time';
    protected $fillable = [
        'start_time',
        'finish_time'
    ];
}
