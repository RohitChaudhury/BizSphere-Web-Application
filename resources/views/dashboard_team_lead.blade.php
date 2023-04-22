{{-- Header of the page --}}
@include('layouts.lead_header')
        
      
    
            {{-- body content of the dashboard of lead --}}
            <div id="layoutSidenav_content" style = "background: url(https://images.unsplash.com/photo-1511467687858-23d96c32e4ae?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);background-size: cover;">
                <main>
                        <div class="container-fluid px-4">
                            <h1 class="mt-4 mb-4">Welcome, Team Lead {{ session('Logged_user')->name }}!</h1>
                            
                            <div class="row">
                                <div class="col-xl-4 col-md-6">
                                    <div class="card bg-secondary text-white text-center mb-4">
                                    <div class="card-body">Total Projects</div>
                                    <div class="card-footer d-flex align-items-center justify-content-center">{{$count_pr}}</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{url('/')}}/lead/all/projects/{{ session('Logged_user')->id }}">View details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            
                                <div class="col-xl-4 col-md-6">
                                    <div class="card bg-dark text-white text-center mb-4">
                                    <div class="card-body">Total Members</div>
                                    <div class="card-footer d-flex align-items-center justify-content-center">{{$count_mem}}</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{url('/')}}/team_lead/view_members/{{ session('Logged_user')->id }}">View details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                       {{-- Code to display the bar chart fr projects --}}
                      <!-- Chart container -->
                      <div id="project-progress-chart" style = "height:46vh; margin-bottom:2%;"></div>

                      {{-- Google charts --}}
            <script src="https://www.gstatic.com/charts/loader.js"></script>
            <script>
                google.charts.load('current', {packages: ['corechart', 'bar']});
            
                // Draw the chart when the API is loaded
                google.charts.setOnLoadCallback(drawProjectProgressChart);
            
                // Define the data to be used in the chart
                var data = null;
            
                function drawProjectProgressChart() {
                    // Define the data to be used in the chart
            
                    // Initialize $colors array with default values
                    $colors = ['#9400D3', '#4B0082', '#0000FF', '#00FF00', '#FFFF00', '#FF7F00', '#FF0000'];
                    @if ($colors)        
                    var count = {{ count($colors) }};
                    @endif
                    console.log(count);
            
                    @if ($projects && count($projects) > 0 && $colors)
                    data = google.visualization.arrayToDataTable([
                        ['Project', 'Progress', { role: 'style' }],
                        @foreach($projects as $index => $project)
                        ['{{ $project->project_name }}', {{ floatval($project->completion_percentage) }}, ''],
                        @endforeach
                    ]);
                    @endif
            
                    // Define the chart options
                    var options = {
                        title: 'Project Progress',
                        chartArea: {width: '50%'},
                        hAxis: {
                            title: 'Completion Percentage',
                            format: '#\'%\'',
                            minValue: 0,
                            maxValue: 100,
                            fontName: 'Roboto'
                        },
                        vAxis: {
                            title: 'Project',
                            textStyle: {
                                fontSize: 12
                            }
                        },
                        colors: ['#9400D3', '#4B0082', '#0000FF', '#00FF00', '#FFFF00', '#FF7F00', '#FF0000']
                    };
            
                    // Create and draw the chart  
                    if (data) {
                        var chart = new google.visualization.BarChart(document.getElementById('project-progress-chart'));
                        chart.draw(data, options);
                    }
                }              
            </script>
                </main>

                {{-- Footer of the dashboard page --}}
               @include('layouts.lead_footer')