@extends('layouts.admin')

@section('content')

    <div class="container d-block p-4">
        <div class="header p-3">
            <h3 style="font-weight: 500;">Candidate Profile</h3>
        </div>

        <!--Image container-->
        <div class="d-flex justify-content-end align-items-center img w-100">
            <div style="width: 200px; height:200px;">
                <img src="/storage/img/{{$candidate->profile_img}}" alt="Candidate Passport" style="width:100%; height:100%;">
            </div>
        </div>
        <!-- End Image container-->

        <div class="p-3 d-flex justify-content-end align-items-center">
         <a href="/candidate/{{$candidate->id}}/edit" class="btn btn-success btn-sm mt-0">Edit Profile</a>
        </div>

        <!--Content container-->
        <div class="content w-100 mt-3">

            <div class="list-group">
                <div class="list-group-item">
                    Candiate Name: {{$candidate->name}}
                </div>
                <div class="list-group-item">
                    Aspired Position: {{$candidate->seats->position}}
                </div>
                <div class="list-group-item">
                    Matric Number: {{$candidate->regno}}
                </div>
                <div class="list-group-item">
                    Department: {{$department ?? "Not Assigned yet"}}
                </div>

                <div class="list-group-item">
                    Faculty: {{$faculty}}
                </div>
            </div>

        </div>
        <!--End Content container-->
    </div>

@endsection