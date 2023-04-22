{{-- Header of the page --}}
@include('layouts.lead_header')

{{-- Body contetnt of the blade page--}}
<div id= "layoutSidenav_content">
    <!-- Heading Row-->
    <div class="row gx-4 gx-lg-5 align-items-center my-5">
        <div class="col-lg-6" style="margin-left:4%;"><img class="img-fluid rounded mb-4 mb-lg-0" src="https://images.unsplash.com/photo-1557426272-fc759fdf7a8d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="project_presentation" /></div>
        <div class="col-lg-5">
            <h1 class="font-weight-light">Leadership in Project Management</h1>
            <p>The role of leadership in project management encompasses a wide range of activities, including effective planning, task coordination, overseeing projects, inspiring team members, and making decisions vital to setting up a plan of action for project implementation.Leadership in project management is crucial to ensuring success. Besides boosting team confidence and heightening efficiency.</p>
        </div>
    </div>
         
   
    <!-- Call to Action-->
    <div class="card text-white bg-secondary text-center" style="width: 90%; margin-left : 5%; margin-bottom:2%;">
        <div class="card-body"><p class="text-white m-0"><b>Overview of all your Projects</b></p></div>
    </div>
    
    {{-- Call to row --}}
    @foreach($projects as $project)
       <div class="row-md-1 mb-1">
        <div class="card" style="width: 90%; margin-left : 5%;">
            <div class="card-body">
                <div class="card-body">
                    <h4 class="card-title"><u>{{ $project['project_name']}}:</u></h4>
                    <h5>{{ $project['project_details']}}</h5>
                    @if($project->project_assign)
                    <p class="card-text">Assigned to: {{\App\Models\User::where('id',$project->project_assign->user_id)->first()->name}}</p>
                    @else
                    <p class="card-text">Assigned to: Un-assigned</p>
                    @endif
                    <p class="card-text">Deadline: {{date('d-M-Y', strtotime($project->estimated_end_date)) }}</p>
                    
                    @if($project['status'] == 1)
                    <p class="card-text">Status: <a href="{{url('/')}}/lead/change/status/projects/{{ $project->id }}" onclick="return confirm('Are you sure you want to change the status?')"><button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Change Status to: in-active"><i class="fa-sharp fa-solid fa-check fa-lg"></i></button></p></a>
                    @else
                    <p class="card-text">Status: <a href="{{url('/')}}/lead/change/status/projects/{{ $project->id }}" onclick="return confirm('Are you sure you want to change the status?')"><button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Change Status to: active"><i class="fa-sharp fa-solid fa-xmark fa-xl"></i></button></p></a>
                    @endif
                </div>
                
              {{-- Condition to display completion percentage of the project --}}
              @php
                $percent = 0;
                $module_num = 0;
                $pr_percent = 0;
                 @endphp
                @php
                   if ($user_module != NULL) {
                     foreach ($user_module as $module) {
                            if ($project['id'] == $module['project_id']) {
                             $percent += $module['completion_percentage'];
                               $module_num++;
                               }
                       } 
                     $pr_percent = $module_num > 0 ? $percent / $module_num : 0;
                     settype($pr_percent, "integer");
                    } else {
                    $pr_percent = 0;
                    }
                @endphp
              
                
                <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{$pr_percent}}%" aria-valuenow="{{$pr_percent}}" aria-valuemin="0" aria-valuemax="100">{{$pr_percent}}%</div>
                  </div>
                 
                  <div class="card-footer"><a class="btn btn-primary btn-sm" href="{{url('/')}}/lead/view/module/{{$project['id']}}">View Module</a></div>
                
            </div>
         </div>
         @endforeach
           


         {{-- Footer of the page --}}
         @include('layouts.lead_footer')







