{{-- Header of the page --}}
@include('layouts.manager_header')

<div id="layoutSidenav_content" style=" background: url(https://images.unsplash.com/photo-1590650516494-0c8e4a4dd67e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2942&q=80); background-size: cover;">
      {{-- Heading on top of the page --}}
      <div class="heading" style="display:grid;
      place-items: center;
      margin-top: 2.4%;
      margin-bottom: 3%; color:white;">
        <h2 class="font-weight-bold mt-4 mr-4">Assign existing Project under Team Lead</h2>
        {{-- Pop-up on submitting the form --}}
        @if(session('pop-up'))
        <div class="alert alert-success">
          {{ session('pop-up') }}
        </div>
          @endif
      

      {{-- Pop-up on removing the project from assigned Lead  --}}
      @if(session('delete'))
      <div class="alert alert-success">
        {{ session('delete') }}
      </div>
        @endif
    </div>
      

      {{-- Main form of the Project --}}
      <div class="form" style=" width: 42.8%;
      padding: 2rem;
      background-color: white;
      position: relative;
      left: 28%;
      height: 44vh;">
        <form action="{{url('/')}}/manager/assign/project/" method ="POST">
          @csrf
          {{-- To select Team Lead --}}
         <div class="form-group">
           <label for="project_lead">Select a Team Lead:</label>
           {!! Form::select('project_lead', [''=>' -- select a team lead -- '] + $leads, null, ['class' => 'form-control']) !!}
           <span class="text-danger">
            @error('project_lead')
            {{$message}}
            @enderror
        </span>
         </div>
        
         {{-- To select project --}}
         <div class="form-group">
            <label for="project">Select a Project:</label>
            {!! Form::select('project', [''=>' -- select a project under this lead -- '] + $projects, null, ['class' => 'form-control']) !!}
            <span class="text-danger">
              @error('project')
              {{$message}}
              @enderror
          </span>
          </div>

          {{-- Submit button --}}
          <div class="text-center" style="margin-top: 20px;">
            <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure you want to assign this project to the lead?')">Save</button>
           </div>
        </form>
      </div>

      
      {{-- Table showing Projects under Lead --}}
      {{-- REAMAINING --}}
      <div class="card mb-4" style = "width:95%; margin-left:2.8%;margin-top:6%;">
        <div class="card-header">
         Assigned Projects under Team Lead(s)
        </div>
        <div class="card-body">
      <table class="table mb-10" id = "myTable_2">
        <thead class = "thead">
          <tr>
            <th>Sl No</th>
            <th>Project</th>
            <th>Assigned to</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($pr_assigned as $pr)
          <tr>
            <td scope="row">{{ $sl_no++ }}</td>
            <td>{{ App\Models\Project::where('id', $pr->project_id)->first()->project_name }}</td>
            <td>{{ App\Models\User::where('id', $pr->user_id)->first()->name }}</td>
            <td><a href="/manager/remove/assign/{{$pr->id}}" onclick="return confirm('Are you sure you want to remove this Project from lead')"><button type="button" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can fa-lg"></i></button></a></td>
            
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
      </div>







      {{-- Footer of the page --}}
      @include('layouts.manager_footer')

      








   
