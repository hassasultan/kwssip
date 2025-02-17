@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                @include('layouts.include.toolbar')
                <style>
                    #total-tanker {
                        height: 180px;
                        overflow-y: scroll;

                        /* padding-top: 15px; */
                    }

                    .icon-lg {
                        width: 40px !important;
                        height: 40px !important;
                    }

                    #piechart_3d>div {
                        background-color: #202940 !important;
                    }
                </style>
                <style>
                    #LineChart {
                        height: 400px;
                    }

                    .highcharts-figure,
                    .highcharts-data-table table {
                        min-width: 310px;
                        max-width: 800px;
                        margin: 1em auto;
                    }

                    .highcharts-data-table table {
                        font-family: Verdana, sans-serif;
                        border-collapse: collapse;
                        border: 1px solid #ebebeb;
                        margin: 10px auto;
                        text-align: center;
                        width: 100%;
                        max-width: 500px;
                    }

                    .highcharts-data-table caption {
                        padding: 1em 0;
                        font-size: 1.2em;
                        color: #555;
                    }

                    .highcharts-data-table th {
                        font-weight: 600;
                        padding: 0.5em;
                    }

                    .highcharts-data-table td,
                    .highcharts-data-table th,
                    .highcharts-data-table caption {
                        padding: 0.5em;
                    }

                    .highcharts-data-table thead tr,
                    .highcharts-data-table tr:nth-child(even) {
                        background: #f8f8f8;
                    }

                    .highcharts-data-table tr:hover {
                        background: #f1f7ff;
                    }
                </style>

                {{-- @if (auth()->user()->role == 1) --}}
                <div class="mb-2 align-items-center">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="row mt-1 align-items-center">
                                <div class="col-12 col-lg-4 text-left pl-4">
                                    {{-- <p class="mb-1 small text-muted">New</p> --}}
                                    <span class="h3">KWSSIP</span>
                                    {{-- <span class="small text-muted">+100%</span> --}}
                                    <span class="fe fe-arrow-up text-success fe-12"></span>
                                    <p class="text-muted mt-2">
                                        Key Functions of Karachi Water & Sewerage Corporation.
                                    </p>
                                </div>
                                <div class="col-6 col-lg-2 text-center py-4">
                                    <p class="mb-1 small text-muted">Total Complaints</p>
                                    <span class="h3">{{ $totalComplaints }}</span><br />
                                    {{-- <span class="small text-muted">+20%</span> --}}
                                    <span class="fe fe-arrow-up text-success fe-12"></span>

                                </div>
                                {{-- <div class="col-6 col-lg-2 text-center py-4">
                                    <p class="mb-1 small text-muted">Total Agents</p>
                                    <span class="h3">{{ $totalAgents }}</span><br />
                                    <span class="small text-muted">+20%</span>
                                    <span class="fe fe-arrow-up text-success fe-12"></span>
                                </div> --}}
                                <div class="col-6 col-lg-2 text-center py-4">
                                    <p class="mb-1 small text-muted">Pending Complaints</p>
                                    <span class="h3">{{ $complaintsPending }}</span><br />
                                    {{-- <span class="small text-muted">+20%</span> --}}
                                    <span class="fe fe-arrow-up text-success fe-12"></span>
                                </div>
                                <div class="col-6 col-lg-2 text-center py-4">
                                    <p class="mb-1 small text-muted">Solved Complaints</p>
                                    <span class="h3">{{ $complaintsComplete }}</span><br />
                                    {{-- <span class="small text-muted">+20%</span> --}}
                                    <span class="fe fe-arrow-up text-success fe-12"></span>
                                </div>
                                <div class="col-xl-12 col-sm-14  text-right">
                                    @if (auth()->user()->role == 1)
                                        <a class="btn btn-primary mb-0"
                                            href="{{ route('admin.compaints-management.create') }}" target="_blank">+
                                            Add New Complaint</a>
                                    @else
                                        <a class="btn btn-primary mb-0"
                                            href="{{ route('system.compaints-management.create') }}" target="_blank">+
                                            Add New Complaint</a>
                                    @endif
                                </div>
                            </div>
                            <div class="chartbox mr-4">
                                <div id="LineChart"></div>
                            </div>
                        </div> <!-- .card-body -->
                    </div> <!-- .card -->
                </div>
                <div class="row items-align-baseline">
                    <div class="col-md-12 col-lg-6">
                        <div class="card shadow eq-card mb-4">
                            <div class="card-body mb-n3">
                                <div class="row items-align-baseline h-100">
                                    <div class="col-md-12 my-3">
                                        <h3>Complaints Type</h3>
                                        <div id="piechart_3d"></div>
                                    </div>
                                </div>
                            </div> <!-- .card-body -->
                        </div> <!-- .card -->
                    </div> <!-- .col -->

                    <div class="col-md-12 col-lg-6">
                        <div class="card shadow eq-card mb-4">
                            <div class="card-body">
                                <div class="chart-widget mb-2">
                                    <h3>Complaints Status</h3>
                                    <div id="piechart_3d2"></div>
                                </div>
                            </div> <!-- .card-body -->
                        </div> <!-- .card -->
                    </div> <!-- .col -->
                </div> <!-- .row -->
                <hr />

            </div>
        </div>
    </div>
    {{-- {{ dd($allTown) }} --}}
