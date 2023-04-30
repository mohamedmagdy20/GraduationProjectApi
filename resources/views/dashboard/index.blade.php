@extends('dashboard')
@section('content')
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card  border-0 shadow">
                {{-- <div class="card-header d-sm-flex flex-row align-items-center flex-0">
                    <div class="d-block mb-3 mb-sm-0">
                        <div class="fs-5 fw-normal mb-2">Sales Value</div>
                        <h2 class="fs-3 fw-extrabold">$10,567</h2>
                        <div class="small mt-2"> 
                            <span class="fw-normal me-2">Yesterday</span>                              
                            <span class="fas fa-angle-up text-success"></span>                                   
                            <span class="text-success fw-bold">10.57%</span>
                        </div>
                    </div>
                    <div class="d-flex ms-auto">
                        <a href="#" class="btn btn-secondary text-dark btn-sm me-2">Month</a>
                        <a href="#" class="btn btn-dark btn-sm me-3">Week</a>
                    </div>
                </div>
                <div class="card-body p-2">
                    <div class="ct-chart-sales-value ct-double-octave ct-series-g"><div class="chartist-tooltip" style="top: 157.2px; left: 913px;"><span class="chartist-tooltip-value">100</span></div><svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-line" style="width: 100%; height: 100%;"><g class="ct-grids"><line x1="50" x2="50" y1="15" y2="114.40000915527344" class="ct-grid ct-horizontal"></line><line x1="138.7666727701823" x2="138.7666727701823" y1="15" y2="114.40000915527344" class="ct-grid ct-horizontal"></line><line x1="227.5333455403646" x2="227.5333455403646" y1="15" y2="114.40000915527344" class="ct-grid ct-horizontal"></line><line x1="316.3000183105469" x2="316.3000183105469" y1="15" y2="114.40000915527344" class="ct-grid ct-horizontal"></line><line x1="405.0666910807292" x2="405.0666910807292" y1="15" y2="114.40000915527344" class="ct-grid ct-horizontal"></line><line x1="493.8333638509115" x2="493.8333638509115" y1="15" y2="114.40000915527344" class="ct-grid ct-horizontal"></line><line x1="582.6000366210938" x2="582.6000366210938" y1="15" y2="114.40000915527344" class="ct-grid ct-horizontal"></line></g><g><g class="ct-series ct-series-a"><path d="M50,114.4L50,114.4C79.589,111.087,109.178,108.878,138.767,104.46C168.356,100.042,197.944,88.998,227.533,84.58C257.122,80.162,286.711,79.941,316.3,74.64C345.889,69.339,375.478,34.88,405.067,34.88C434.656,34.88,464.244,54.76,493.833,54.76C523.422,54.76,553.011,28.253,582.6,15L582.6,114.4Z" class="ct-area"></path><path d="M50,114.4C79.589,111.087,109.178,108.878,138.767,104.46C168.356,100.042,197.944,88.998,227.533,84.58C257.122,80.162,286.711,79.941,316.3,74.64C345.889,69.339,375.478,34.88,405.067,34.88C434.656,34.88,464.244,54.76,493.833,54.76C523.422,54.76,553.011,28.253,582.6,15" class="ct-line"></path><line x1="50" y1="114.40000915527344" x2="50.01" y2="114.40000915527344" class="ct-point" ct:value="0"></line><line x1="138.7666727701823" y1="104.46000823974609" x2="138.7766727701823" y2="104.46000823974609" class="ct-point" ct:value="10"></line><line x1="227.5333455403646" y1="84.5800064086914" x2="227.54334554036458" y2="84.5800064086914" class="ct-point" ct:value="30"></line><line x1="316.3000183105469" y1="74.64000549316407" x2="316.31001831054687" y2="74.64000549316407" class="ct-point" ct:value="40"></line><line x1="405.0666910807292" y1="34.880001831054685" x2="405.0766910807292" y2="34.880001831054685" class="ct-point" ct:value="80"></line><line x1="493.8333638509115" y1="54.760003662109376" x2="493.8433638509115" y2="54.760003662109376" class="ct-point" ct:value="60"></line><line x1="582.6000366210938" y1="15" x2="582.6100366210937" y2="15" class="ct-point" ct:value="100"></line></g></g><g class="ct-labels"><foreignObject style="overflow: visible;" x="50" y="119.40000915527344" width="88.7666727701823" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 89px; height: 20px;">Mon</span></foreignObject><foreignObject style="overflow: visible;" x="138.7666727701823" y="119.40000915527344" width="88.7666727701823" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 89px; height: 20px;">Tue</span></foreignObject><foreignObject style="overflow: visible;" x="227.5333455403646" y="119.40000915527344" width="88.76667277018228" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 89px; height: 20px;">Wed</span></foreignObject><foreignObject style="overflow: visible;" x="316.3000183105469" y="119.40000915527344" width="88.76667277018231" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 89px; height: 20px;">Thu</span></foreignObject><foreignObject style="overflow: visible;" x="405.0666910807292" y="119.40000915527344" width="88.76667277018231" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 89px; height: 20px;">Fri</span></foreignObject><foreignObject style="overflow: visible;" x="493.8333638509115" y="119.40000915527344" width="88.76667277018225" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 89px; height: 20px;">Sat</span></foreignObject><foreignObject style="overflow: visible;" x="582.6000366210938" y="119.40000915527344" width="30" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 30px; height: 20px;">Sun</span></foreignObject></g></svg></div>
                </div> --}}
                <div style="width: 100%;">
                    <canvas id="myChart"></canvas>

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
                                <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
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
                            <small class="d-flex align-items-center text-gray-500">
                                Feb 1 - Apr 1,  
                                <svg class="icon icon-xxs text-gray-500 ms-2 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z" clip-rule="evenodd"></path></svg>
                                GER
                            </small> 
                            <div class="small d-flex mt-1">                               
                                <div>Since last month <svg class="icon icon-xs text-danger" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg><span class="text-danger fw-bolder">2%</span></div>
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
            labels: ['January', 'February', 'March', 'April', 'May'],
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
</script>
@endsection