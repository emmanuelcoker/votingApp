<!DOCTYPE html> 
<html>
    <head>
        <title>Result!</title>
    
         {{ Html::style("vendor/bootstrap/css/bootstrap.css") }}
       
    </head>
    <body class="bg-cyan">
     <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand page-scroll" href="index.php">Ivote</a>
            </div>
</nav>
    {{Html::script('bower_components/chart.js/dist/Chart.js')}}

    @for($i = 0; $i < count($candidates); $i++)                 
           <canvas id="{{$seats[$i]->position}}" width="80%" class="Rcontainer" height="20%"></canvas>          
{{-- <canvas id="presidentials"class="Rcontainer" width="80%" height="20%" ></canvas>
<canvas id="vices" width="80%" class="Rcontainer"="20%" ></canvas>
<canvas id="finances" width="80%" class="Rcontainer"height="20%"></canvas>
<canvas id="secs" width="80%" class="Rcontainer" height="20%"></canvas> --}}

<script>

var ctx = document.getElementById("{{$seats[$i]->position}}");

var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels:[
             @foreach($candidates[$i] as $candidate)
                '{{$candidate->name}}',
            @endforeach],
        datasets: [{
            label: '{{$seats[$i]->position}}',
            data: [
                @foreach($candidates[$i] as $candidate)
                    {{$candidate->votes}},
                @endforeach
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 0.001
            
        }]
    },
    options: {
        scales: {
            
            yAxes: [{
                ticks: {
                    beginAtZero:true,
                    steps:5,
                    stepValue:10,
                    max:50
                }
            }]
             
        }
    }
});

</script>
 @endfor
        
    </body>
</html>