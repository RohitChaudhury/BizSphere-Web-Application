{{-- Header of the page --}}
@include('layouts.lead_header')

<div id="layoutSidenav_content" style = "background: url(https://images.unsplash.com/19/desktop.JPG?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);background-size: cover;">
  
  <div style="display: grid; place-items: center; color:white;">
    <h2 class="font-weight-bold mt-4 mr-4">{{$project['project_name']}}'s Module</h2>
 </div>
  
    
  


<div class="card mb-4" style = "width: 60%; margin-left:20.4%; height: 68%;">
 <div class="card-body" style="padding:2rem;">
     
     
   
     <div class="heading_form" style="color:black; margin-bottom: 5%;">
      <h2>Update Module: {{$edit_module['module_name']}}</h2>
    </div>

    {{-- Main form to add new projects --}}
    <form action = "{{url('/')}}/lead/edit/project/module/{{$edit_module['id']}}/{{$project['id']}}" method = "post">
      @csrf
    <div class="form-group row mb-4">
      <label for="text" class="col col-form-label">Project Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>{{$project['project_name']}} </b></label>
    </div>


         <div class="form-group row mb-4">
          <label for="text" class="col-sm-3 col-form-label">Module Name:</label>
          <div class="col-sm-4">
           <label for="text" class="col col-form-label"><b>{{$edit_module['module_name']}}</b></label>
          </div> 
          <span class="text-danger">
       @error('module_name')
       {{$message}}
       @enderror
      </span>
         </div>
       
            
           
        
            <div class="form-group row mb-4">
              <label for="text" class="col-sm-3 col-form-label">Module Weightage:</label>
              <div class="col-sm-4">
                <label for="text" class="col col-form-label"><b>{{$edit_module['module_weightage']}}</b></label>
               </div>
               <span class="text-danger">
                @error('module_weightage')
                {{$message}}
                @enderror
            </span>
              </div>
        
        
           
        
              <div class="form-group row mb-4">
                <label for="completion_percentage" class="col col-form-label">Completion Percentage:</label>
                <div class="col-sm-15">
                  <input type="text" class="form-control" id="inputEmail3" name = 'completion_percentage' value = {{$edit_module['completion_percentage']}} placeholder="dont use % sign">
                </div>
                  <span class="text-danger">
                    @error('completion_percentage')
                    {{$message}}
                    @enderror
                </span>
              </div>
                
        
       
              <button type="reset" class="btn btn-primary" style="float:left;">Reset</button>
              <div style="position: relative;
              left:33%;">
                 <div class="form-group row pl-4">
             <div class="col-sm-15">
               <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </div>
          </div>
        </div>
       </form>
       <a href="{{url('/')}}/lead/view/module/{{$project['id']}}"><button type="back" class="btn btn-primary" style="position:relative; left: 87.6%; bottom: 220%">Back</button></a>
      </div>
   
    


{{-- Footer of the page --}}
@include('layouts.lead_footer')