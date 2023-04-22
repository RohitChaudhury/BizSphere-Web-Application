{{-- Header of the page --}}
@include('layouts.lead_header')


{{-- Body Content of the blade page --}}
<div id="layoutSidenav_content" style = "background: url(https://images.unsplash.com/19/desktop.JPG?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);background-size: cover;">
    {{--Success pop-up after adding a module --}}
    @if(Session::has('add'))
      <div class="alert alert-success">
      {{ Session::get('add') }}
      </div>
    @endif
  
  
    {{-- Edit module pop-up --}}
    @if(Session::has('edit'))
      <div class="alert alert-success">
      {{ Session::get('edit') }}
      </div>
    @endif


    
    
    
    
    {{-- Top Heading of the Blade page --}}
    <div style="display: grid; place-items: center; color:white;">
      <h2 class="font-weight-bold mt-4 mr-4">{{$project['project_name']}}'s Module(s)</h2>
   </div>
 
{{-- Add Module button --}}
  <span class="add_btn">
    <a href="{{url('/')}}/lead/add/project_module/form/{{$project->id}}" style="position: absolute; left:85.2%;"><button type="submit" class="btn btn-primary">Add Module</button></a></span>
  
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
        <th scope="col">&nbsp;&nbsp;Action</th>
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
        <td>&nbsp;&nbsp&nbsp;&nbsp;<a href="/lead/edit/project/module/{{$pr['id']}}/{{$project['id']}}"><button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Update this Module"><i class="fa-solid fa-pencil fa-lg"></i></button></a> 
      </tr>
     @endforeach
    </tbody>
    @endif
  </table>
      </div>
    </div>


 {{-- Footer of the page --}}
 @include('layouts.lead_footer')