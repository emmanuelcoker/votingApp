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
    {{Html::script('bower_components/chart.js/dist/Chart.js')}}
<canvas id="presidentials"class="Rcontainer" width="80%" height="20%" ></canvas>
<canvas id="vices" width="80%" class="Rcontainer"="20%" ></canvas>
<canvas id="finances" width="80%" class="Rcontainer"height="20%"></canvas>
<canvas id="secs" width="80%" class="Rcontainer" height="20%"></canvas>

<script>

var ctx = document.getElementById("presidentials");

var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels:[
             @foreach($presidentials as $presidential)
                '{{$presidential->name}}',
            @endforeach],
        datasets: [{
            label: 'Presidential Results',
            data: [
                @foreach($presidentials as $presidential)
                    {{$presidential->votes}},
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

var ctx = document.getElementById("vices");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels:[
             @foreach($vices as $vice)
                '{{$vice->name}}',
            @endforeach],
        datasets: [{
            label: 'Vice-Chairperson results',
            data: [
                @foreach($vices as $vice)
                    {{$vice->votes}},
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
            borderWidth: 1
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
var ctx = document.getElementById("finances");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels:[
             @foreach($finances as $finance)
                '{{$finance->name}}',
            @endforeach],
        datasets: [{
            label: 'Financial Secretary',
            data: [
                @foreach($finances as $finance)
                    {{$finance->votes}},
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
            borderWidth: 1
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

var ctx = document.getElementById("secs");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels:[
             @foreach($secs as $sec)
                '{{$sec->name}}',
            @endforeach],
        datasets: [{
            label: 'secretary-General',
            data: [
                @foreach($secs as $sec)
                    {{$sec->votes}},
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
            borderWidth: 1
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

        
    </body>
</html>