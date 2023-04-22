{{-- Header of the blade page --}}
@include('layouts.lead_header')
      
      
      <div id="layoutSidenav_content" style ="background-image: url(https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80); background-size: cover;">
        
        
        {{-- Success pop-up of the form after adding members --}}
    @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
    @endif


        {{-- Success pop-up after removing a member --}}
       @if(session('remove'))
       <div class="alert alert-success">
         {{ session('remove') }}
         </div>
    @endif


    {{-- Success pop-up of the form after editing member--}}
    @if(session('success_edit'))
    <div class="alert alert-success">
      {{ session('success_edit') }}
    </div>
    @endif


        {{-- <div class="row justify-content-center"> --}}
      <span class="add_btn">
        <a href="{{url('/')}}/team_lead/add/members" style="position: absolute;left:89%; top:4%"><button type="submit" class="btn btn-primary">Add Member</button></a></span>   


        {{-- Member's record table --}}
        <div class="card mb-4" style = "width:95%; margin-left:2.8%;margin-top:5.5%;">
          <div class="card-header">
             Member's record(s)
          </div>
          <div class="card-body">
      <table class="table mb-10" id ="myTable">
        <thead class="thead">
          <tr>
            <tr>
              <th scope="col">Role Name</th>
              <th scope="col">Employee Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone Number</th>
              <th scope="col">Status</th>
              <th scope="col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</th>
            </tr>
          </thead>
             
             
          
         @if($user != NULL)
        <tbody>
         @foreach ($user as $emp)
         @if ($emp->id != session('Logged_user')->id)
         <tr>
          <th scope="col">{{$emp->role->role_name}}</td>
        
         <th scope = "col">{{ $emp['name'] }}</td>
        



         <td>{{ $emp['email'] }}</td>
         <td>{{ $emp['phone'] }}</td>

        @if($emp['status'] == 1)
           <td>&nbsp;&nbsp;<a href="{{url('/')}}/team_lead/change/status/member/{{ $emp->id }}/{{ session('Logged_user')->id }}" onclick="return confirm('Are you sure you want to change the status?')"><button class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Change Status to: in-active"><i class="fa-sharp fa-solid fa-check fa-lg"></i></button></a></td>
           @else
           <td>&nbsp;&nbsp;<a href="{{url('/')}}/team_lead/change/status/member/{{ $emp->id }}/{{ session('Logged_user')->id }}" onclick="return confirm('Are you sure you want to change the status?')"><button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Change Status to: active"><i class="fa-sharp fa-solid fa-xmark fa-xl"></i></button></a></td>
           @endif
        




          <td>&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{url('/')}}/lead/edit/members/{{ $emp->id }}"><button class = "btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit {{ $emp['name'] }}'s record"><i class="fa-solid fa-pencil fa-lg"></i></button></a>&nbsp;&nbsp;<a href="{{url('/')}}/lead/remove_member/{{ $emp->id }}" onclick="return confirm('Are you sure you want to remove this Lead/Member')"><button class = "btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Remove this Member"><i class="fa-solid fa-trash-can fa-lg"></i></button></a></td>
        </tr>
        @endif
        @endforeach
       </tbody>
       @endif
      </table>
        </div>
        </div>

         


         

  
            
             
             
  {{--Footer of the page  --}}
  @include('layouts.lead_footer')
        
         
        
        
         

       
          
