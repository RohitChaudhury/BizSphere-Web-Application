{{-- Header of the blade page --}}
@include('layouts.lead_header')

<div id= "layoutSidenav_content" style=" background: url( https://images.unsplash.com/photo-1541746972996-4e0b0f43e02a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);
background-size: cover;">

{{-- Success pop up after adding comments --}}
@if(Session::has('success'))
    <div class="alert alert-success">
    {{ Session::get('success') }}
    </div>
  @endif

<div class="row justify-content-center" >
    <div class="heading" style=" margin-top: 4%;width:fit-content; font-weight: bold; color: white;">
      <h2 class="font-weight-bold">View & Add Comments</h2>
    </div>

<div class="card mb-4" style="width: 93%;">
  <div class="card-header">
     Member's Report(s)
  </div>
  <div class="card-body" >
<table class="table mb-10" id= "myTable_2">
<thead class="thead">
  <tr>
    <th scope="col">Comment Date</th>
    <th scope="col">Project</th>
    <th scope="col">Module</th>
    <th scope="col">Member's Name</th>
    <th scope="col">Developer's Comment</th>
    <th scope="col">Team Lead's Comment</th>
    <th scope="col">Manager Name</th>
    <th scope="col">Manager's Comment</th>
    <th scope="col">Approval Status</th>
  </tr>
</thead>

<tbody>
  @foreach($comments as $comm)
  <tr>
    <th scope="row">{{date('d-M-Y', strtotime($comm->created_at)) }}</th>

    @if(App\Models\Project::where('id', $comm->project_id) != Null)
    <td>{{App\Models\Project::where('id', $comm->project_id)->first()->project_name}}</td> 
    @else
    <td>--</td>
    @endif

    @if((App\Models\Project_module::where('id', $comm->module_id)->pluck('id')->all()) != NULL)
    <td>{{App\Models\Project_module::where('id', $comm->module_id)->first()->module_name}}</td>
    @else
    <td>Unknown</td>
    @endif

    @if($comm->user_id != Null)
      <td>{{ App\Models\User::where('id', $comm->user_id)->first()->name }}</td>
      @else
      <td></td>
      @endif

    <td>{{$comm->team_member_comment}}</td>
    
    <td>{{$comm->team_lead_comment}}</td>
    @if(App\Models\Project::where('id', $comm->project_id) != Null)
    <td>{{App\Models\User::where('id', App\Models\Project::where('id', $comm->project_id)->pluck('project_manager_id')->all())->first()->name}}</td>
    @else
    <td>--</td>
    @endif

    <td>{{$comm->manager_comment}}</td>

    @if($comm->approval_status == NULL && $comm->team_lead_comment == NULL)
    <td><p><a href="{{url('/')}}/lead/comment/approve/{{$comm->id}}" onclick="return confirm('Are you sure you want to approve this comment?')"><button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Approve this report"><i class="fa-solid fa-thumbs-up fa-lg"></i></button></a>&nbsp;<a href="/lead/comment/dis-approve/{{$comm->id}}" onclick="return confirm('Are you sure you want to dis-approve this comment?')"><button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Dis-approve this report"><i class="fa-solid fa-thumbs-down fa-lg"></i></button></a></p><p>&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{url('/')}}/lead/add/comments/{{$comm->id}}"><button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Add a Comment"><i class="fa-sharp fa-solid fa-comment fa-lg"></i></button></a></p></td>

    @elseif (($comm->approval_status == 0) && $comm->team_lead_comment == NULL)
    <td><button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Dis-approved"><i class="fa-solid fa-thumbs-down fa-lg"></i></button>&nbsp;&nbsp;<a href="{{url('/')}}/lead/add/comments/{{$comm->id}}"><button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Add a Comment"><i class="fa-sharp fa-solid fa-comment fa-lg"></i></button></a></td> 

    @elseif (($comm->approval_status == 1) && $comm->team_lead_comment == NULL)
    <td><button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Approved"><i class="fa-solid fa-thumbs-up fa-lg"></i></button>&nbsp;&nbsp;<a href="{{url('/')}}/lead/add/comments/{{$comm->id}}"><button type="button" class="btn btn-primary btn-sm"data-toggle="tooltip" data-placement="top" title="Add a Comment"><i class="fa-sharp fa-solid fa-comment fa-lg"></i></button></a></td>

    @elseif(($comm->approval_status == 0) && $comm->team_lead_comment != NULL)
    <td><button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Approved"><i class="fa-solid fa-thumbs-down fa-lg"></i></button></td>

    @elseif(($comm->approval_status == 1) && $comm->team_lead_comment != NULL)
    <td><button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Approved"><i class="fa-solid fa-thumbs-up fa-lg"></i></button></td>

    @elseif($comm->approval_status == NULL && $comm->team_lead_comment != NULL)
    <td><a href="{{url('/')}}/lead/comment/approve/{{$comm->id}}"><button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Approved"><i class="fa-solid fa-thumbs-up fa-lg"></i></button></a>&nbsp;<a href="/lead/comment/dis-approve/{{$comm->id}}"><button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Dis-approved"><i class="fa-solid fa-thumbs-down fa-lg"></i></button></a></td>
    @endif
  </tr>
  
  @endforeach
</tbody>
</table>
</div>
</div>
</div>
    



  
    







 {{-- Footer of the page --}}
 @include('layouts.lead_footer')