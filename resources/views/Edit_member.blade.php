
      {{-- header of the page --}}
      @include('layouts.manager_header')

      
      {{-- Content of the body --}}
      <div id="layoutSidenav_content" style ="background-image: url(https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80); background-size:cover;">
       {{-- Success pop-up after removing a member --}}
       @if(session('remove'))
       <div class="alert alert-success">
         {{ session('remove') }}
         </div>
        @endif

         {{-- Success pop-up after editing a member --}}
       @if(session('success'))
       <div class="alert alert-success">
         {{ session('success') }}
         </div>
    @endif
          
          <span class="add_btn">
           <a href="/add/members" style="position: absolute;left:88.4%; top:2.8%"><button type="submit" class="btn btn-primary">Add Employee</button></a></span>   

           
           {{-- Member's record table --}}
        <div class="card mb-4" style = "width:95%; margin-left:2.8%;margin-top:6%;">
          <div class="card-header">
             Employee records
          </div>
          <div class="card-body">
      <table class="table mb-10" id ="myTable">
        <thead class="thead">
          <tr>
            <tr>
              <th scope="col">Role Name</th>
              <th scope="col">Employee Name</th>
              <th scope="col">Reporting Manager</th>
              <th scope="col">Email</th>
              <th scope="col">Phone Number</th>
              <th scope="col">Status</th>
              <th scope="col">Remove From Assigned Manager</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
             
             
          
         @if($user != NULL)
        <tbody>
         @foreach ($user as $emp)
         @if ($emp->id != session('Logged_user')->id)
         <tr>
          <th scope="col">{{$emp->role->role_name}}</td>
        
         <th scope = "col">{{ $emp['name'] }}</td>
          
          @if($emp->role_id ==1)
          <td></td>
          @elseif($emp->role_id == 2)
          <td>{{App\Models\User::where('role_id', 1)->first()->name}}</td>

          @elseif((App\Models\Reporting_manager::where('user_id', $emp->id)->pluck('id')->all())!= NULL)
          @if((App\Models\User::where('id', App\Models\Reporting_manager::where('user_id', $emp->id)->pluck('reporting_user_id')->all())->pluck('id')->all()) != NULL )
          <td>{{App\Models\User::where('id', App\Models\Reporting_manager::where('user_id', $emp->id)->pluck('reporting_user_id')->all())->first()->name}}</td>
          @else
          <td>Not Assigned</td>
          @endif
          
          @else
          <td>Not Assigned</td>
          @endif


          <td>{{ $emp['email'] }}</td>
          <td>{{ $emp['phone'] }}</td>


         @if($emp['status'] == 1)
         <td>&nbsp;&nbsp;<a href="{{url('/')}}/active_inactive/{{$emp['id']}}" onclick="return confirm('Are you sure you want to change the status?')"><button class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Change Status to: in-active"><i class="fa-sharp fa-solid fa-check fa-lg"></i></button></a></td>
         @else
         <td>&nbsp;&nbsp;<a href="{{url('/')}}/active_inactive/{{$emp['id']}}" onclick="return confirm('Are you sure you want to change the status?')"><button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Change Status to: active"><i class="fa-sharp fa-solid fa-xmark fa-xl"></i></button></a></td>
         @endif
        
         @if($emp->role_id == 3 && (App\Models\Reporting_manager::where('user_id', $emp->id)->pluck('id')->all())!= NULL)
         <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{url('/')}}/manager/remove/member/from/lead/{{$emp->id}}" onclick="return confirm('Are you sure you want to remove this Member from the Reporting Manager?')"><button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Remove this Member from Team Lead, {{App\Models\User::where('id', App\Models\Reporting_manager::where('user_id', $emp->id)->pluck('reporting_user_id')->all())->first()->name}}">Remove</button></a></td>
         @else
         <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action Invalid</td>
         @endif

         <td><a href="{{url('/')}}/edit/members/{{$emp['id']}}"><button class = "btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit {{ $emp['name'] }}'s record"><i class="fa-solid fa-pencil fa-lg"></i></button></a></p><a href="{{url('/')}}/remove/members/{{$emp['id']}}" onclick="return confirm('Are you sure you want to remove this Employee')"><button class = "btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Remove this Employee"><i class="fa-solid fa-trash-can fa-lg"></i></button></a></td>
       
        </tr>
        @endif
        @endforeach
       </tbody>
       @endif
        </table>
       </div>
        </div>



   
 {{-- Footer of the page --}}
 @include('layouts.manager_footer')


                  





      
   

   
  