<!DOCTYPE html>
<html>
    <head>
        <title> lets vote !</title>
        
        {{ Html::style('css/mycss.css') }}
        {{ Html::style('css/cs.css') }}

    </head>
    <body class="bg-cyan">
        <div class="body body-s">


            <form action="{{route('vote')}}"  method="POST" class="sky-form">
                {{csrf_field()}}

                @for($i = 0; $i < count($seats); $i++)
                     <header>
                     <?php
                     $seatName = \App\Seat::find($seats[$i][0]->seat);
                     echo $seatName->position;
                     ?>
                     </header>
                <input type="hidden" name="id" value="{{Auth::user()->id}}">
                <fieldset>
                 <select name="candidateIds[]" class="select">
                    @foreach($seats[$i] as $candidate)
                            <option value="{{$candidate->id}}">{{$candidate->name}}</option>
                        @endforeach 
                               </select>
                </fieldset>
                     
                @endfor

                <footer>
                    <button type="submit" class="button">Vote</button>
                </footer>
            </form>

        </div>
    </body>
</html>
