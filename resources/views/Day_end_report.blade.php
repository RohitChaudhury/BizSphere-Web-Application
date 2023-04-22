{{-- Header of the page --}}
@include('layouts.manager_header')
      
      <div id= "layoutSidenav_content" style=" background: url( https://images.unsplash.com/photo-1541746972996-4e0b0f43e02a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);
      background-size: cover;">
      {{-- Success pop up after adding comments --}}
@if(Session::has('success'))
<div class="alert alert-success">
{{ Session::get('success') }}
</div>
@endif
      <div class="row justify-content-center">
          <div class="heading" style=" margin-top: 4%;width:fit-content;
          font-weight: bold;
          color: white;">
            <h2 class="font-weight-bold">View & Add Comments</h2>
          </div>
    {{-- Table displaying the comments on the day end --}}
  
    <div class="card mb-4" style="width: 93%;">
      <div class="card-header">
         Employee's Day end Reports
      </div>
      <div class="card-body">
      <table class="table mb-10" id= "myTable_2">
      <thead class="thead">
        <tr>
         <th scope="col">Comment Date</th>
         <th scope="col">Project</th>
         <th scope="col">Module</th>
         <th scope="col">Developer's Name</th>
         <th scope="col">Developer's Comment</th>
         <th scope="col">Team Lead's Name</th>
         <th scope="col">Team Lead's Comment</th>
         <th scope="col">Manager's Comment</th>
         <th scope="col">Approval Status</th>
        </tr>
      </thead>
        
      
      <tbody>
      @foreach($comments as $comm)
      <tr>
      <th scope="col">{{date('d-M-Y', strtotime($comm->created_at)) }}</th>
      
        @if(App\Models\Project::where('id', $comm->project_id)->pluck('id')->all() != Null)
       <td>{{App\Models\Project::where('id', $comm->project_id)->first()->project_name}}</td> 
        @else
        <td>--</td>
        @endif


      @if((App\Models\Project_module::where('id', $comm->module_id)->pluck('id')->all()) != NULL)
      <td>{{App\Models\Project_module::where('id', $comm->module_id)->first()->module_name}}</td>
      @else
      <td>--</td>
      @endif

      @if($comm->user_id != Null)
      <td>{{ App\Models\User::where('id', $comm->user_id)->first()->name }}</td>
      @else
      <td>--</td>
      @endif

      <td>{{$comm->team_member_comment}}</td>

      
      @if($comm->lead_id != Null)
        @if(App\Models\User:: where('id', $comm->lead_id)->pluck('id')->all() != Null)
        <td>{{App\Models\User::where('id', $comm->lead_id)->first()->name}}</td>
        @else
        <td>--</td>
        @endif

      @else
      <td>--</td>
      @endif


      <td>{{$comm->team_lead_comment}}</td>
      <td>{{$comm->manager_comment}}</td>
  
      @if($comm->approval_status == NULL && $comm->manager_comment == NULL)
      <td><button type="button" class="btn btn-secondary btn-sm"  data-toggle="tooltip" data-placement="top" title= "Approval Pending from Team Lead"><i class="fa-solid fa-question fa-lg"></i></button>&nbsp;&nbsp;&nbsp;<a href="{{url('/')}}/manager/add/comments/{{$comm->id}}"><button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Add a Comment on this Member's report"><i class="fa-sharp fa-solid fa-comment fa-lg"></i></button></a></td>

      @elseif($comm->approval_status == NULL)
      <td><button type="button" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Approval Reply is Pending"><i class="fa-solid fa-question fa-lg"></i></button></td>

      @elseif($comm->approval_status == 0 && $comm->manager_comment == null)
      <td><button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Approved by Team Lead"><i class="fa-solid fa-thumbs-down fa-lg"></i></button>&nbsp;&nbsp;<a href="{{url('/')}}/manager/add/comments/{{$comm->id}}"><button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Add a Comment on this Member's report"><i class="fa-sharp fa-solid fa-comment fa-lg"></i></button></a></td>

      @elseif($comm->approval_status == 1 && $comm->manager_comment == null)
      <td><button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Approved by Team Lead"><i class="fa-solid fa-thumbs-up fa-lg"></i></button>&nbsp;&nbsp;<a href="{{url('/')}}/manager/add/comments/{{$comm->id}}"><button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Add a Comment on this Member's report"><i class="fa-sharp fa-solid fa-comment fa-lg"></i></button></a></td>

      @elseif($comm->approval_status == 0)
      <td><button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Dis-approved by Team Lead" data-toggle="tooltip" data-placement="top" title="Add a Comment on this Member's report"><i class="fa-solid fa-thumbs-down fa-lg"></i></button></td>
      
      @elseif($comm->approval_status == 1)
      <td><p><button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Approved by Team Lead"><i class="fa-solid fa-thumbs-up fa-lg"></i></button></p></td>
      @endif
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>
</div>
   

{{-- Footer of the page --}}
@include('layouts.manager_footer')
  

        
            




   
    
     
   






