@extends('layout.layout')
@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner text-center">
            <h4 class="page-title">SELAMAT DATANG {{Auth::user()->name}}</h4>
            <div class="page-category"><h3>STATISTIK BARANG</h3></div>
            <div class="row">

                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body ">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-primary bubble-shadow-small">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">BARANG MASUK HARI INI</p>
                                        <h4 class="card-title">{{$tglmsk}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body ">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-primary bubble-shadow-small">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">BARANG KELUAR HARI INI</p>
                                        <h4 class="card-title">{{$tglkl}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body ">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-primary bubble-shadow-small">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">TOTAL BARANG</p>
                                        <h4 class="card-title">{{$barang}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body ">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-primary bubble-shadow-small">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">STOK BARANG</p>
                                        <h4 class="card-title">

                                           {{$brg->sum('stok')}}




                                            </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Barang masuk</div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="lineChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Barang keluar</div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="barChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>


        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            var lineChart = document.getElementById('lineChart').getContext('2d')
            var barChart = document.getElementById('barChart').getContext('2d')
            var myLineChart = new Chart(lineChart, {
                type: 'line',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: "Barang masuk",
                        borderColor: "#1d7af3",
                        pointBorderColor: "#FFF",
                        pointBackgroundColor: "#1d7af3",
                        pointBorderWidth: 2,
                        pointHoverRadius: 4,
                        pointHoverBorderWidth: 1,
                        pointRadius: 4,
                        backgroundColor: 'transparent',
                        fill: true,
                        borderWidth: 2,
                        data: [
                            {{ $jan }},
                            {{ $feb }},
                            {{ $mar }},
                            {{ $apr }},
                            {{ $mei }},
                            {{ $jun }},
                            {{ $jul }},
                            {{ $agu }},
                            {{ $sep }},
                            {{ $okt }},
                            {{ $nov }},
                            {{ $des }}
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 10,
                            fontColor: '#1d7af3',
                        }
                    },
                    tooltips: {
                        bodySpacing: 4,
                        mode: "nearest",
                        intersect: 0,
                        position: "nearest",
                        xPadding: 10,
                        yPadding: 10,
                        caretPadding: 10
                    },
                    layout: {
                        padding: {
                            left: 15,
                            right: 15,
                            top: 15,
                            bottom: 15
                        }
                    }
                }
            });
        </script>


        <script>
            var myBarChart = new Chart(barChart, {
                type: 'bar',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: "Barang keluar",
                        backgroundColor: '#A52A2A',
                        borderColor: '#A52A2A',
                          data: [
                            {{ $ja }},
                            {{ $fe }},
                            {{ $ma }},
                            {{ $ap }},
                            {{ $me }},
                            {{ $ju }},
                            {{ $ju }},
                            {{ $ag }},
                            {{ $se }},
                            {{ $ok }},
                            {{ $no }},
                            {{ $de }}
                        ],
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                }
            });
        </script>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.0/chart.min.js"
            integrity="sha512-mlz/Fs1VtBou2TrUkGzX4VoGvybkD9nkeXWJm3rle0DPHssYYx4j+8kIS15T78ttGfmOjH0lLaBXGcShaVkdkg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @endsection
