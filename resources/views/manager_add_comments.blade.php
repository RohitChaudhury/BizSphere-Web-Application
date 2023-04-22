{{-- Header of the blade page --}}
@include('layouts.manager_header')

</div>
{{-- Body Content of the page --}}
<div class="layoutSidenav_content" style=" background: url( https://images.unsplash.com/photo-1541746972996-4e0b0f43e02a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80); background-size: cover;">

        <div style="margin-top:3.6%;color:white;margin-left: 44%;">
          <h2 class="font-weight-bold mt-4 mr-4">View & Add Comments</h2>
       </div>

       
        {{-- From to add comments --}}
<div class="card mb-4" style= "margin-top: 2%; width:46vw; height:91vh; background-color: white; padding: 2rem; margin-bottom:4%; margin-left: 33%;"> 
    <div class="heading_form" style="margin-bottom: 4%;">
      @if(App\Models\User::where('id', $comments->user_id)->pluck('id')->all()!= Null)
 <h2>Add Comment on {{App\Models\User::where('id', $comments->user_id)->first()->name}}'s report</h2>
 @else
 <h2>Add Comment on --'s report</h2>
 @endif
</div>
 
    
       
    <form action = "{{url('/')}}/manager/add/comments/{{$comments->id}}" method = "post">
    @csrf
        <div class="form-group row mb-4">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Project:</label>
            <div class="col-sm-10">
              @if(App\Models\Project::where('id', $comments->project_id)->pluck('id')->all() != Null)
             <b>{{ App\Models\Project::where('id', $comments->project_id)->first()->project_name }}</b>
             @else
             <div class="col-sm-10 text-danger">--</div>
             @endif
            </div>
        </div>
    
        <div class="form-group row mb-4">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Module:</label>
          @if((App\Models\Project_module::where('id', $comments->module_id)->pluck('id')->all()) != NULL)
          <div class="col-sm-10">
            <b>{{App\Models\Project_module::where('id', $comments->module_id)->first()->module_name}}</b>
        </div>
        @else
        <div class="col-sm-10 text-danger">--</div>
        @endif
    </div>

    <div class="form-group row mb-4">
      @if(App\Models\User::where('id', $comments->user_id)->pluck('id')->all()!= Null)
          <label for="text" class="col-sm-2">{{App\Models\User::where('id', $comments->user_id)->first()->name}}'s comment:</label>
          @else
          <label for="text" class="col-sm-2">Developer comment:</label>
          @endif
          <div class="col-sm-10">
           {{ $comments->team_member_comment }}
        </div>
    </div>
    <div class="form-group row mb-4">
          <label for="text" class="col-sm-2">Project Lead's comment:</label>
          <div class="col-sm-10">
           {{ $comments->team_lead_comment }}
        </div>
    </div>
    
    <div class="form-group row mb-4">
         <label for="inputEmail3" class="col-sm-2">Your's comment:</label>
         <div class="col-sm-10">
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "manager_comment"" placeholder="Comment here...."></textarea>
         </div>
         <span class="text-danger">
          @error('manager_comment')
          {{$message}}
          @enderror
      </span>
    </div>
    <button type="reset" class="btn btn-primary" style="float:left;">Reset</button>
    <div class="btn" style="position: relative; left:28%; bottom: 1.2%;">
        <div class="form-group row pl-4">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to add this comment?')">Submit</button>
          </div>
        </div>
      </div>
    </form>
    <a href="{{url('/')}}/add/day_end_report"><button type="back" class="btn btn-primary" style="position:relative; left: 87.6%; bottom: 171.5%">Back</button></a>
</div>


   


{{-- Footer of the page --}}
@include('layouts.manager_footer')

     
     



