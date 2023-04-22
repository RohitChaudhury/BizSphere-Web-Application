{{-- Header of the form --}}
@include('layouts.manager_header')

   
<div id="layoutSidenav_content" style = "background: url(https://images.unsplash.com/19/desktop.JPG?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);background-size: cover;">
  {{--Success pop-up--}}
 @if(Session::has('pop-up'))
 <div class="alert alert-success">
     {{ Session::get('pop-up') }}
 </div>
@endif
<div style="display: grid; place-items: center; color:white;">
   <h2 class="font-weight-bold mt-4 mr-4">{{$project['project_name']}}'s Module</h2>
</div>
 <span class="add_btn">
   <a href="{{url('/')}}/manager/add/module/{{$project->id}}" style="position: absolute; left:85.2%;"><button type="submit" class="btn btn-primary">Add Module</button></a></span>
 
   
   
    

 
   


  
  
  {{-- Table of listed modules of the project --}}
    <div class="card mb-4" style = "width: 80%; margin-left:12%; margin-top:3.3%;">
      <div class="card-header">
       Project's Module(s)
      </div>
      <div class="card-body">
  <table class="table mb-10" id= "myTable">
    <thead class="thead">
      <tr>
        <th scope="col">Module Name</th>
        <th scope="col">Project Name</th>
        <th scope="col">Module Weightage</th>
        <th scope="col">Completion Percentage</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    @if($modules!= NULL)
    <tbody>
      @foreach ($modules as $pr)
      <tr>
        <th scope="row">{{$pr['module_name']}}</th>
        <td>{{$project['project_name']}}</td>
        <td>{{$pr['module_weightage']}}</td>
        <td>{{$pr['completion_percentage']}}%</td>
        <td><a href="/edit/project_module/{{$pr['id']}}/{{$project['id']}}"><button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit this Module"><i class="fa-solid fa-pencil fa-lg"></i></button></a>&nbsp;&nbsp;<a href="{{url('/')}}/delete/module/{{$pr['id']}}/{{$project['id']}}" onclick="return confirm('Are you sure you want to delete this Module?')"><button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete this Module"><i class="fa-solid fa-trash-can fa-lg"></i></button></a></td>
      </tr>
     @endforeach
    </tbody>
    @endif
  </table>
    </div>
    </div>
    
  {{-- Footer of the page --}}
  @include('layouts.manager_footer')