<form action="{{route('seat')}}" method="POST" class="contact">
    {{ csrf_field() }}    
        
            <div class="form-group">
                {{Form::label('Seat')}}
                {{Form::text('seat','',['class' => 'form-control','placeholder' => 'Seat','required','style'=>'max-width:100%; width:500px'])}}
            </div>

            <div class="form-group">
               <label for="Priviledge">Priviledge</label>  
                  <select name="priviledge" id="priviledge" class="form-control" style="max-width: 100%; width:800px;">
                    <option value="0">None</option>
                      @foreach ($priviledges as $priviledge)
                          <option class="p-2 bg-light"value="{{$priviledge->id}}">{{$priviledge->type}}</option>
                      @endforeach
                  </select>
                
            </div>
            
            {{Form::submit('Add Seat',['class'=>'btn btn-primary btn-flat btn-sm'])}}
    </form>
        
    