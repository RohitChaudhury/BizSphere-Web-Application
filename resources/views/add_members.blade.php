{{-- Header of the page --}}
@include('layouts.manager_header')


{{-- Body content of the form --}}
 


  <div id= "layoutSidenav_content" style="background-image: url(https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80); background-size:cover;">
    {{-- Success pop-up of the form --}}
    @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
    @endif

    <span class="row justify-content-center">

        {{--section to add members --}}
        <div style="display: grid; place-items: center;">
       <h2 class="font-weight-bold mt-4 mr-4" style="color:white;">Add a New Employee</h2>
       </div>



       <div class="form" style=" background-color: white;
       padding: 2rem;
       margin-right:1%;
       width: 64%; height: 77%;
       margin-bottom: 5%;">
     
       
       <form action = "{{url('/')}}/edit/members" method = "post">
       @csrf
           <div class="form-group row mb-4">
               <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
               <div class="col-sm-10">
                 <input type="text" class="form-control" id="inputEmail3" name = 'name'>
               </div>
               <span class="text-danger">
                @error('name')
                {{$message}}
                @enderror
            </span>
           </div>
       
       
           <div class="form-group row mb-4">
             <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
             <div class="col-sm-10">
               <input type="email" class="form-control" id="inputEmail3" name = 'email' placeholder="eg @gmail.com">
             </div>
             <span class="text-danger">
              @error('email')
              {{$message}}
              @enderror
          </span>
           </div>
       
       
           <div class="form-group row mb-4">
             <label for="inputPassword3" class="col-sm-2 col-form-label">Set Password</label>
             <div class="col-sm-10">
               <input type="password" class="form-control" id="inputPassword3" name = 'password' placeholder="Must be of 6 characters with a special char(@, /, &, etc.) ">
             </div>
             <span class="text-danger">
              @error('password')
              {{$message}}
              @enderror
          </span>
           </div>
       
           <div class="form-group row mb-4">
               <label for="inputEmail3" class="col-sm-2 col-form-label">Phone-number</label>
               <div class="col-sm-10">
                 <input type="text" class="form-control" id="inputEmail3" name= 'phone_number'>
               </div>
               <span class="text-danger">
                @error('phone_number')
                {{$message}}
                @enderror
            </span>
           </div>
       
       
           <fieldset class="form-group row">
             <legend class="col-form-label col-sm-2 float-sm-left pt-0">Role asigned</legend>
             <div class="col-sm-10">
               <div class="form-check">
                 <input class="form-check-input" type="radio" id="gridRadios1" value="Project Lead" name='role_name'>
                 <label class="form-check-label" for="gridRadios1">
                   Team Lead
                 </label>
               </div>
               <div class="form-check">
                 <input class="form-check-input" type="radio" id="gridRadios2" value="Project Member" name = 'role_name'>
                 <label class="form-check-label" for="gridRadios2" name='role_name'>
                  Developer
                 </label>
               </div>
               <span class="text-danger">
                @error('role_name')
                {{$message}}
                @enderror
            </span>
           </fieldset>
           <fieldset class="form-group row">
            <legend class="col-form-label col-sm-2 float-sm-left pt-0">Status</legend>
            <div class="col-sm-10">
              <div class="form-check">
                <input class="form-check-input" type="radio" id="gridRadios1" value="1" name='status'>
                <label class="form-check-label" for="gridRadios1">
                  Active
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" id="gridRadios2" value="0" name = 'status'>
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
          
          <button type="reset" class="btn btn-primary" style="float:left;">Reset</button>
          
          <div class="form-group" style="position: relative; left: 39%;">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to add a new Member/Lead?')">Add</button>
            </div>
          </div>
        </form>
        <a href="{{route('manager_employee_records')}}"><button type="back" class="btn btn-primary" style="position:relative; left: 90%; bottom: 9.8%">Back</button></a>
      </div>
    </span>
  
      {{-- Footer of the page --}}
      @include('layouts.manager_footer')