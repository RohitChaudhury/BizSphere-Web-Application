{{-- Header of the page --}}
@include('layouts.member_header')




{{-- Body Content of the page --}}
<div id= "layoutSidenav_content" style=" background: url( https://images.unsplash.com/photo-1541746972996-4e0b0f43e02a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);
background-size: cover;">



{{-- Success pop up after submitting the form --}}
@if(Session::has('success'))
    <div class="alert alert-success">
    {{ Session::get('success') }}
    </div>
  @endif


  {{-- Success pop up after deleting the form --}}
@if(Session::has('delete'))
<div class="alert alert-success">
{{ Session::get('delete') }}
</div>
@endif


<div class="row justify-content-center">
  <div class="heading" style=" margin-top: 4%;width:fit-content; font-weight: bold; color: white;">
    <h2 class="font-weight-bold">View & Add Comments</h2>
  </div>
  
  <span class="add_btn">
    <a href="{{route('add_comments_new')}}" style="position:absolute; left:87%;"><button type="submit" class="btn btn-primary">Add Comment</button></a></span>   
    
    {{-- Table displatying the comments on the day end --}}
  <div class="card mb-4" style="width: 93%;margin-top: 3.7%; container: body;">
    <div class="card-header">
       Member's Report(s)
    </div>
    <div class="card-body">
      <table class="table mb-10" id= "myTable_2">
<thead class="thead">
  <tr>
    <th scope="col">Comment Date</th>
    <th scope="col">Project</th>
    <th scope="col">Module</th>
    <th scope="col">Developer's Comment</th>
    <th scope="col">Team Lead's Name</th>
    <th scope="col">Team Lead's Comment</th>
    <th scope="col">Manager Name</th>
    <th scope="col">Manager's Comment</th>
    <th scope="col">Approval Status</th>
  </tr>
</thead>
    

<tbody>
  @foreach ($comments as $comm)
  <tr>
    <th scope="row">{{date('d-M-Y', strtotime($comm->created_at)) }}</th>

    @if(App\Models\Project::where('id', $comm->project_id)->pluck('id')->all() != Null)
    <td>{{App\Models\Project::where('id', $comm->project_id)->first()->project_name}}</td> 
    @else
    <td>--</td>
    @endif

    @if((App\Models\Project_module::where('id', $comm->module_id)->pluck('id')->all()) != NULL)
    <td>{{App\Models\Project_module::where('id', $comm->module_id)->first()->module_name}}</td>
    @else
    <td>Unknown</td>
    @endif

    <td>{{$comm->team_member_comment}}</td>

    @if(App\Models\User::where('id', $comm->lead_id)->pluck('id')->all() != null)
    <td>{{ App\Models\User::where('id', App\Models\Reporting_manager::where('user_id', session('Logged_user')->id)->pluck('reporting_user_id')->all())->first()->name }}</td>
    @else
    <td>--</td>
    @endif
    <td>{{$comm->team_lead_comment}}</td>  

    @if(App\Models\Project::where('id', $comm->project_id)->pluck('id')->all() != Null)
    <td>{{App\Models\User::where('id', App\Models\Project::where('id', $comm->project_id)->pluck('project_manager_id')->all())->first()->name}}</td>
    @else
    <td>{{App\Models\User::where('role_id', 1)->first()->name}}</td>
    @endif

    <td>{{$comm->manager_comment}}</td> 

    @if($comm->approval_status != NULL) 
    @if($comm->approval_status == 0)
   <td><button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Dis-pproved"><i class="fa-solid fa-thumbs-down fa-lg"></i></button></td>
   @else
   <td><button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Approved"><i class="fa-solid fa-thumbs-up fa-lg"></i></button></td>
    @endif
    @else
    <td><button type="button" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Approval Pending from Team Lead"><i class="fa-solid fa-question fa-lg"></i></button>&nbsp;&nbsp;<a href="{{url('/')}}/member/delete/comment/{{$comm->id}}" onclick="return confirm('Are you sure you want to delete this comment?')"><button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete Comment"><i class="fa-solid fa-trash-can fa-lg"></i></button></a></td>
    @endif
  </tr>
  @endforeach
</tbody>
</table>
</div>
</div>
</div>
  

{{-- Footer of the page --}}
@include('layouts.member_footer')


  
    
 

