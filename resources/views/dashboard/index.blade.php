@extends('dashboard')
@section('content')
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card  border-0 shadow p-4 mb-2">
                <div style="width: 100%;">
                    <canvas id="myChart"></canvas>

                </div>
            </div>
        </div>

    </div>

    <div class="row mt-3">
        <div class="col-md-4">
            <div class="card  border-0 shadow p-4 mb-2">
                <div style="width: 100%;">
                    <canvas id="gender-chart"></canvas>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card  border-0 shadow p-4 mb-2">
                <div style="width: 100%;">
                    <canvas id="alzhimer-chart"></canvas>

                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="card  border-0 shadow">
                <div style="width: 100%;">
                    <canvas id="brain-chart"></canvas>

                </div>
            </div>
        </div>

    </div>
    <div class="row mt-3">
        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-primary rounded me-4 me-sm-0">
                                <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path></svg>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="h5">Patients</h2>
                                <h3 class="fw-extrabold mb-1">{{$patient}}</h3>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h5">Patients</h2>
                                <h3 class="fw-extrabold mb-1">{{$patient}}</h3>
                            </div>
                            <small class="d-flex align-items-center text-gray-500">
                                Feb 1 - Apr 1,  
                                <svg class="icon icon-xxs text-gray-500 ms-2 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z" clip-rule="evenodd"></path></svg>
                                USA
                            </small> 
                            <div class="small d-flex mt-1">                               
                                <div>Since last month <svg class="icon icon-xs text-success" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg><span class="text-success fw-bolder">22%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-secondary rounded me-4 me-sm-0">
                                    <i class="fa fa-user-doctor"></i>
                      
                            </div>
                            <div class="d-sm-none">
                                <h2 class="fw-extrabold h5">Doctors</h2>
                                <h3 class="mb-1">{{$doctors}}</h3>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="fw-extrabold h5">Doctors</h2>
                                <h3 class="mb-1">{{$doctors}}</h3>
                            </div>

                            <div class="col-12 col-xl-7 px-xl-0">
                                <div class="small d-flex mt-1">                               
                                    <div>Since last month <svg class="icon icon-xs text-success" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg><span class="text-success fw-bolder">4%</span></div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-tertiary rounded me-4 me-sm-0">
                                <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="fw-extrabold h5">Appointment</h2>
                                <h3 class="mb-1">{{$reservations}}</h3>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">Appointment</h2>
                                <h3 class="fw-extrabold mb-2">{{$reservations}}</h3>
                            </div>
                            <small class="text-gray-500">
                                Feb 1 - Apr 1
                            </small> 
                            <div class="small d-flex mt-1">                               
                                <div>Since last month <svg class="icon icon-xs text-success" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg><span class="text-success fw-bolder">4%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
          
@endsection

@section('js')
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    console.log(ctx);
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May','July','Augest','Septemper','Octobar','Nov','Dec'],
            datasets: [{
                label: 'Invoice Data',
                data: [],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
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

    // Get the data from the server and update the chart
    fetch('{{route('invoice.chart')}}')
        .then(response => response.json())
        .then(data => {
            chart.data.datasets[0].data = data;
            chart.update();
    });

    // Gender Data
    const GenderchartData = async () => {
        const response = await fetch('{{route('gender.chart')}}');
        const data = await response.json();
        // console.log(data);
        return data;
    };

    const GenderrenderChart = async () => {
        const data = await GenderchartData();
        console.log(data);
        const ctx = document.getElementById('gender-chart').getContext('2d');
        // alert(ctx)
        const chart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Male', 'Female'],
                datasets: [{
                    data: [data.male, data.female],
                    backgroundColor: ['#3498db', '#e74c3c'],
                }]
            },
            options: {
                responsive: true,
                legend: {
                    position: 'bottom',
                },
                title: {
                    display: true,
                    text: '@lang('lang.gender')',
                },
                animation: {
                    animateScale: true,
                    animateRotate: true,
                },
            }
        });
    };

// Alzhimer Chart

const AlzhimerChartData = async () => {
        const response = await fetch("{{route('alzhimer.chart')}}");
        const data = await response.json();
        return data;
    };

const AlzhimerrenderChart = async () => {
    const data = await AlzhimerChartData();
    const ctx = document.getElementById('alzhimer-chart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['MildDemented', 'ModerateDemented','NonDemented','VeryMildDemented'],
            datasets: [{
                data: [data.mild, data.mod, data.nond, data.verymild],
                backgroundColor: ['#3498db', '#e74c3c','green','red'],
            }]
        },
        options: {
            responsive: true,
            legend: {
                position: 'bottom',
            },
            title: {
                display: true,
                text: 'Alzhimer',
            },
            animation: {
                animateScale: true,
                animateRotate: true,
            },
        }
    });
};



// Brain Chart

const BrainchartData = async () => {
        const response = await fetch("{{route('brain.chart')}}");
        const data = await response.json();
        return data;
    };

const BrainrenderChart = async () => {
    const data = await BrainchartData();
    const ctx = document.getElementById('brain-chart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Glioma', 'meningioma','notumor','pituitary'],
            datasets: [{
                data: [data.glioma, data.meningioma, data.nond, data.verymild],
                backgroundColor: ['#3498db', '#e74c3c','green','red'],
            }]
        },
        options: {
            responsive: true,
            legend: {
                position: 'bottom',
            },
            title: {
                display: true,
                text: 'Brain Tumor',
            },
            animation: {
                animateScale: true,
                animateRotate: true,
            },
        }
    });
};
GenderrenderChart();
AlzhimerrenderChart();
BrainrenderChart();
</script>
@endsection