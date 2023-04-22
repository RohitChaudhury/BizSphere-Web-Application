{{-- Heading of the blade page --}}
@include('layouts.lead_header')


<div id="layoutSidenav_content" style="background: url(https://images.unsplash.com/photo-1484863137850-59afcfe05386?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1471&q=80); background-size: cover;">
    {{-- Success pop-up of the form --}}
  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
</div>
  @endif

<div class="heading" style="display: grid; place-items: center; color:white;">
   <h2 class ="font-weight-bold mt-4 mr-4">Edit Profile</h2>
</div>
<div class="card mb-4" style="background-color: white;
padding: 2rem;
width: 73%;
height: 78%;
margin-left: 14%;
margin-bottom: 5%;">
  <div class="card-body">

{{-- Main form to edit profile --}}
<div class="form">

<form action = "{{route('lead_update_profile')}}" method = "post">
@csrf
    <div class="form-group row mb-4">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputEmail3" name = 'name' value= "{{$user->name}}">
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
        <input type="email" class="form-control" id="inputEmail3" name = 'email' placeholder="eg @gmail.com" value= "{{$user->email}}">
    </div>
        <span class="text-danger">
            @error('email')
            {{$message}}
            @enderror
        </span>
    
    </div>


    <div class="form-group row mb-4">
      <label for="password" class="col-sm-2 col-form-label">Change Password</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="inputPassword3" name = "password" placeholder="Must be of 6 characters with a special char(@, /, &, etc.)">
    </div>
        <span class="text-danger">
            @error('password')
            {{$message}}
            @enderror
        </span>
      
    </div>
   
    <div class="form-group row mb-4">
        <label for="password" class="col-sm-2 col-form-label">Confirm Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="inputPassword3" name = "password_confirmation">
        </div>
          <span class="text-danger">
            @error('password_confirmation')
            {{$message}}
            @enderror
        </span>
        </div>
    

      <div class="form-group row mb-4">
        <label for="inputEmail3" class="ml-2">Note: <b class="ml-4">Enter a new Password in the columns to change password</b></label>
      </div>

    <div class="form-group row mb-4">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Phone-number</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputEmail3" name= 'phone_number' value= "{{$user->phone}}">
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
          <input class="form-check-input" type="radio" id="gridRadios2"  name = 'role_name' value="Project Lead"  {{$user->role_id == 2 ? "checked" : ""}}>
          <label class="form-check-label" for="gridRadios1">
            {{$user->role->role_name}}
          </label>
        </div>
   </fieldset>
        

    <fieldset class="form-group row">
     <legend class="col-form-label col-sm-2 float-sm-left pt-0">Status</legend>
     <div class="col-sm-10">
       <div class="form-check">
         <input class="form-check-input" type="radio" id="gridRadios1" name='status' value = "1" {{$user->status == 1 ? "checked" : ""}}>
         <label class="form-check-label" for="gridRadios1">
           Active
         </label>

       </div>
       <div class="form-check">
         <input class="form-check-input" type="radio" id="gridRadios2" value="0" name = 'status' {{$user->status == 0 ? "checked" : ""}}>
         <label class="form-check-label" for="gridRadios2"'>
          Inactive
         </label>
       </div>
   </fieldset>

   <div class="form-group row pl-4">
    <span class="col-sm-10">
   <button type="reset" class="btn btn-primary">Reset</button>
    </span>
   </div>

    <div class="btn" style="position:absolute; left:42%; top: 88%;">
   <div class="form-group row pl-4">
     <span class="col-sm-10">
       <button type="submit" class="btn btn-primary">Save</button>
     </span>
   </div>
  </div>
 </form>

 <div class="back" style="position:absolute; bottom: 5%; left: 85%;">
  <a href="{{url('/')}}/dashboard/team_lead"><button type="back" class="btn btn-primary">Back</button></a>
 </div>
</div>
  </div>
</div>



{{-- Footer of the page --}}
@include('layouts.lead_footer')