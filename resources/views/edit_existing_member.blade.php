
   {{--  Header of the page --}}
   @include('layouts.manager_header')
      
 <div id= "layoutSidenav_content" style="  background-image: url(https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80); background-size:cover;">
  <div class="row justify-content-center">
  
{{-- New section to add members --}}
<div style="display: grid; place-items: center; color:white;">
  @if($user->role_id == 2)
  <h2 class="font-weight-bold mt-4 mr-4">Edit Team Lead: {{$user['name']}}</h2>
  @else
  <h2 class="font-weight-bold mt-4 mr-4">Edit Developer: {{$user['name']}}</h2>
  @endif
  </div>


  <div class="form" style="background-color: white;
       padding: 2rem;
       margin-right:1%;
       width: 60%;
       height: 71.1%;
       margin-bottom: 5%;">
<form action = "{{url('/')}}/update/member/{{$user['id']}}" method = "post">
  
  @csrf
  <div class="form-group row mb-4">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputEmail3" name = 'name' value = "{{$user['name']}}">
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
        <input type="email" class="form-control" id="inputEmail3" name = 'email' value= "{{$user['email']}}">
      </div>
      <span class="text-danger">
        @error('email')
        {{$message}}
        @enderror
    </span>
    </div>
      

    <div class="form-group row mb-4">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Phone-number</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputEmail3" name= 'phone_number' value ="{{$user['phone']}}">
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
          <input class="form-check-input" type="radio" id="gridRadios1" value="Project Lead" name='role_name' {{$user->role_id == 2 ? "checked" : ""}}>
          <label class="form-check-label" for="gridRadios1">
            Team Lead
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" id="gridRadios2"  name = 'role_name' value="Project Member"  {{$user->role_id == 3 ? "checked" : ""}}>

          <label class="form-check-label" for="gridRadios2" name='role_name'>
           Developer
          </label>
        </div>
    </fieldset>
    <button type="reset" class="btn btn-primary mt-4" style="float:left;">Reset</button>

    <div class="form-group row pl-4">
      <div class="col-sm-10" style="position: relative; left: 36%;">
        <button type="submit" class="btn btn-primary mt-4">Save</button>
      </div>
    </div>
  </form>
  <a href="{{route('manager_employee_records')}}"><button type="back" class="btn btn-primary" style="position:relative; left: 90%; bottom: 12.9%">Back</button></a>
</div>
</div>

{{-- Footer of the page --}}
@include('layouts.manager_footer')
