<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\Candidate;
use App\Faculty;
use App\Department;
use App\Seat;
use App\Priviledges;
use App\VoteTime;

class AdminController extends Controller
{
    public function showIndex(){
        $users = User::all()->except(1);
        $seats = Seat::all();
        $departments = Department::all();
        $faculties = Faculty::all();

       
        
        return view('admin.index')
        ->withUsers($users)
        ->withSeats($seats)
        ->withDepartments($departments)
        ->withFaculties($faculties);
    }

    public function searchUser(Request $request){
        $search = $request->input('search');
        $users = User::where('regno',$search)->get();
        $seats = Seat::all();
        $departments = Department::all();
        $faculties = Faculty::all();
        return view('admin.index')
        ->withUsers($users)
        ->withSeats($seats)
        ->withDepartments($departments)
        ->withFaculties($faculties);
    }

    public function searchCandidate(Request $request){
        $search = $request->input('search');
        $candidates = Candidate::where('regno',$search)->get();
        $priviledges = Priviledges::all();
        return view('admin.candidates')->
        withCandidates($candidates)
        ->withPriviledges($priviledges);
    }

    public function getCandidates(){
        $candidates = Candidate::all();
        $priviledges = Priviledges::all();
        return view('admin.candidates')
        ->withCandidates($candidates)
        ->withPriviledges($priviledges);
    }

    public function addCandidate(Request $data){
        User::addCandidate($data->id,$data->seat,$data->priviledge,$data->profile_img);
        return redirect()->route('admin.index');
    }

    public function addPriviledge(Request $request){
        $priviledge = Priviledges::Create([
            'type' => $request->input('priviledge')
        ]);
        return redirect()->route('admin.candidates');
    }

    public function addSeat(Request $request){
        $seat = Seat::Create([
            'position' => $request->input('seat'),
            'priviledge' => $request->input('priviledge')
        ]);
        return redirect()->route('admin.candidates');
    }

    public function addDepartment(Request $request){
        $department = Department::Create([
            'name' => $request->input('department'),
            'faculty_id' => $request->input('faculty')
        ]);
        return redirect()->route('admin.department');
    }

    public function addFaculty(Request $request){
        $faculty = Faculty::Create([
            'name' => $request->input('faculty')
        ]);
        return redirect()->route('admin.faculty');
    }

    public function department(){
        $departments = Department::all();
        $faculties = Faculty::all();
        return view('admin.department')
        ->withDepartments($departments)
        ->withFaculties($faculties);
    }

    public function faculty(){
         $faculties = Faculty::all();
        return view('admin.faculty')->withFaculties($faculties);
    }

    public function seat(){
        $seats = Seat::all();
        $priviledges = Priviledges::all();
        return view('admin.seat')
        ->withseats($seats)
        ->withPriviledges($priviledges);
    }


    //edit 
    public function editStudent($id){
        $user = User::find($id);
        $departments = Department::all();
        $faculties = Faculty::all();
        return view('inc.editUser')
            ->withUser($user)
            ->withDepartments($departments)
            ->withFaculties($faculties);
    }


    public function updateStudent(Request $request, $id){
        $this->validate($request,[
            'name' => 'required',
            'regno' => 'required',
            'dept' => 'required',
            'faculty' => 'required',
            'admission_status' => 'required',
        ]);
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->regno = $request->input('regno');
        $user->dept = $request->input('dept');
        $user->faculty = $request->input('faculty');
        $user->admission_status = $request->input('admission_status');
        $user->save();
        
        return redirect()->route('admin.index');
    }

    
    public function showCandidate($id){
        $candidate = Candidate::find($id);
        $seats = Seat::all();
        $finddepartment = Department::findorfail($candidate->user->dept);
        $department = $finddepartment->name;
        $findfaculty = Faculty::findorfail($candidate->user->faculty);
        $faculty = $findfaculty->name;
        return view('admin.candidateProfile')
            ->withCandidate($candidate)
            ->withDepartment($department)
            ->withFaculty($faculty)
            ->withSeats($seats);
    }


    public function editCandidate($id){
        $candidate = Candidate::find($id);
        $seats = Seat::all();
        return view('inc.editCandidate')
            ->withCandidate($candidate)
            ->withSeats($seats);
    }

    public function updateCandidate(Request $request, $id){
        $this->validate($request,[
            'name' => 'required',
            'seat' => 'required',
            'profile_img' => ['Image','mimes:jpg,png,jpeg,gif'],
        ]);
        $candidate = Candidate::find($id);
        $candidate->name = $request->input('name');
        $candidate->seat = $request->input('seat');

          //Handle file upload
    if($request->hasFile('profile_img')){
        //get filename with the extension
        $filenameWithExt = $request->file('profile_img')->getClientOriginalName();
       
        //get just filename
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        
        //get just extension
        $extension = $request->file('profile_img')->getClientOriginalExtension();
        // file name to store
        $filenameToStore = $filename.'_'.time().'.'.$extension;

        //upload image

        $path = $request->file('profile_img')->storeAs('public/img', $filenameToStore);
      }
     
        $candidate->profile_img = $filenameToStore;

       
        $candidate->save();
        
        return redirect()->route('admin.candidates');
    }

    //delete sections

    public function destroyStudent($id){
        $user = User::find($id);
        $user->delete();
        return  redirect()->route('admin.index');
    }

    public function destroyCandidate($id){
        $candidate = Candidate::find($id);
        $candidate->delete();
        return  redirect()->route('admin.candidate');
    }

    public function destroySeat($id){
        $seat = Seat::find($id);
        $seat->delete();
        return  redirect()->route('admin.seat');
    }


    //vote time

    public function editVoteTime($id){
        $votetime = VoteTime::find($id);
        if($votetime == ''){
            $date = date_create("2021-03-15");
            $votetime = VoteTime::Create([
                'start_time' => time(), 
                'start_day' => date_format($date,"Y/m/d"),
                'finish_time' => time(),
                'end_day' => date_format($date,"Y/m/d")
            ]);
        }
        return view('admin.votetime')
            ->withVotetime($votetime);
    }

    public function updateVoteTime(Request $request, $id){
        $this->validate($request,[
            'end_day'  => 'required',
            'end_time' => 'required',
            'start_day' => 'required',
            'start_time' => 'required',
        ]);
        $votetime= VoteTime::find($id);
        $votetime->start_time = $request->input('start_time');
        $votetime->start_day = $request->input('start_day');
        $votetime->finish_time = $request->input('end_time');
        $votetime->end_day = $request->input('end_day');
        $votetime->save();
        return redirect()->route('admin.index');
    }


    public function destroyDepartment($id){
        $department = Department::find($id);
        $department->delete();
        return redirect()->route('admin.department');
    }

    
    public function destroyFaculty($id){
        $faculty = Faculty::find($id);
        $faculty->delete();
        return redirect()->route('admin.faculty');
    }

}
