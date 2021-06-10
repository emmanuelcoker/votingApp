<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\Candidate;

class AdminController extends Controller
{
    public function showIndex(){
        $users = User::all()->except(1);
        return view('admin.index')->withUsers($users);
    }

    public function getCandidates(){
        $candidates = Candidate::all();
        return view('admin.candidates')->withCandidates($candidates);
    }

    public function addCandidate(Request $data){
        User::addCandidate($data->id,$data->seat);
        return redirect()->route('admin.index');
    }
}
