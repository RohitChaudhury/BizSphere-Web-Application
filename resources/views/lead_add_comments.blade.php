{{-- Header of the blade page --}}
@include('layouts.lead_header')

</div>
{{-- Body Content of the page --}}
<div class="layoutSidenav_content" style=" background: url( https://images.unsplash.com/photo-1541746972996-4e0b0f43e02a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80); background-size: cover;">

        <div style="margin-top:3.6%;">
          <h2  style="width:fit-content;
          font-weight: bold;
          color: white; margin-left: 40%;">View & Add Comments</h2>
       </div>

       
        {{-- From to add comments --}}
<div class="card mb-4" style= "margin-top: 2%; width:46vw; height:86vh; background-color: white; padding: 2rem; margin-bottom:4%; margin-left: 33%;"> 
    <div class="heading_form" style="margin-bottom: 4%;">
 <h2>Add Comment on {{App\Models\User::where('id', $comments->user_id)->first()->name}}'s report</h2>
</div>
 
    
       
    <form action = "{{url('/')}}/lead/add/comments/{{$comments->id}}" method = "post">
    @csrf
        <div class="form-group row mb-4">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Project:</label>
            <div class="col-sm-10">
             <b>{{ App\Models\Project::where('id', $comments->project_id)->first()->project_name }}</b>
            </div>
        </div>
    
        <div class="form-group row mb-4">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Module:</label>
          @if((App\Models\Project_module::where('id', $comments->module_id)->pluck('id')->all()) != NULL)
          <div class="col-sm-10">
            <b>{{App\Models\Project_module::where('id', $comments->module_id)->first()->module_name}}</b>
        </div>
        @else
        <div class="col-sm-10 text-danger">Unknown</div>
        @endif
    </div>
    

    <div class="form-group row mb-4">
          <label for="text" class="col-sm-2">{{App\Models\User::where('id', $comments->user_id)->first()->name}}'s comment</label>
          <div class="col-sm-10">
           {{ $comments->team_member_comment }}
        </div>
    </div>

    <fieldset class="form-group row">
      <legend class="col-form-label col-sm-2 float-sm-left pt-0">Approval Status</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" id="gridRadios1" value="1" name='status' {{$comments->approval_status == 1 ? "checked" : ""}}>
          <label class="form-check-label" for="gridRadios1">
           Approved
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" id="gridRadios2" value="0" name = 'status' {{$comments->approval_status == 0 && $comments->approval_status != null ? "checked" : ""}}>
          <label class="form-check-label" for="gridRadios2" name='role_name'>
          Disapproved
          </label>
        </div>
        <span class="text-danger">
          @error('status')
          {{$message}}
          @enderror
      </span>
    </fieldset>






    
    <div class="form-group row mb-4">
         <label for="inputEmail3" class="col-sm-2">Your's Comment</label>
         <div class="col-sm-10">
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "lead_comment"" placeholder="Comment here...."></textarea>
         </div>
         <span class="text-danger">
          @error('lead_comment')
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
    <a href="{{url('/')}}/lead/view/comments"><button type="back" class="btn btn-primary" style="position:relative; left: 87.6%; bottom: 171.5%">Back</button></a>
</div>


   


{{-- Footer of the page --}}
@include('layouts.lead_footer')

     
     



