{{-- Heder of the page --}}
@include('layouts.lead_header')

<div id= "layoutSidenav_content" style="background-image: url(https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80); background-size:cover;">
    <div class="row justify-content-center">
  

      
      {{-- New section to edit members --}}
    <div style="display: grid; place-items: center; color:white;">
    <h2 class="font-weight-bold mt-4 mr-4">Edit Developer: {{$user['name']}}</h2>
</div>
    <div class="form" style="background-color: white;
    padding: 2rem;
    margin-right:1%;
    width: 60%;
    margin-bottom: 5%;">
    <form action = "{{url('/')}}/lead/edit/members/{{ $user->id }}" method = "post">
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
              <input class="form-check-input" type="radio" id="gridRadios2" {{$user->role_id == 3 ? "checked" : ""}}>
              <label class="form-check-label" for="gridRadios2">
                {{$user->role->role_name}}
              </label>
            </div>
          </fieldset>
            
          <button type="reset" class="btn btn-primary" style="float:left;">Reset</button>
        <div class="form-group">
          <div class="col-sm-10" style="position: relative; left: 37%;">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </div>
      </form>
      <a href="{{url('/')}}/team_lead/view_members/{{session('Logged_user')->id}}"><button type="back" class="btn btn-primary" style="position: absolute; left: 76.5%; top: 62.2%;">Back</button></a>
    </div>
    </div>


    
    {{--Footer of the page  --}}
    @include('layouts.lead_footer')









    
    