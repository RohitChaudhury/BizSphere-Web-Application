{{-- Header of the blade page --}}
@include('layouts.manager_header')


<div id="layoutSidenav_content" style = "background: url(https://images.unsplash.com/19/desktop.JPG?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);background-size: cover;">
  <div style="display: grid; place-items: center; color:white;">
    <h2 class="font-weight-bold mt-4 mr-4">{{$project['project_name']}}'s Module</h2>
 </div>

<div class="card mb-4" style = "width: 60%; height: 84% ;margin-left:20.4%;">
    <div class="card-body" style="padding:2rem;">
        
        
      
        <div class="heading_form" style="color:black; margin-bottom: 5%;">
        <h2>Add Module</h2>
       </div>
        <form action = "{{url('/')}}/add/project_module/{{$project['id']}}" method = "post">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Project Name:&nbsp;&nbsp;&nbsp;&nbsp;<b> {{$project['project_name']}} </b></label>
            </div>
               <div class="form-group row mb-4">
                   <label for="inputEmail3" class="col-sm-3 col-form-label">Module Name</label>
                   <div class="col-sm-15">
                     <input type="text" class="form-control" id="inputEmail3" name = 'module_name'>
                   </div>
                   <span class="text-danger">
                    @error('module_name')
                    {{$message}}
                    @enderror
                </span>
               </div>
          
               
              
           
               <div class="form-group row mb-4">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Module Weightage</label>
                <div class="col-sm-15">
                  <input type="text" class="form-control" id="inputEmail3" name = 'module_weightage'>
                </div>
                <span class="text-danger">
                  @error('module_weightage')
                  {{$message}}
                  @enderror
              </span>
            </div>
           
           
              
           
            <div class="form-group row mb-4">
                <label for="completion_percentage" class="col-sm-2 col-form-label">Completion Percentage</label>
                <div class="col-sm-15">
                  <input type="text" class="form-control" id="inputEmail3" name = 'completion_percentage' placeholder="dont use % sign">
                </div>
                <span class="text-danger">
                  @error('completion_percentage')
                  {{$message}}
                  @enderror
              </span>
            </div>
          
            <button type="reset" class="btn btn-primary" style="float:left;">Reset</button>
           <div class="btn" style="position: relative;
           left:33%;">
              <div class="form-group row pl-4">
                <div class="col-sm-15">
                  <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to add a new Module?')">Add</button>
                </div>
              </div>
            </div>
            
          </div>
          </form>
          <a href="{{url('/')}}/add/project_module/{{$project['id']}}"><button type="back" class="btn btn-primary" style="position:relative; left: 87.6%; bottom: 241%">Back</button></a>
          </div>
        </div>
        </div>












{{-- Footer of the page --}}
@include('layouts.manager_footer')