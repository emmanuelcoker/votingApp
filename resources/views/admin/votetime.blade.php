@extends('layouts.admin')
@section('content')
    <div class="container p-4">
     <h3>Set Voting Date and Time</h3>
     @include('inc.messages')
     <form action="{{route('updateVoteTime',[$votetime->id])}}" method="POST" class="contact">
    {{ csrf_field() }}    
        <div class="form-group">
                {{Form::label('Start Date')}}
                <input type="date" name="start_day" id="startday" class="form-control" required style="max-width:100%; width: 500px;">
                 <input type="time" name="start_time" id="starttime" class="form-control" required style="max-width:100%; width: 500px;">
            </div>

            <div class="form-group">
                {{Form::label('End Time')}}
                <input type="date" name="end_day" id="endday" class="form-control" required style="max-width:100%; width: 500px;">
                 <input type="time" name="end_time" id="endtime" class="form-control" required style="max-width:100%; width: 500px;">
            </div>
        
        
        
                
            {{Form::submit('Set Time',['class'=>'btn btn-primary btn-flat btn-sm'])}}
    </form>
        
    
    </div>

@endsection