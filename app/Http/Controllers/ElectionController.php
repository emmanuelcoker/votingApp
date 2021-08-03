<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Seat;
use App\Priviledges;
use App\Department;
use App\Faculty;
use App\Candidate;
use App\VoteTime;

class ElectionController extends Controller
{
    public function showVotingPage(){
        $allSeats = Seat::all();
        foreach ($allSeats as $post) {
            $seats[] = $post->candidateSeat; 
        }
            return view('election.vote')
                ->withSeats($seats);


    }

    public function showResults(){

        $seats = Seat::all();
        //get all candidates for each seatss
        foreach ($seats as $post) {
            $candidates[] = $post->candidateSeat; 
        }
            return view('election.results')
                ->withSeats($seats)
                ->withCandidates($candidates);
    }

    public function vote(Request $vote){

        $user = User::find(auth()->user()->id);
        $votetime = VoteTime::find(1);
        $today = date("Y-m-d");
        // return $today;
        //check if the voting session has ended or not
        if($today >= $votetime->finish_time){
            return redirect('/')->with('alert','Voting Session Has Ended! Check Results');
        }
        if($user->vote_status == 'not voted' || $user->admission_status == 'In session'){
            $selectedCandidates = $vote->input('candidateIds');

            //find each user and update their votes
            foreach ($selectedCandidates as $person) {
                $person = (int)$person;
                $candidate = Candidate::find($person);
                $candidate->votes++;
                $candidate->save();
            }
            $user->vote_status = 'voted';
            $user->save();
            
            return redirect('logout');
        }else{
            return redirect('/')->with('alert','You are Ineligible to vote!');
        }
    
    }
}
