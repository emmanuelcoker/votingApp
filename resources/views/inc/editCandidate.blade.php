@extends('layouts.admin')
@section('content')
    <div class="container p-4">
     <h3>Edit Candidate</h3>
     @include('inc.messages')
     <form action="{{route('updateCandidate',[$candidate->id])}}" method="POST"  enctype="multipart/form-data" class="contact">
    {{ csrf_field() }}    
        <div class="form-group">
                {{Form::label('Candidate Name')}}
                {{Form::text('name',$candidate->name,['class' => 'form-control','placeholder' => 'Candidate Name','required','style'=>'max-width:100%; width:500px'])}}
            </div>
        
                <div class="form-group col-md-6">
                    <label for="seat">Aspired Seat</label>  
                      <select name="seat" id="seat" class="form-control" style="max-width: 100%; width:800px;">
                        <option value="0">None</option>
                          @foreach ($seats as $seat)
                              <option class="p-2 bg-light"value="{{$seat->id}}">{{$seat->position}}</option>
                          @endforeach
                      </select>
                    
                 </div>
    
            
                <div class="form-group">
                    <input type="file" name="profile_img" class="form-control" id="profile_img">
                </div>
             
                
            {{Form::submit('Update Candidate',['class'=>'btn btn-primary btn-flat btn-sm'])}}
    </form>
        
    
    </div>

@endsection