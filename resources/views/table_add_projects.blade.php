

{{-- Header of the Project --}}
@include('layouts.manager_header')


{{-- Main form to add new projects --}}
  <div id ="layoutSidenav_content" style = "background: url(https://images.unsplash.com/19/desktop.JPG?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);background-size: cover;">
    @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
    @endif
    <div style="display: grid; place-items: center; color:white;">
  <h2 class="font-weight-bold mt-4 mr-4">Add a new Project</h2></div>


   <div class="card mb-4" style = "background-color: white; padding: 2rem; width: 60%; height:75%; position: relative; left:20.2%;">
   <form action = "{{url('/')}}/add/projects" method = "post">
   @csrf
       <div class="form-group">
           <label for="inputEmail3">Project Name</label>
           <div>
             <input type="text" class="form-control" id="inputEmail3" name = 'project_name'>
           </div>
           <span class="text-danger">
            @error('project_name')
            {{$message}}
            @enderror
        </span>
       </div>

       <div class="form-group">
        <label for="exampleFormControlTextarea1">Project Details (optional)</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "project_details"></textarea>
      </div>
   
      
   
       <div class="form-group row mb-4">
           <label for="inputEmail3" class="col-sm-4 col-form-label">Deadline</label>
           <div class="col-sm-10">
             <input type="date" class="form-control" id="inputEmail3" name= 'estimated_end_date'>
           </div>
           <span class="text-danger">
            @error('estimated_end_date')
            {{$message}}
            @enderror
        </span>
       </div>
   
   
  
       <fieldset class="form-group row">
        <legend class="col-form-label col-sm-2 float-sm-left pt-0">Project Status</legend>
        <div class="col-sm-10">
          <div class="form-check">
            <input class="form-check-input" type="radio" id="gridRadios1" value="1" name='status'>
            <label class="form-check-label" for="gridRadios1">
              Active
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" id="gridRadios2" value="0" name ='status'>
            <label class="form-check-label" for="gridRadios2">
             Inactive
            </label>
          </div>
          <span class="text-danger">
            @error('status')
            {{$message}}
            @enderror
        </span>
      </fieldset>

  <div class="form-group row">
    <label for="exampleFormControlTextarea1">Note: <b> Please Check the Project name and details before Adding. These cant be edited or Project can't be removed later, after adding!</b></label>
  </div>

  <button type="reset" class="btn btn-primary" style="float:left;">Reset</button>
  <div class="btn" style="position: relative; left: 31%;">
    <div class="form-group row pl-4">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to add a new Project?')">Add</button>
        </div>
      </div>
    </div>
    </form>
    <a href="{{url('/')}}/all_projects"><button type="back" class="btn btn-primary" style="position:relative; left: 90%; bottom: 156%">Back</button></a>
  </div>




{{-- footer of the page --}}
@include('layouts.manager_footer')



      
      