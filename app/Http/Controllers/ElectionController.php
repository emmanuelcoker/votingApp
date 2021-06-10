<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Candidate;

class ElectionController extends Controller
{
    public function showVotingPage(){
        $presidentials = empty(Candidate::where('seat','president'))?[]:Candidate::where('seat','president')->get();
        $vices = empty(Candidate::where('seat','vice-chair'))?[]:Candidate::where('seat','vice-chair')->get();
        $finances = empty(Candidate::where('seat','finance'))?[]:Candidate::where('seat','finance')->get();
        $secs = empty(Candidate::where('seat','sec-general'))?[]:Candidate::where('seat','sec-general')->get();
        return view('election.vote')
            ->withPresidentials($presidentials)
            ->withVices($vices)
            ->withFinances($finances)
            ->withSecs($secs);
    }

    public function showResults(){
        $presidentials = empty(Candidate::where('seat','president'))?[]:Candidate::where('seat','president')->get();
        $vices = empty(Candidate::where('seat','vice-chair'))?[]:Candidate::where('seat','vice-chair')->get();
        $finances = empty(Candidate::where('seat','finance'))?[]:Candidate::where('seat','finance')->get();
        $secs = empty(Candidate::where('seat','sec-general'))?[]:Candidate::where('seat','sec-general')->get();
        return view('election.results')
            ->withPresidentials($presidentials)
            ->withVices($vices)
            ->withFinances($finances)
            ->withSecs($secs);
        return view('election.results')->withCandidates($candidates);
    }

    public function vote(Request $vote){
        User::vote($vote->president,$vote->vice,$vote->secretary,$vote->finance);
        User::where('id',$vote->id)->delete();
        return redirect('logout');
    }
}
