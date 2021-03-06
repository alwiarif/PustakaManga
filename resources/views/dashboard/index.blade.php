@extends('layouts.admin')

@section('title') Dashboard @endsection

@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"></script>

<div class="row">
    <div class="col-md-12">
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Statistik Jumlah Post</h5>
      <h6 class="card-subtitle mb-2 text-muted">Manga dan Chapter</h6>
      <div class="row justify-content-center">
        <div class="col-md-6">
            <canvas id="myChart" width="50" height="50" class="text-center"style="padding:30px;"></canvas>
          </div>
      </div>

    </div>
  </div>
    </div>
</div>


<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Manga Post', 'Chapter Post'],
        datasets: [{
            label: '# of Votes',
            data: [{{ $mangacount->count() }}, {{ $chaptercount->count() }}],
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
</script>


@endsection
