{{-- Header of the blade page --}}
@include('layouts.member_header')



{{-- Body contetnt of the blade page--}}
<div id= "layoutSidenav_content">
    <!-- Heading Row-->
    <div class="row gx-4 gx-lg-5 align-items-center my-5">
        <div class="col-lg-6" style="margin-left:4%;"><img class="img-fluid rounded mb-4 mb-lg-0" src="https://images.unsplash.com/photo-1531493731235-b5c309dca387?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1374&q=80" alt="project_presentation" /></div>
        <div class="col-lg-5">
            <h1 class="font-weight-light">The Critical Role of a Developer in Achieving Goals</h1>
            <p>As a Developer of a team, you can do anything if you set your minds towards your Goals. Your's potential is limitless if you work hard and stay focused. Don't let fear hold you back - embrace challenges and grow from them. Stay positive, stay motivated, and keep moving forward.</p>
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
                    <p class="card-text">Status: <a href=""><button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Status: active"><i class="fa-sharp fa-solid fa-check fa-lg"></i></button></p></a>
                    @else
                    <p class="card-text">Status: <a href=""><button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Status: in-active"><i class="fa-sharp fa-solid fa-xmark fa-xl"></i></button></p></a>
                    @endif
                </div>
                
              {{-- Condition to display completion percentage of the project --}}
              @php
                        $percent = 0;
                        $module_num = 0;
                        $pr_percent = 0;
                         @endphp

                        @php
                             foreach ($user_module as $module) {
                           if ($user_module != NULL) {
                                    if ($project['id'] == $module['project_id']) {
                                     $percent += $module['completion_percentage'];
                                       $module_num++;
                                       }
                               
                             $pr_percent = $module_num > 0 ? $percent / $module_num : 0;
                             settype($pr_percent, "integer");
                            } else {
                            $pr_percent = 0;
                            }
                          }
                            $pr = App\Models\Project::where('id', $project->id)->first();
                            $pr->completion_percentage = $pr_percent;
                            $pr->save();
                            @endphp
        <div class="progress">
        <div class="progress-bar bg-warning" role="progressbar" style="width: {{$pr_percent}}%" aria-valuenow="{{$pr_percent}}" aria-valuemin="0" aria-valuemax="100">{{$pr_percent}}%</div>
         </div>
         <div class="card-footer"><a class="btn btn-primary btn-sm" href="{{url('/')}}/member/view/module/{{$project['id']}}">View Module</a></div>
 

    </div>
    </div>
    @endforeach


{{-- Footer of the page --}}
@include('layouts.member_footer')