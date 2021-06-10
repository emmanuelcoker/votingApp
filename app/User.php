<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','regno'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function candidate(){
        return $this->hasOne('App\Candidate');
    }

    public function registerVoter($name,$email,$password,$regno){
        $newVoter = new User;
        $newVoter->name = $name;
        $newVoter->email = $email;
        $newVoter->password = bcrypt($password);
        $newVoter->regno = $regno;
        $newVoter->role_id = 2;
        $newVoter->save();
    }
    public static function addCandidate($studentId,$seat){
        $user = User::find($studentId);
        (new Candidate)->add($user->name,$seat,$user->regno,$user->id);
    }

     public static function vote($president,$vice,$secretary,$finance){
         Candidate::vote($president,$vice,$secretary,$finance);
     }
}
