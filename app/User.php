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

    public function user_faculty(){
        return $this->belongsTo('App\Faculty','faculty');
    }

    public function department(){
        return $this->belongsTo('App\Department','dept');
    }

    public function registerVoter($name,$email,$password,$regno,$dept,$faculty){
        $newVoter = new User;
        $newVoter->name = $name;
        $newVoter->email = $email;
        $newVoter->password = bcrypt($password);
        $newVoter->regno = $regno;
        $newVoter->role_id = 2;
        $newVoter->dept = $dept;
        $newVoter->faculty = $faculty;
        $newVoter->admission_status = "In Session";
        $newVoter->save();
    }


    public static function addCandidate($studentId,$seat,$priviledge,$profile_img){
        $user = User::find($studentId);
        $newCandidate = new Candidate;
        $newCandidate->name = $user->name;
        $newCandidate->seat = $seat;
        $newCandidate->regno = $user->regno;
        $newCandidate->user_id = $user->id;
        $newCandidate->priviledge = $priviledge;
        $newCandidate->votes = 0;
        $newCandidate->profile_img = $profile_img;
        $newCandidate->save();
    }

    //  public static function vote($president,$vice,$secretary,$finance){
    //      Candidate::vote($president,$vice,$secretary,$finance);
    //  }
}