@endsection
@section('bottom_script')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Retrieve categories and complaints data from Blade
            var categories = @json($typeCompTown);
            var complaintsData = @json($typeComp) || [];
            if (!Array.isArray(complaintsData)) {
                complaintsData = Object.values(complaintsData);
            }
            console.log("Categories:", categories);
            console.log("Final Complaints Data:", complaintsData);

            var seriesData = complaintsData.map(comp => ({
                name: comp.name,
                data: Array.isArray(comp.data) ? comp.data.map(d => d || 0) : []
            }));

            // Initialize Highcharts
            Highcharts.chart('LineChart', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Complaints Overview'
                },
                xAxis: {
                    categories: categories
                },
                yAxis: {
                    allowDecimals: false,
                    min: 0,
                    title: {
                        text: 'Count'
                    }
                },
                tooltip: {
                    formatter: function() {
                        return `<b>${this.x}</b><br/>${this.series.name}: ${this.y}`;
                    }
                },
                series: seriesData
            });

            // Function to fetch Google Charts Data
            function fetchChartData() {
                let url = "{{ auth()->user()->role == 1 ? route('home') : route('system.home') }}";

                $.ajax({
                    url: url,
                    type: "GET",
                    data: {
                        status: "api"
                    }
                }).done(function(data) {
                    console.log("Google Charts Data:", data);

                    google.charts.load("current", {
                        packages: ["corechart"]
                    });
                    google.charts.setOnLoadCallback(() => drawGoogleCharts(data));
                }).fail(function(error) {
                    console.log("Error fetching data:", error);
                });
            }

            function drawGoogleCharts(data) {
                console.log("Received Data:", data);

                // Ensure result data is correct
                if (!data['result'] || !Array.isArray(data['result'])) {
                    console.error("Error: data['result'] is not a valid array.", data['result']);
                    data['result'] = [
                        ['Status', 'Count'],
                        ['No Data', 0]
                    ];
                }

                // Convert type_count to an array of arrays
                if (!data['type_count'] || !Array.isArray(data['type_count'])) {
                    console.error("Error: data['type_count'] is not a valid array.", data['type_count']);
                    data['type_count'] = [
                        ['Type', 'Count'],
                        ['No Data', 0]
                    ];
                } else {
                    let typeCountArray = [
                        ['Type', 'Count']
                    ];
                    data['type_count'].forEach(item => {
                        if (item.name && Array.isArray(item.data)) {
                            let totalCount = item.data.reduce((sum, num) => sum + num,
                            0); // Sum all data values
                            typeCountArray.push([item.name, totalCount]);
                        }
                    });

                    data['type_count'] = typeCountArray;
                }

                console.log("Processed Data:", data);

                var pieData1 = google.visualization.arrayToDataTable(data['result']);
                var pieData2 = google.visualization.arrayToDataTable(data['type_count']);

                var options = {
                    title: '',
                    is3D: true
                };

                var chart1 = new google.visualization.PieChart(document.getElementById('piechart_3d2'));
                chart1.draw(pieData1, options);

                var chart2 = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                chart2.draw(pieData2, options);
            }


            // Refresh Google Charts every 3 seconds
            setInterval(fetchChartData, 3000);
        });
    </script>
    {{-- <script>
        $(document).ready(function() {
            var cat = @json($typeCompTown);
            var type = @json($typeComp);
            console.log(type);
            var seriesData = [];

            // Perform a loop to generate the series data dynamically
            for (var i = 0; i < type.length; i++) {
                console.log(type[i]);
                var series = {
                    name: type[i].name,
                    data: []
                };

                // Generate random data for each series
                if (type[i].data != undefined) {
                    for (var j = 0; j <= type[i].data.length; j++) {

                        if (type[i].data[j] == undefined) {
                            // var value = 0;
                            // series.data.push(value);
                            console.log(type[i].data[j]);
                        } else {
                            var value = type[i].data[j];
                            series.data.push(value);
                        }
                        // }
                        // else
                        // {
                        //     var value = 0;
                        //     series.data.push(value);
                        // }
                    }
                }
                console.log(series);

                // Add the series to the seriesData array
                seriesData.push(series);
            }
            Highcharts.chart('LineChart', {
                chart: {
                    type: 'column'
                },

                title: {
                    text: 'Complaints High Chart'
                },

                xAxis: {
                    categories: cat
                },

                yAxis: {
                    allowDecimals: false,
                    min: 0,
                    title: {
                        text: 'Count medals'
                    }
                },

                tooltip: {
                    formatter: function() {
                        return '<b>' + this.x + '</b><br/>' +
                            this.series.name + ': ' + this.y;
                    }
                },
                // series: [{
                // name: 'Series 1',
                // data: [5, 10, 15]
                // }, {
                // name: 'Series 2',
                // data: [8, 12, 7]
                // }]
                series: seriesData
            });
        });
    </script> --}}
@endsection
