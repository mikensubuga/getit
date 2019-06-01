@extends('voyager::master')

@section('content')
<div class="page-content">
        @include('voyager::alerts')
        @include('voyager::dimmers')
</div>
<h1>Charts</h1>
<h3> Bar Chart Showing the available Content in the System</h3>
<canvas id="myChart"></canvas><hr>
<h3> Line Chart Showing the Orders against Time</h3>
<canvas id="lineChart"></canvas><hr>

@endsection

@section('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Orders', 'Users', 'Categories', 'Reviews', 'Replies', 'Job Profiles'],
                datasets: [{
                    label: 'Number of available content',
                    data: [{{$ordercount}}, {{$usercount}}, {{$categorycount}}, {{$reviewcount}}, {{$replycount}}, {{$profilecount}}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
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
                            beginAtZero: true
                        }
                    }]
                }
            }
        });


        var ct = document.getElementById('lineChart').getContext('2d');
        var chart = new Chart(ct, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
            label: 'Orders',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30, 45]
        }]
    },

    // Configuration options go here
    options: {}
});

        
        </script>
@endsection